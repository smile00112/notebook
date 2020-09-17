<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('menu_title');      
            $table->string('h1');                     
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('slug')->unique();
            $table->integer('parent_id')->nullable();
            $table->tinyInteger('published')->default(1);
            $table->tinyInteger('main_menu')->nullable(1);            
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
        Schema::dropIfExists('blog_category');
    }
}
