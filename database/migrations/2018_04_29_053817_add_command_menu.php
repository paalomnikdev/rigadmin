<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommandMenu extends Migration
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
                    'title'     => 'Miner commands',
                    'icon'      => 'fa-terminal',
                    'uri'       => 'commands',
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
            ->where('uri', 'commands');
    }
}
