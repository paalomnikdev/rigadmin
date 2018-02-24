<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 09.02.2018
 * Time: 23:12
 */

namespace App\Admin\Controllers;


use App\Admin\Extensions\ViewRig;
use App\Models\Rig;
use App\Models\Videocard;
use App\Models\VideocardHistory;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class RigController
{
    public function index()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Rig control');
            $content->body($this->grid());
        });
    }

    public function view($id)
    {
        $rig = Rig::find($id);

        return \Admin::content(function (Content $content) use ($id, $rig) {
            $content->header(
                $rig->getAttribute('name')
            );

            $content->breadcrumb(
                ['text' => 'Rigs', 'url' => '/rig'],
                ['text' => 'Rig', 'url' => '/rig/view/' . $id]
            );

            if (!$rig->getAttribute('active')) {
                $content->withError('Error', 'Rig is not active.');
                return;
            }

            $history = VideocardHistory::where('rig_id', '=', $id)
                ->selectRaw('MAX(temperature) AS max_temp, MIN(temperature) as min_temp, check_time')
                ->groupBy('check_time')
                ->get()
                ->toArray();


            $content->body(
                view(
                    'card-grid',
                    [
                        'cards'         => $rig->videocards()->get(),
                        'rig'           => $rig,
                        'temp_treshold' => config('max_temp_treshold'),
                        'dates'         => array_column($history, 'check_time'),
                        'max_temps'     => array_column($history, 'max_temp'),
                        'min_temps'     => array_column($history, 'min_temp'),
                    ]
                )
            );
        });
    }

    public function check($rigId)
    {
        $success = true;
        try {
            \Artisan::call('check:rig', ['rig' => $rigId]);
        } catch (\Throwable $e) {
            $success = false;
            \Log::error($e->getMessage(), $e->getTrace());
        }

        return \Response::json(['success' => $success]);
    }

    public function reboot($rigId)
    {
        $success = true;
        try {
            $rig = Rig::find($rigId);
            try {
                (new \GuzzleHttp\Client())->get(
                    'http://' . $rig->getAttribute('address') . '/gpu-control/reboot'
                );
            } catch (\Throwable $e) {}
        } catch (\Throwable $e) {
            $success = false;
            \Log::error($e->getMessage(), $e->getTrace());
        }

        return \Response::json(['success' => $success]);
    }

    public function setConfig($rigId)
    {
        $data = \Request::except('_token');
        $rig = Rig::find($rigId);
        $videocard = Videocard::where('id_on_rig', $data['id'])
            ->where('rig_id', $rigId)
            ->first();
        $success = true;
        try {
            $httpClient = new \GuzzleHttp\Client();
            $response = $httpClient->post(
                'http://' . $rig->getAttribute('address') . '/gpu-control/set-config',
                ['form_params' => $data]
            );
            $result = @\GuzzleHttp\json_decode(
                $response->getBody()->getContents(),
                true
            );
            if (!empty($result['success'])) {
                $videocard
                    ->setAttribute('fan_speed', $data['fan_speed'])
                    ->setAttribute('power_limit', $data['power_limit'])
                    ->setAttribute('memory_overclock', $data['memory_overclock'])
                    ->setAttribute('core_overclock', $data['core_overclock'])
                    ->save();
            }
            $message = $result['message'] ?? 'Saved.';
        } catch (\Throwable $e) {
            $success = false;
            $message = $e->getMessage();
            \Log::error($message, $e->getTrace());
        }

        return \Response::json([
            'success'   => $success,
            'message'   => $message,
        ]);
    }

    protected function grid()
    {
        return \Admin::grid(Rig::class, function (Grid $grid) {
            $grid->disableCreateButton();
            $grid->actions(function ($actions) {
                $actions->disableEdit();
                $actions->append(new ViewRig($actions->getKey()));
            });
            $grid->tools(function ($tools) {
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
            $grid->column('name')->sortable();
            $grid->column('address')->sortable();
            $grid->active('Active')->display(function ($active) {
                return $active ? '<i style="color:green;" class="fa fa-check"></i>' : '<i style="color:red;" class="fa fa-close"></i>';
            })->sortable();
        });
    }
}