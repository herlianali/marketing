<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pel',30)->unique();
            $table->string('nm_pelanggan',150);
            $table->string('alamat');
            $table->string('no_hp',25);
            $table->enum('verifikasi',['Diterima','Ditolak','Belum Diverifikasi'])->default('Belum Diverifikasi');
            $table->string('user_id',30);
            $table->date('tgl_masuk');
            $table->string('bulan');
            $table->string('ktp');
            $table->string('wajah');
            $table->unsignedBigInteger('paket_id');

            $table->foreign('paket_id')->references('id')->on('paket')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pelanggans');
    }
};
