<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Product;
use Inertia\Inertia;
use Auth;

class DashboardController extends Controller
{
    public function index(){

        $allProductsWithTags = Product::with('tags')->get();

        return Inertia::render('Dashboard', [
           'productsWithTags' => $allProductsWithTags 
        ]);
    }

    public function createProductPage(){
        return Inertia::render('CreateProduct', [
            'tags' => Tag::get(['id as value', 'name as label'])
        ]);
    }
}
