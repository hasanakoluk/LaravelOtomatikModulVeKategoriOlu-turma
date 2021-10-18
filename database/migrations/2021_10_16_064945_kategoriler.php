<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kategoriler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoriler', function (Blueprint $table) {
            $table->id();
            $table->string("baslik",255);
            $table->string("seflink",255);
            $table->string("tablo",255)->nullable();
            $table->string("anahtar",255)->nullable();
            $table->string("barkod",255)->nullable();
            $table->string("stokadi",255)->nullable();
            $table->string("musteriAdi",255)->nullable();
            $table->longText("adres")->nullable();
            $table->unsignedBigInteger("kategoriler")->nullable();
            $table->enum("alinanSiparis",["kapali-tamamlandi","acik-tamamlanmadi"])->default("kapali-tamamlandi")->nullable();
            $table->enum("verilenSiparis",["kapali-tamamlandi","acik-tamamlanmadi"])->default("kapali-tamamlandi")->nullable();
            $table->string("description",255)->nullable();
            $table->enum("durum",["kapali-tamamlandi","acik-tamamlanmadi"])->default("kapali-tamamlandi");
            $table->integer("sirano")->nullable();
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
        Schema::dropIfExists('kategoriler');
    }
}
