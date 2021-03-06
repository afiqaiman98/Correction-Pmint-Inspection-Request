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
        Schema::create('inspects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('createdBy')->constrained('users');
            $table->string('serial')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('date')->nullable();
            // $table->date('date')->nullable();
            // $table->time('time')->nullable();
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->unsignedBigInteger('engineerId');
            $table->foreign('engineerId')->references('id')->on('users');
            $table->string('file')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('inspects');
    }
};
