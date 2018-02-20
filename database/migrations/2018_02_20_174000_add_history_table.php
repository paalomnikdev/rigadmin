<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('videocard_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_on_rig');
            $table->string('name');
            $table->integer('fan_speed');
            $table->integer('power_limit');
            $table->integer('temperature');
            $table->integer('memory_overclock');
            $table->integer('core_overclock');
            $table->integer('current_memory_freq');
            $table->integer('current_gpu_freq');
            $table->integer('rig_id')->unsigned();
            $table->foreign('rig_id')
                ->references('id')->on('rig')
                ->onDelete('cascade');
            $table->timestamp('check_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('videocard_history');
    }
}
