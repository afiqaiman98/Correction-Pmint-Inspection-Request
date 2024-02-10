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
        /**
         * inspect_id
         * description
         * datetime
         * creator_id
         */
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspect_id')->constrained('inspects')->onDelete('cascade');
            $table->string('description');
            $table->string('remark')->nullable();
            $table->foreignId('creator_id')->constrained('users');
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
        Schema::dropIfExists('timelines');
    }
};
