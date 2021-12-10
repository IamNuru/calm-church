<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->nullable();
            $table->string('biography')->nullable();
            $table->string('position')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('partner_message')->nullable();
            $table->string('partner_description')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->boolean('is_admin')->nullable()->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
