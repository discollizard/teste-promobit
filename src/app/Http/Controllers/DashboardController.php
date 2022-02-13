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
    
    public function editProductPage($id_product){

        $productToEdit = Product::find($id_product)->with('tags')->get()->toArray();

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
}
