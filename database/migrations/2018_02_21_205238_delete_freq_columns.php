<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFreqColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('videocard_history', function (Blueprint $table) {
            $table->dropColumn(['current_memory_freq', 'current_gpu_freq']);
        });

        \Schema::table('videocard', function (Blueprint $table) {
            $table->dropColumn(['current_memory_freq', 'current_gpu_freq']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('videocard_history', function (Blueprint $table) {
            $table->integer('current_memory_freq')->default(0)->after('rig_id');
            $table->integer('current_gpu_freq')->default(0)->after('rig_id');
        });

        \Schema::table('videocard', function (Blueprint $table) {
            $table->integer('current_memory_freq')->default(0)->after('rig_id');
            $table->integer('current_gpu_freq')->default(0)->after('rig_id');
        });
    }
}
