<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use \Input as Input;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.listProduct', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.createProduct', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_url' => 'required',
         ]);
         
         if($request->hasFile('image_url')){
            $file = $request->file('image_url');
            $product = new Product;
            $product->name = $request->input('name');
            $product->category = $request->input('category');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $destinationPath = 'uploads';
            $imagePath = $destinationPath.'/'.$file->getClientOriginalName();

            $file->move($destinationPath, $file->getClientOriginalName());
            $product->image_url = $imagePath;
            $product->save();
            //Move Uploaded File            
            return redirect('/product/create')->with('response', 'Record Added Successfully!');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::find($id);
        return view('product.showProduct', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::find($id);
        $category = Category::all();
        $categoryData = Category::where('id','=',$item->category)->get();
         return view('product.updateProduct', compact('item', 'categoryData', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_url' => '',
         ]);
         
         $product = Product::find($id);
         $product->name = $request->input('name');
         $product->category = $request->input('category');
         $product->description = $request->input('description');
         $product->price = $request->input('price');
         $product->image_url = $product->image_url;
         $destinationPath = 'uploads';

         if($request->hasFile('image_url')){
            $file = $request->file('image_url');
            $imagePath = $destinationPath.'/'.$file->getClientOriginalName();
            //Move Uploaded File   
            $file->move($destinationPath, $file->getClientOriginalName());
            $product->image_url = $imagePath;
        }
        
        $product->save();                 
        return redirect('/product/'.$id.'/edit')->with('response', 'Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Record Deleted Successfully!');
        return redirect('/product');
    }
}