<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{


    public function view()
    {
    $data['allData']=Product::orderBy('id','desc')->get();

        return view('backend.product.product-view',$data);
    }

    public function add()
    {

        return view('backend.product.product-add');
    }


    public function store(Request $request)
    {
         $request->validate([
            'product_image' => 'required',

        ]);


        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;


        $data->slug = ($request->title);
        $data->category_id = 1;
        $data->brand_id = 1;
        $data->admin_id = 1;

        $data->save();
        //add Single image

        /*  if ($request->hasFile('product_image')) {


              $image = $request->file('product_image');

              $img = time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('images/products/' . $img);
              Image::make($image)->save($location);
              $product_image = new ProductImage;
              $product_image->product_id = $data->id;
              $product_image->image = $img;
              $product_image->save();
          }
          */

        //Add Multiple Image
        if (count($request->product_image) > 0) {
            foreach ($request->product_image as $image) {

                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/products/' . $img);

                Image::make($image)->save($location);
                $product_image = new ProductImage;
                $product_image->product_id = $data->id;
                $product_image->image = $img;
                $product_image->save();

            }


            return redirect()->route('product.view');

        }

    }

    public function edit($id){

        $data['editData']=Product::find($id);

        return view('backend.product.product-add',$data);


    }

    public function update(Request $request,$id){

        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;


        $data->slug = ($request->title);
        $data->category_id = 1;
        $data->brand_id = 1;
        $data->admin_id = 1;

        $data->save();
        return redirect()->route('product.view');


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
