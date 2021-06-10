<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePJsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_js', function (Blueprint $table) {
            $table->increments('id_pj');
            $table->integer('id_user')->unsigned();
            $table->string('nama_pj');
            $table->string('email_pj');
            $table->timestamps();
        });

        DB::table('p_js')->insert(
            array(
                'id_user' => 2,
                'nama_pj' => '-' ,
                'email_pj' => '-' ,
            )
        );

        DB::table('p_js')->insert(
            array(
                'id_user' => 3,
                'nama_pj' => 'PJ Default' ,
                'email_pj' => 'pj@default.com' ,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_js');
    }
}
