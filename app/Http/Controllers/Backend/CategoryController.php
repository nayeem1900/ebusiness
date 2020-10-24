<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;
class CategoryController extends Controller
{


  /*  public function view()
    {
        $data['allData']=Category::orderBy('id','desc')->get();

        return view('backend.category.category-view',$data);
    }

    public function add()
    {
        $main_categories['allData']=Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();

        return view('backend.category.category-add',$main_categories);
    }


    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image',

        ]);


        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        //insert Image


        if($request->file('image')){

            $file=$request->file('image');
            @unlink(public_path('images/categories/'.$category->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/categories'),$filename);
            $category['image']=$filename;
        }



        $category->save();

        session()->flash('success','A new category added success');
        return redirect()->route('category.view');

    }


    public function edit($id)
    {
        $main_categories['allData']=Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $data['editData']=Category::find($id);
        if(!is_null($data)){
            return view('backend.category.category-add',$main_categories,$data);

        }else{
            return redirect()->route('category.view');
        }

    }



    public function update(Request $request, $id){

        $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image',

        ]);


        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        //insert Image




        if ($request->hasFile('image')) {
            if (File::exists('images/categories' .$category->image)){
                File::delete('images/categories' .$category->image);
            }


            $image=$request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/' . $img);
            Image::make($image)->save($location);
            $category->image=$img;
        }





        $category->save();

        session()->flash('success',' category update success');
        return redirect()->route('category.view');

    }


    public function delete($id)
    {
        $category =  Category::find($id);

        if(! is_null($category)){
            //if it is parent category delete sub category
            if ($category->parent_id==NULL){
                $sub_categories=Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
                foreach ($sub_categories as $sub){
                    if (File::exists('images/categories' .$sub->image)){
                        File::delete('images/categories' .$sub->image);
                    }

                    $sub->delete();
                }

            }

            if (File::exists('images/categories' .$category->image)){
                File::delete('images/categories' .$category->image);
            }

            $category->delete();
        }

        session()->flash('success', 'Category has deleted Successfully');
        return back();
    }*/






    public function index(){

        $categories=Category::orderBy('id', 'desc')->get();

        return view('backend.category.index', compact('categories'));
    }


    public function create()
    {

        $main_categories=Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();


        return view('backend.category.create', compact('main_categories'));
    }


    public function update(Request $request, $id){

        $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image',

        ]);


        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        //insert Image

        if ($request->hasFile('image')) {
            if (File::exists('images/categories' .$category->image)){
                File::delete('images/categories' .$category->image);
            }


            $image=$request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/' . $img);
            Image::make($image)->save($location);
            $category->image=$img;
        }

        $category->save();

        session()->flash('success',' category update success');
        return redirect()->route('category.index');

    }

    public function edit($id)
    {
        $main_categories=Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $category=Category::find($id);
        if(!is_null($category)){
            return view('backend.category.edit', compact('category','main_categories'));

        }else{
            return redirect()->route('category.index');
        }

    }

///STORE

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image',

        ]);


        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        //insert Image

        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/' . $img);
            Image::make($image)->save($location);
            $category->image=$img;
        }

        $category->save();

        session()->flash('success','A new category added success');
        return redirect()->route('category.index');

    }



    public function category_delete($id)
    {
        $category =  Category::find($id);

        if(! is_null($category)){
            //if it is parent category delete sub category
            if ($category->parent_id==NULL){
                $sub_categories=Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
                foreach ($sub_categories as $sub){
                    if (File::exists('images/categories' .$sub->image)){
                        File::delete('images/categories' .$sub->image);
                    }

                    $sub->delete();
                }

            }

            if (File::exists('images/categories' .$category->image)){
                File::delete('images/categories' .$category->image);
            }

            $category->delete();
        }

        session()->flash('success', 'Category has deleted Successfully');
        return back();
    }













}
