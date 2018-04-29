<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinerCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('miner_commands', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('miner_id')->nullable();
            $table->foreign('miner_id')
                ->references('id')->on('miners')->onDelete('cascade');
            $table->string('title');
            $table->string('command', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('miner_commands');
    }
}
