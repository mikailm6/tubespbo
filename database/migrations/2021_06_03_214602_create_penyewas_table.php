<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewas', function (Blueprint $table) {
            $table->increments('id_penyewa');
            $table->integer('id_user')->unsigned();
            $table->string('nama_penyewa');
            $table->string('alamat_penyewa');
            $table->string('no_hp');
            $table->string('email_penyewa');
            $table->timestamps();
        });

        DB::table('penyewas')->insert(
            array(
                'id_user' => 4,
                'nama_penyewa' => 'Penyewa Default' ,
                'alamat_penyewa' => 'Alamat Default' ,
                'no_hp' => '081208120812' ,
                'email_penyewa' => 'penyewa@default.com' ,
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
        Schema::dropIfExists('penyewas');
    }
}
