<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('admin_menu')
            ->insert([
                [
                    'parent_id' => 0,
                    'order'     => 8,
                    'title'     => 'Wallets',
                    'icon'      => 'fa-money',
                    'uri'       => 'wallets',
                ],
                [
                    'parent_id' => 0,
                    'order'     => 8,
                    'title'     => 'Pools',
                    'icon'      => 'fa-cloud',
                    'uri'       => 'pools',
                ],
                [
                    'parent_id' => 0,
                    'order'     => 8,
                    'title'     => 'Currencies',
                    'icon'      => 'fa-bitcoin',
                    'uri'       => 'currencies',
                ],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::table('admin_menu')
            ->whereIn('title', ['Wallets', 'Pools', 'Currencies']);
    }
}
