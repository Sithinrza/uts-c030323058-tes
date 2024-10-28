<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriUsahasTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 50);
            $table->string('deskripsi', 255);
            $table->string('icon');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_usahas');
    }
}
