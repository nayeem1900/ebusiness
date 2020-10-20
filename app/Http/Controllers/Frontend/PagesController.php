<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function index(){

        return view('index');
    }


    public function products(){
        $products=Product::orderBy('id','desc')->get();

return view('frontend.pages.product.index')->with('products',$products);

    }

}
