<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_umkm')->constrained('umkms')->onDelete('cascade');
            $table->string('nama_produk', 100);
            $table->string('kategori_produk', 50);
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi_produk')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
