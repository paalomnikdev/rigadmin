<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 03.03.2018
 * Time: 17:48
 */

namespace App\Admin\Controllers;

use App\Models\Currency;
use App\Models\Miner;
use App\Models\MinerCommand;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;

class CommandsController extends Controller
{
    use ModelForm;

    public function index()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Commands');
            $content->body($this->grid());
        });
    }

    public function create()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Commands');
            $content->description('new');
            $content->body($this->form());
        });
    }

    public function edit($id)
    {
        return \Admin::content(function (Content $content) use ($id) {
            $content->header('Currencies');
            $content->description('new');
            $content->body($this->form()->edit($id));
        });
    }

    public function store()
    {
        MinerCommand::create(request()->only([
            'title',
            'command',
            'miner_id',
        ]))->save();

        return redirect('admin/commands');
    }

    public function destroy($id)
    {
        $response = [
            'status'    => true,
            'message'   => 'Deleted.'
        ];
        try {
            MinerCommand::destroy(explode(',', $id));
        } catch (\Throwable $e) {
            \Log::error($e->getMessage(), $e->getTrace());
            $response = [
                'status'    => false,
                'message'   => 'Error.'
            ];
        }

        return \Response::json($response);
    }

    protected function grid()
    {
        return \Admin::grid(MinerCommand::class, function (Grid $grid) {
            $grid->column('title');
            $grid->column('command');
            $grid->column('miner.name', 'For miner');
        });
    }

    protected function form()
    {
        return \Admin::form(MinerCommand::class, function (Form $form) {
            $form->text('title', 'Title')->rules(['required']);
            $form->text('command', 'Command')->rules(['required']);
            $miners = Miner::all();
            $minerOptions = [];
            foreach ($miners as $miner) {
                $minerOptions[$miner->getKey()] = $miner->getAttribute('name');
            }
            $form->select('miner_id', 'For miner')->options($minerOptions);
        });
    }
}