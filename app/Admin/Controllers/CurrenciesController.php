<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 03.03.2018
 * Time: 17:48
 */

namespace App\Admin\Controllers;

use App\Models\Currency;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;

class CurrenciesController extends Controller
{
    use ModelForm;

    public function index()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Currencies');
            $content->body($this->grid());
        });
    }

    public function create()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Currencies');
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
        Currency::create(request()->only([
            'name',
            'symbol',
            'secondary',
        ]))->save();

        return redirect('admin/currencies');
    }

    public function destroy($id)
    {
        $response = [
            'status'    => true,
            'message'   => 'Deleted.'
        ];
        try {
            Currency::destroy(explode(',', $id));
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
        return \Admin::grid(Currency::class, function (Grid $grid) {
            $grid->column('name');
            $grid->column('symbol');
            $grid->secondary('Secondary?')->display(function ($secondary) {
                return $secondary ? 'yes' : 'no';
            });
        });
    }

    protected function form()
    {
        return \Admin::form(Currency::class, function (Form $form) {
            $form->text('name', 'Name')->rules(['required']);
            $form->text('symbol', 'Address')->rules(['required']);
            $form->switch('secondary', 'Secondary?')->rules(['required']);
        });
    }
}