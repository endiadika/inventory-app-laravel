<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
   
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id('id_supplier');
            $table->string('nama_supplier');
            $table->integer('telp');
            $table->string('alamat');
            $table->string('kategori');
            $table->timestamps();
            $table->softDeletes();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
