<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoryController extends Controller
{


    
    public function create(){
        return view ('category.createCategory');
    }

    //Add a new Record
    public function store(Request $request){
        
        $this->validate($request, [
           'categoryName' => 'required'  
        ]);
        
        $category = new Category;
        $category->name = $request->input('categoryName');
        $category->save();
        return redirect('/category')->with('response', 'Record Added Successfully!');
    }

    //Get List of Records
    public function get(Request $request){
        
        $this->validate($request, [
            'categoryName' => 'required'  
         ]);
    }

    //Update an Existing Record
    public function edit(Request $request){
        
        $this->validate($request, [
            'categoryName' => 'required'  
         ]);
    }
}