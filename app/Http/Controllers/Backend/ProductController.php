<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use File;
class ProductController extends Controller
{

    public function index()
    {
        $products=Product::orderBy('id','desc')->get();

        return view('backend.product.index')->with('products',$products);
    }


    public function create()
    {

        return view('backend.product.create');
    }


    public function edit($id)
    {

        $product=Product::find($id);

        return view('backend.product.edit')->with('product',$product);
    }


    public function store(Request $request)
    {

        //validation

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'category_id' => 'required|numeric',

        ]);


        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;


        $product->slug = ($request->title);
        $product->admin_id = 1;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->save();

        if (count($request->product_image)>0) {
            foreach ($request->product_image as $image) {

                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/products/' .$img);
                Image::make($image)->save($location);
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();

            }
            session()->flash('success','A new category added success');

            return redirect()->route('product.index');
        }

    }




    public function update(Request $request,$id)
    {

        //validation

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'category_id' => 'required|numeric',

        ]);


        $product =  Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->admin_id = 1;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->save();

            session()->flash('success','A new category added success');

            return redirect()->route('product.index');
        }




    public function delete($id)
    {
        $product =  Product::find($id);

        if(! is_null($product)){

            $product->delete();
        }

        session()->flash('success', 'Product has deleted Successfully');
        return back();
    }

}
