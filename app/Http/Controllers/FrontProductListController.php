<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class FrontProductListController extends Controller
{
    public function index(){
        $products=Product::latest()->limit(9)->get();
        $randomActiveProducts=Product::inRandomOrder()->limit(3)->get();
        $category=Category::all();
        $randomActiveProductIds=[];
        foreach($randomActiveProducts as $product){
            array_push($randomActiveProductIds,$product->id);
        }
        $randomItemProducts = Product::whereNotIn('id',$randomActiveProductIds)->limit(3)->get();
//        $sliders = Slider::get();


        return view('product',compact('products','randomItemProducts','randomActiveProducts','category'));
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
