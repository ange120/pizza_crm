<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsOfDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_of_dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_dish')->constrained('dishes')->onDelete('cascade');
            $table->foreignId('id_ingredient')->constrained('ingredients')->onDelete('cascade');
            $table->float('weight_per_dish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients_of_dishes');
    }
}
