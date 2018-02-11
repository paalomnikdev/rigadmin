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
            $content->body(
                view(
                    'card-grid',
                    [
                        'cards' => $rig->videocards()->get(),
                        'rig'   => $rig,
                        'temp_treshold' => config('max_temp_treshold'),
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
            \Log::error($e->getMessage());
        }

        return \Response::json(['success' => $success]);
    }

    public function setConfig($rigId)
    {

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