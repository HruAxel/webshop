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
         Schema::table('products', function (Blueprint $table) {
             // Készlet (stock) hozzáadása
             $table->integer('stock')->default(0);
             // Foglalt készlet (reserved_stock) hozzáadása
             $table->integer('reserved_stock')->default(0);
         });
     }
     
     public function down()
     {
         Schema::table('products', function (Blueprint $table) {
             $table->dropColumn('stock');
             $table->dropColumn('reserved_stock');
         });
     }
};
