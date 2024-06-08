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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catergory_id');
            $table->string('name', 60);
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->default(0);
            $table->string('pack');
            $table->string('from');
            $table->string('taste');
            $table->string('use');
            $table->string('ingredients');
            $table->timestamps();
            $table->foreign('catergory_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
