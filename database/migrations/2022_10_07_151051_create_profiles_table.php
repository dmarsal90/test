<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('phone');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zipcode');
            $table->boolean('available');
            $table->foreignId('friends_id')->nullable();
            $table->timestamps();

            $table->foreign('friends_id')->references('id')->on('friends');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
