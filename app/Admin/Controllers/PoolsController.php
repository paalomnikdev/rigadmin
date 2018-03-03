<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 03.03.2018
 * Time: 15:00
 */

namespace App\Admin\Controllers;


use App\Models\Currency;
use App\Models\Pool;
use App\Models\Wallet;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class PoolsController
{
    public function index()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Pools');
            $content->body($this->grid());
        });
    }

    public function create()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Pools');
            $content->description('new');
            $content->body(\Admin::form(Wallet::class, function (Form $form) {
                $form->text('name', 'Name')->rules(['required']);
                $form->text('address', 'Address')->rules(['required']);
                $form->text('port', 'Port')->rules(['required|number']);
            }));
        });
    }

    public function new()
    {
        Pool::create(request()->only([
            'name',
            'address',
            'port'
        ]))->save();

        return redirect('admin/pools');
    }

    public function delete($id)
    {
        $response = [
            'status'    => true,
            'message'   => 'Deleted.'
        ];
        try {
            Pool::destroy(explode(',', $id));
        } catch (\Throwable $e) {
            \Log::error($e->getMessage(), $e->getTrace());
            $response = [
                'status'    => false,
                'message'   => 'Error.'
            ];
        }

        return \Response::json($response);
    }

    public function editForm($id)
    {
        return \Admin::content(function (Content $content) use ($id) {
            $content->header('Pools');
            $content->description('edit');

            $content->body(\Admin::form(Pool::class, function (Form $form) use ($id) {
                $pool = Pool::find($id);
                $form->text('name', 'Name')
                    ->rules(['required'])
                    ->value($pool['name']);
                $form->text('address', 'Address')
                    ->rules(['required'])
                    ->value($pool['address']);
                $form->text('port', 'Port')
                    ->rules(['required|number'])
                    ->value($pool['port']);
            }));
        });
    }

    public function update($id)
    {
        Pool::find($id)->update(request()->only([
            'name',
            'address',
            'port'
        ]));

        return redirect('admin/pools');
    }

    protected function grid()
    {
        return \Admin::grid(Pool::class, function (Grid $grid) {
            $grid->column('name')->sortable();
            $grid->column('address')->sortable();
            $grid->column('port');
        });
    }
}