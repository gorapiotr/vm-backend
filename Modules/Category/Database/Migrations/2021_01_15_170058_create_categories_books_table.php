<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_books', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('book_id')->index();
            $table->foreign('book_id')
                ->references('id')
                ->on('books')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('categories_books');
    }
}
