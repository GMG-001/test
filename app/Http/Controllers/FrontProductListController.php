<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontProductListController extends Controller
{
    public function index(){
        $products=Product::all();
        $category=Category::all();
        return view('product',compact('products','category'));
    }

    public function show($id){
        $product = Product::find($id);
        $productFromSameCategories = Product::inRandomOrder()
            ->where('category_id',$product->category_id)
            ->where('id','!=',$product->id)
            ->limit(3)
            ->get();

        return view('show',compact('product','productFromSameCategories'));
    }
}
