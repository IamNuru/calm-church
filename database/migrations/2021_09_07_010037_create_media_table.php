<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->morphs('model');
            $table->uuid('uuid')->nullable()->unique();
            $table->string('collection_name');
            $table->string('name');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->string('disk');
            $table->string('conversions_disk')->nullable();
            $table->unsignedBigInteger('size');
            $table->json('manipulations');
            $table->json('custom_properties');
            $table->json('generated_conversions');
            $table->json('responsive_images');
            $table->unsignedInteger('order_column')->nullable();


            //add my own fields
           /*  $table->string('title');
            $table->string('slug')->unique();
            $table->string('singer');
            $table->string('genre');
            $table->decimal('amount',10,2)->nullable()->default(0.00);
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->longText('lyrics')->nullable();
            $table->integer('downloads')->nullable()->default(0); */
            
            $table->nullableTimestamps();
        });
    }
}
