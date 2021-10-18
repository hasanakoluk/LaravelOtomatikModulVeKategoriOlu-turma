<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Moduller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moduller', function (Blueprint $table) {
            $table->id();
            $table->string("baslik");
            $table->string("seflink");
            $table->enum("durum",["kapali-tamamlandi","acik-tamamlanmadi"])->default("kapali-tamamlandi");
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
        Schema::dropIfExists('moduller');
    }
}
