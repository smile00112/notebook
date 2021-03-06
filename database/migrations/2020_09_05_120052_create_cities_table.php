<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cityes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_sklon')->nullable();
            $table->string('slug');            
            $table->string('coordinate')->nullable();            
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('cityes');
    }
}
