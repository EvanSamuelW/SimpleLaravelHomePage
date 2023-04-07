<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Requests\StoreCustomerRequest;
use Integer;
use Session;
use View;

class LoginController extends Controller
{
 
    public function index()
    {
        return view('login');
    }  

   public function login(Request $request){

    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);

    $credentials = $request->only('email','password');
    if (Auth::attempt($credentials)){
        $isAdmin = false;
        if (Admin::where('userId', Auth::id())->count() > 0) {
            $isAdmin = true;
            $customers =  Customer::with('user')->get();
           
            $data = array(
                'isLogin'=>Auth::check(),
                'isAdmin'=>$isAdmin,
                'customers'=>$customers
                );
            return View::make("customerpage")->with($data);
         }else{
            if(Customer::where('userId',Auth::id())->first()->status == 'INACTIVE'){
                return redirect()->intended('login')->with('message','This customer is not approved yet');
            }
            return $this->homepage($isAdmin);
         }
    }

    return redirect()->intended('login')->with('message','Login Details are not valid');

   }

   public function signup()
   {
       return view('register');
   }

   public function signupsave(StoreCustomerRequest $request)
   {  
           
       $check =(new CustomerController)->store($request);
       return redirect()->intended('login')->with('message','This customer is registered. Please wait for admin approval');
   }

   public function homepage(bool $isAdmin)
   {
    $products = (new ProductController)->index();
    $banners = (new BannerController)->index();

    $data = array(
        'products'=>$products,
        'banners'=>$banners,
        'isLogin'=>Auth::check(),
        'isAdmin'=>$isAdmin
        );

       
       return (new CustomerController)->index($data);
   }
   public function signOut() {
    Session::flush();
    Auth::logout();

    return $this->homepage(false);
}
}
