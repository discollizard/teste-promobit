<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    
    public function editProductPage($id_product){

        $productToEdit = Product::with('tags')->where('id', $id_product)->get()->toArray();

        //formating properly to display on form
        foreach($productToEdit as $llave => $prod){
            foreach($prod['tags'] as $key => $tag){
                $productToEdit[$llave]['tags'][$key] = $tag['id'];
            }
        }
        
        return Inertia::render('CreateProduct', [
            'tags' => Tag::get(['id as value', 'name as label']),
            'productToEdit' => $productToEdit[0]
        ]);
    }

    public function seeTagsPage(){
        $allTags = Tag::all();
        return Inertia::render('TagsPage', [
            'allTags' => $allTags
        ]);
    }

    public function createTagPage(){
        return Inertia::render('CreateTag');
    }

    public function editTagPage($id_tag){
        $tagToEdit = Tag::findOrFail($id_tag);

        return Inertia::render('CreateTag', [
            'tagToEdit' => $tagToEdit
        ]);
    }

    public function generateRelevanceReport(){
        $relevanceData = DB::select(DB::raw('SELECT p.name as product_name, count(tag_id) as relevance FROM product_tag pt 
                        LEFT JOIN product p ON p.id = pt.product_id GROUP BY pt.product_id ORDER BY relevance DESC'));

        return Inertia::render('Report', [
            'relevanceData' => $relevanceData
        ]);
    }
}
