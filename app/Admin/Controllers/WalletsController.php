<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 03.03.2018
 * Time: 15:00
 */

namespace App\Admin\Controllers;


use App\Models\Currency;
use App\Models\Wallet;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class WalletsController
{
    public function index()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Wallets');
            $content->body($this->grid());
        });
    }

    public function create()
    {
        return \Admin::content(function (Content $content) {
            $content->header('Wallets');
            $content->description('new');
            $content->body(\Admin::form(Wallet::class, function (Form $form) {
                $form->text('name', 'Name')->rules(['required']);
                $form->text('address', 'Address')->rules(['required']);

                $currencies = Currency::all();
                $currencyOptions = [];
                foreach ($currencies as $currency) {
                    $currencyOptions[$currency['id']] = $currency['symbol'];
                }

                $form->select('currency_id', 'Currency')->options($currencyOptions)->rules(['required']);
            }));
        });
    }

    public function new()
    {
        Wallet::create(request()->only([
            'name',
            'address',
            'currency_id'
        ]))->save();

        return redirect('admin/wallets');
    }

    public function delete($id)
    {
        $response = [
            'status'    => true,
            'message'   => 'Deleted.'
        ];
        try {
            Wallet::destroy(explode(',', $id));
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
            $content->header('Wallets');
            $content->description('edit');
            $content->body(\Admin::form(Wallet::class, function (Form $form) use ($id) {
                $wallet = Wallet::find($id);
                $form->text('name', 'Name')
                    ->rules(['required'])
                    ->value($wallet['name']);
                $form->text('address', 'Address')
                    ->rules(['required'])
                    ->value($wallet['address']);

                $currencies = Currency::all();
                $currencyOptions = [];
                foreach ($currencies as $currency) {
                    $currencyOptions[$currency['id']] = $currency['symbol'];
                }

                $form->select('currency_id', 'Currency')
                    ->options($currencyOptions)
                    ->rules(['required'])
                    ->value($wallet['currency_id']);
            }));
        });
    }

    public function update($id)
    {
        Wallet::find($id)->update(request()->only([
            'name',
            'address',
            'currency_id'
        ]));

        return redirect('admin/wallets');
    }

    protected function grid()
    {
        return \Admin::grid(Wallet::class, function (Grid $grid) {
            $grid->column('name')->sortable();
            $grid->column('address')->sortable();
            $grid->column('currency.name');
        });
    }
}