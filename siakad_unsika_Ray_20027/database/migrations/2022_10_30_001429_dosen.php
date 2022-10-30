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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('id');
            $table->string ('nidn');
            $table->string ('nama');
            $table->enum ('jk', ['Laki-laki', 'Perempuan']);
            $table->string ('alamat');
            $table->string ('tempat');
            $table->string ('tgl_lahir');
            $table->text ('photo');
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
        Schema::dropIfExists('dosen');
    }
};
