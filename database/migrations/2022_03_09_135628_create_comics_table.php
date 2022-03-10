<?php

/* use App\Comic;
//usiamo il nostro model che si trova in App */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            //creiamo la tabella nel nostro db in phpmyadmin
            //$table->tipo-di-dato("nome-della-colonna" "n-caratteri")
            $table->id();
            $table->string("title",50);
            $table->text("description");
            $table->string("thumb")->nullable();
            $table->unsignedSmallInteger("price");
            $table->string("series",100);
            $table->string('sale_date');
            $table->string("type",50);
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
        Schema::dropIfExists('comics');
    }
}
