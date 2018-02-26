<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMinersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('miners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dir');
            $table->string('binary');
            $table->string('command_pattern', 1000)->nullable();
        });

        \DB::table('miners')
            ->insert([
                ['name' => 'EWBF', 'dir' => 'zecminer', 'binary' => './miner'],
                ['name' => 'Claymore', 'dir' => 'claymore_dual_11', 'binary' => './ethdcrminer64']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('miners');
    }
}
