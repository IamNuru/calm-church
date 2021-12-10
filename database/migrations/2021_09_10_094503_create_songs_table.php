<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('song_category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('artist');
            $table->string('genre');
            $table->text('description');
            $table->longText('content')->nullable();
            $table->longText('lyrics')->nullable();
            $table->string('cover_photo')->nullable();
            $table->decimal('amount',10,2)->nullable()->default(0.00);
            $table->integer('downloads')->nullable()->default(0);
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
        Schema::dropIfExists('songs');
    }
}
