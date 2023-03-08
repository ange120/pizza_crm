<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightOfIngredientsInStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_of_ingredients_in_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ingredient')->constrained('ingredients')->onDelete('cascade');
            $table->float('cont_in_stock');
            $table->float('min_in_stock');
            $table->float('max_in_stock')->nullable();
            $table->dateTime('best_before_date')->nullable();
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
        Schema::dropIfExists('weight_of_ingredients_in_stocks');
    }
}
