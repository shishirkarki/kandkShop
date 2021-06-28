<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Category;
use App\Products;
use App\HomeSetting;
use App\AboutUs;
use App\Blog;
use App\Contact;
use DB;
use Session;
use Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banners::where('status','1')->orderby('sort_order','asc')->paginate(3);
        $product_banners = Banners::where('status','0')->first();
        // $home_settings = HomeSetting::latest()->paginate(1);
        $home_settings = HomeSetting::latest()->first();
        $categories = Category::with('categories')->where(['parent_id'=>0])->latest()->paginate(12);
        $products = Products::get();
        $new_arrival = Category::with('products')->with('categories')->where(['parent_id'=>0])->where('status',1)->where('latest_category',1)->get();
        $product_search = $request->input('search');
        $searchProducts = Products::where('name','like','%'.$product_search.'%')->where('status',1)->paginate(4);
        $latestProducts = Products::where(['latest_product'=>1])->get();
        $featuredProducts = Products::where(['featured_product'=>1])->get();
        $blogs = Blog::where(['status'=>1])->latest()->paginate(4);
        // Cart
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
        return view('wayshop.index')->with(compact('product_banners','new_arrival','product_search','searchProducts','home_settings','banners','categories','products','latestProducts','featuredProducts','blogs','userCart'));
    }

    

    public function categories($category_id){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Products::where(['category_id'=>$category_id])->paginate(6);
        $product_name = Products::where(['category_id'=>$category_id])->first();
        $home_settings = HomeSetting::latest()->first();
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
        return view('wayshop.category')->with(compact('categories','products','product_name','home_settings','userCart'));
    }

   
    public function allcategories()
    {
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $home_settings = HomeSetting::latest()->first();
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
        return view('wayshop.all_category')->with(compact('home_settings','userCart','categories'));
    }


    public function aboutus()
    {
        $aboutus_banners = AboutUs::first();
        $aboutus_service = AboutUs::whereIn('id', [6, 7, 8])->get();
        $aboutus_testimonials = AboutUs::whereIn('id', [10, 11, 12])->get();
        $aboutus_staff = AboutUs::whereIn('id', [13, 14, 15, 16, 17])->get();
        $home_settings = HomeSetting::latest()->first();
        $categories = Category::with('categories')->where(['parent_id'=>0])->latest()->paginate(12);
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
        return view('wayshop.aboutus')->with(compact('home_settings','categories','aboutus_banners','aboutus_testimonials','aboutus_service','aboutus_staff','userCart'));
    }
    
    public function blog()
    {
        $categories = Category::with('categories')->where(['parent_id'=>0])->latest()->paginate(7);
        $home_settings = HomeSetting::latest()->first();
        $blogs = Blog::where(['status'=>1])->paginate(6);
        $latest_blog = Blog::where(['status'=>1])->latest()->paginate(4);
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
        return view('wayshop.blog')->with(compact('home_settings','categories','blogs','latest_blog','userCart'));
    }

    public function blogDetail($id)
    {
        $blogs = Blog::find($id);
        $categories = Category::with('categories')->where(['parent_id'=>0])->latest()->paginate(7);
        $latest_blog = Blog::where(['status'=>1])->latest()->paginate(4);
        $home_settings = HomeSetting::latest()->first();
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
        return view('wayshop.blog_detail')->with(compact('home_settings','categories','blogs','latest_blog','userCart'));
    }

    public function contact()
    {
        $categories = Category::with('categories')->where(['parent_id'=>0])->latest()->paginate(12);
        $home_settings = HomeSetting::latest()->first();
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
        return view('wayshop.contact')->with(compact('home_settings','categories','userCart'));
    }

    
    public function contactStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        $notification = array(
            'message' => 'Message send Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


     /*
     AJAX request
     */
     public function getEmployees(Request $request){
  
        $search = $request->search;
  
        if($search == ''){
           $employees = Products::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $employees = Products::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($employees as $employee){
           $response[] = array("value"=>$employee->id,"label"=>$employee->name);
        }
  
        return response()->json($response);
     }
}
