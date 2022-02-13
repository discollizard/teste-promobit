<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\ProductTag;

class TagController extends Controller
{

    public function saveTag(Request $request){
        $validator = $request->validate([
            'name' => 'required | unique:tag',
        ]);

        $newTag = new Tag;
        $newTag->name = $request->name;
        $newTag->save();

        return redirect()->route('tag_dashboard');
    }
    
    public function updateTag(Request $request){
        $validator = $request->validate([
            'name' => 'required',
        ]);

        $tagToUpdate = Tag::findOrFail($request->id);
        $tagToUpdate->name = $request->name;
        $tagToUpdate->save();   
        return redirect()->route('tag_dashboard');
    } 

    public function deleteTag($tag_id){
        ProductTag::where('tag_id', $tag_id)->delete();
        
        $productToDelete = Tag::find($tag_id);
        
        $productToDelete->delete();

        return redirect()->route('dashboard');
    }

}
