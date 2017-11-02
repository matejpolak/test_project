<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('author_id')->default(1);
            $table->string('title', 127);
            $table->string('cover')->default('http://www.jameshmayfield.com/wp-content/uploads/2015/03/defbookcover-min.jpg');
            $table->integer('published_at')->nullable();
            $table->date('finished_reading_at')->nullable();
            $table->string('my_review')->default('This is place for your book review and notes...');
            $table->string('description')->default('This is place for your book description...');
            $table->integer('my_rating')->default(0);
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
        Schema::dropIfExists('books');
    }
}
