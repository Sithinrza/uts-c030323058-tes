<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmsTable extends Migration
{
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_umkm', 100);
            $table->string('jenis_usaha', 50);
            $table->text('alamat');
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('no_telp', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('pemilik', 100);
            $table->year('tahun_berdiri')->nullable();
            $table->integer('jumlah_karyawan')->nullable();
            $table->decimal('omset_perbulan', 15, 2)->nullable();
            $table->enum('status_verifikasi', ['terverifikasi', 'belum terverifikasi'])->default('belum terverifikasi');
            $table->date('tanggal_input')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umkms');
    }
}
