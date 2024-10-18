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
        Schema::create('scategories', function (Blueprint $table) {
            $table->id();
            $table->string('nomscategorie')->unique();
            $table->string('imagecategorie')->nullable();
            $table->unsignedBigInteger('categorieID')->foreign("categorieID")->references("id")->on("categories")->onDelete("restrict");                                                             
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
        Schema::dropIfExists('scategories');
    }
};
