<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('symbol');
            $table->timestamps();
        });

        \DB::table('currencies')
            ->insert([
                ['name' => 'Ethereum', 'symbol' => 'ETH'],
                ['name' => 'Zcash', 'symbol' => 'ZEC'],
                ['name' => 'Decred', 'symbol' => 'DCR'],
                ['name' => 'Siacoin', 'symbol' => 'SC'],
                ['name' => 'LBRY', 'symbol' => 'LBC'],
                ['name' => 'Pascal', 'symbol' => 'PASC'],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('currencies');
    }
}
