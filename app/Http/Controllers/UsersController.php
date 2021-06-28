<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use App\Country;
use App\Category;
use App\HomeSetting;
use DB;
use App\Products;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function userLoginRegister(){
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
        return view('wayshop.users.login_register')->with(compact('home_settings','categories','userCart'));
    }

        public function register(Request $request){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>";print_r($data);die;
                $userCount = User::where('email',$data['email'])->count();
                if($userCount>0){
                    $notification = array(
                        'message' => 'Email is already exist',
                        'alert-type' => 'info'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    //adding user in table
                    $user = new User;
                    $user->name = $data['name'];
                    $user->email = $data['email'];
                    $user->password = bcrypt($data['password']);
                    $user->save();

                    if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                        Session::put('frontSession',$data['email']);
                        // if(!empty(Session::get('session_id'))){
                        //     $session_id = Session::get('session_id');
                        //     DB::table('cart'->where('session_id',$session_id))->update(['email'=>$data['email']]);
                        // }   
                        return redirect('/cart');
                }
            }
        }
    }
    public function logout(){
        Session::forget('frontSession');
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
         //    echo "<pre>";print_r($data);die;
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                $userStatus = User::where(['email'=>$data['email']])->first();
                if($userStatus->status == 0){
                    $notification = array(
                        'message' => 'Your account is temporary block !!  Please request to admin for Unblock  !',
                        'alert-type' => 'info'
                    );
                    return redirect()->back()->with($notification);
                }
                Session::put('frontSession',$data['email']);
                // if(!empty(Session::get('session_id'))){
                //     $session_id = Session::get('session_id');
                //     DB::table('cart'->where('session_id',$session_id))->update(['email'=>$data['email']]);
                // }   
                return redirect('/');
            }else{
                $notification = array(
                    'message' => 'Invalid username and password!!  Please enter your valid email and password  !',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }
//User account
    public function account(Request $request){
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
        return view('wayshop.users.account')->with(compact('home_settings','categories','userCart'));
    }

//Change password
        public function changePassword(Request $request){
            $categories = Category::with('categories')->where(['parent_id'=>0])->latest()->paginate(12);
            $home_settings = HomeSetting::latest()->first();
            if($request->isMethod('post')){
                $data = $request->all();
                $old_pwd = User::where('id',Auth::User()->id)->first();
                $current_password = $data['current_password'];
                if(Hash::check($current_password,$old_pwd->password)){
                    $new_pwd = bcrypt($data['new_pwd']);
                    User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                    $notification = array(
                        'message' => 'Yours Password is Changed Now!  Please use this password for futher login',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'Old Password is Incorrect!  Please enter correct old password',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
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
            return view('wayshop.users.change_address')->with(compact('home_settings','categories','userCart'));
        }
//Change address
        public function changeAddress(Request $request){
            $user_id = Auth::user()->id;
            $userDetails = User::find($user_id);
        //    echo "<pre>";print_r($userDetails);die;
        if($request->isMethod('post')){
            $data = $request->all();
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
            $notification = array(
                'message' => 'Account Details Has Been Updated!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            
        }
            $countries = Country::get();
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
        return view('wayshop.users.change_address')->with(compact('countries','userDetails','home_settings','categories','userCart'));
        }
}
