<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RevertWalletsCurrenciesAndPools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::transaction(function () {
            \Schema::dropIfExists('wallets');
            \Schema::dropIfExists('currencies');
            \Schema::dropIfExists('pools');
            \DB::table('admin_menu')
                ->whereIn('uri', [
                    'wallets',
                    'pools',
                    'currencies',
                ])->delete();

            \Schema::table('rig', function (Blueprint $table) {
                $table->string('miner_command', 4000);
                $table->unsignedInteger('current_miner');
            });
        }, 3);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
