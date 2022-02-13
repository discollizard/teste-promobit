<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, ProductTag};
use Inertia\Inertia;


class ProductController extends Controller
{
    public function saveProduct(Request $request){
        $validator = $request->validate([
            'name' => 'required | unique:product',
            'tags' => 'required'
        ]);

        $newProduct = new Product;
        $newProduct->name = $request->name;
        $newProduct->save();
        
        //se houver tempo, levantar uma salvaguarda de save aqui e mostrar na página caso não salve
        
        $newProductId = $newProduct->id;

        foreach($request->tags as $tag){
            $newProductTag = new ProductTag;
            $newProductTag->product_id = $newProductId;
            $newProductTag->tag_id = $tag;

            $newProductTag->save();
            
            //aqui tambem
        }

        return redirect()->route('dashboard');
    }

    public function deleteProduct($product_id){
        $productTagsDeleted = ProductTag::where('product_id', $product_id)->delete();
        
        //aqui tambem

        $productToDelete = Product::find($product_id);
        
        $productToDelete->delete();
        //aqui tambem


        return redirect()->route('dashboard');
    }
}
