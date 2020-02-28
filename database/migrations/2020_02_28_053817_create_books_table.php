<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->bigInteger('parent_id');
            $table->bigInteger('user_id');
            $table->string('title')->nullable();
            $table->string('title_kana')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('subtitle_kana')->nullable();
            $table->string('isbn')->nullable();
            $table->string('author')->nullable();
            $table->string('author_kana')->nullable();
            $table->string('publisher')->nullable();
            $table->string('size')->nullable();
            $table->string('series')->nullable();
            $table->string('series_kana')->nullable();
            $table->string('sales_date')->nullable();
            $table->string('price')->nullable();
            $table->string('url')->nullable();
            $table->string('aff_url')->nullable();
            $table->string('bdate')->nullable();
            $table->string('sd_conv')->nullable();
            $table->string('inmode')->nullable();
            $table->string('c_dtm')->nullable();
            $table->string('memo')->nullable();
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
