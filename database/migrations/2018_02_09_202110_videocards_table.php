<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VideocardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('videocard', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fan_speed');
            $table->integer('power_limit');
            $table->integer('temperature');
            $table->integer('memory_overclock');
            $table->integer('core_overclock');
            $table->integer('rig_id')->unsigned();
            $table->foreign('rig_id')
                ->references('id')->on('rig')
                ->onDelete('cascade');
            $table->timestamp('last_check');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('videocard');
    }
}
