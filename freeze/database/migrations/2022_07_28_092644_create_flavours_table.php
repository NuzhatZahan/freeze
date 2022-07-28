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
        Schema::create('flavours', function (Blueprint $table) {
            $table->id('flavour_id');
            $table->string('flavour_name');
            $table->double('flavour_price');
            $table->string('flavour_type');
            $table->string('flavour_image');
            $table->integer('category_id');
            $table->string('flavour_status')->default("off");
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
        Schema::dropIfExists('flavours');
    }
};
