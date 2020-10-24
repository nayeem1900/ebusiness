<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{



    public function show($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {

            return view('frontend.pages.category.show', compact('category'));
        } else {
            session()->flash('errors', 'Sorry||There is no Category ID');
            return redirect('/');
        }
    }

}
