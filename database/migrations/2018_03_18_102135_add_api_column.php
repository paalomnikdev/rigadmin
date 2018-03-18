<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApiColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('miners', function (Blueprint $table) {
            $table->string('api_param', 500)->default('');
            $table->string('api_url', 400);
        });

        \DB::table('miners')
            ->where('name', '=', 'EWBF')
            ->update([
                'api_param' => '--api 0.0.0.0:42000',
                'api_url'   => 'http://{address}:42000',
            ]);

        \DB::table('miners')
            ->where('name', '=', 'Claymore')
            ->update([
                'api_url'   => 'http://{address}:3333',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('miners', function (Blueprint $table) {
            $table->dropColumn([
                'api_param',
                'api_url',
            ]);
        });
    }
}
