<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;



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


    public function allProduct($name, Request $request){

        $category  = Category::where('slug',$name)->first();
        $categoryId=$category->id;
        $filterSubCategories = [];
        if($request->subcategory){
            $products=$this->filterProducts($request);
            $filterSubCategories = $this->getSubcategoriesId($request);
        }elseif($request->min||$request->max){
            $products = $this->filterByPrice($request);
        }else {
            $products = Product::where('category_id', $category->id)->get();
        }
        $subcategories=Subcategory::where('category_id', $category->id)->get();
        $slug=$name;

        return view('category',compact('products','subcategories','slug','categoryId','filterSubCategories'));
    }

    public function filterProducts(Request $request){
        $subId =[];
        $subcategory = Subcategory::whereIn('id',$request->subcategory)->get();
        foreach($subcategory as $sub){
            array_push($subId, $sub->id);
        }
        $products = Product::whereIn('subcategory_id',$subId)->get();
        return $products;

    }


    public function getSubcategoriesId(Request $request){
        $subId=[];
        $subcategory=Subcategory::whereIn('id',$request->subcategory)->get();
        foreach ($subcategory as $sub){
            array_push($subId, $sub->id);
        }
        return $subId;
    }

    public function filterByPrice(Request $request){
        $categoryId=$request->categoryId;
        $product = Product::whereBetween('price',[$request->min, $request->max ])->where('category_id',$categoryId)->get();
        return $product;
    }
}
