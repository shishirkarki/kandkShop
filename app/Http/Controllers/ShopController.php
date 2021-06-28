<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Category;
use App\Products;
use App\User;
use App\HomeSetting;
use DB;
use Session;
use Auth;

class ShopController extends Controller
{

    public function indexShop(Request $request)
    {
        $categories = Category::with('categories')->where(['parent_id'=>0])->paginate(11);
        $product_search = $request->input('search');
        $searchProducts = Products::where('name','like','%'.$product_search.'%')->where('status',1)->paginate(4);
        $featuredProducts = Products::where(['featured_product'=>1])->get();
        $home_settings = HomeSetting::latest()->first();
        $product_banners = Banners::where('status','0')->first();
        $user_email=null;
        $userCart=null;
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }
        foreach($userCart as $key=>$products){
            $productDetails = Products::where(['id'=>$products->product_id])->first();
            $userCart[$key]->image = $productDetails->image;
        }
        $products = Products::paginate(6);
        return view('wayshop.shop')->with(compact('product_banners','product_search','searchProducts','categories','products','featuredProducts','home_settings','userCart'));
    }
}
