<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('level')->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'username' => 'Manager',
                'password' => Hash::make('12121212'),
                'level' => 3,
            )
        );

        DB::table('users')->insert(
            array(
                'username' => '-',
                'password' => Hash::make('12121212'),
                'level' => 2,
            )
        );

        DB::table('users')->insert(
            array(
                'username' => 'PJ',
                'password' => Hash::make('12121212'),
                'level' => 2,
            )
        );

        DB::table('users')->insert(
            array(
                'username' => 'Penyewa',
                'password' => Hash::make('12121212'),
                'level' => 1,
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
        Schema::dropIfExists('users');
    }
}
