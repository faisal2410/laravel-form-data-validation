<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    function create(Request $request){
        return view('product.store');
    }

    // function store(Request $request){
    //     $validated = $request->validate([
    //         'name'=>'required|string|min:5|max:50',
    //         'price'=>'required|numeric|min:2.0|max:100.0',
    //         'description'=>'nullable|string',
    //         'stock'=>'required|boolean'
    //     ],[
    //         'name.min'=>'প্রোডাক্টের নাম মিনিমাম ৫ অক্ষর হতে হবে',
    //         'price.required'=>'মূল্য দিতেই হবে',
    //         'price.min'=>'একটা প্রোডাক্টের মিনিমাম প্রাইস ২ টাকা হতে হবে'
    //     ]);
    //     Product::create($request->all());
    //     Product::create($validated);
    //     return redirect()->back()->with('success','Product saved successfully');
    // }

    public function store(ProductRequest $request){
        $validated = $request->validated();
        if($request->hasFile('product_image')){
            $imagePath = $request->file('product_image')->store('product_images','public');
            $validated['product_image'] = $imagePath;
        }
        Product::create($validated);
        return redirect()->back()->with('success','Product saved successfully');
    }
}


// Thin Controller Fat Model
