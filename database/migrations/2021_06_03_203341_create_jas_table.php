<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jas', function (Blueprint $table) {
            $table->increments('id_jas');
            $table->string('nama_jas');
            $table->string('model_jas');
            $table->string('warna_jas');
            $table->string('ukuran_jas');
            $table->string('gambar');
            $table->integer('hargaPerHari')->unsigned();
            $table->timestamps();
        });

        DB::table('jas')->insert(
            array(
                'nama_jas' => 'Jas Default',
                'model_jas' => 'Model Default',
                'warna_jas' => 'Warna Default',
                'ukuran_jas' => 'Ukuran Default',
                'gambar' => 'awal.jpg',
                'hargaPerHari' => 250000,
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
        Schema::dropIfExists('jas');
    }
}
