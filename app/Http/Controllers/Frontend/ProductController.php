<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

public function show($slug){

    $product=Product::where('slug', $slug)->first();
    if(!is_null($product)){
        return view('frontend.pages.product.show', compact('product'));

    }else{
        session()->flash('errors','Sorry There is no product');
        return redirect()->route('products');
    }


}


}
