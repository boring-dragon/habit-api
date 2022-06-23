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
        Schema::create('habbits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('habbit_type_id')->nullable();
            $table->string('status')->default('created');
            $table->timestamps();

            $table->foreign('habbit_type_id')->references('id')->on('habbit_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habbits');
    }
};
