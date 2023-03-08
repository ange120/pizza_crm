<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredients;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function listIngredients()
    {
        $list = Ingredients::paginate(15);
        return view('admin.stock.ingredients.index', compact('list'));
    }

    public function editIngredients()
    {



    }


}
