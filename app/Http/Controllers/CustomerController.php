<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(array $data)
    {
        if($data['isAdmin']){
            return View::make("customerpage")->with($data);
        }else{
            return View::make("homepage")->with($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $user = User::create([
            'id' => Str::random(30), 
            'name' => $request->input('name'),
             'email' => $request->input('email'),
             'password' => bcrypt($request->input('password')),
        ]);

        $file_path = public_path() .'/profile.png';
    
        $destination_path = public_path() . '/photo/';
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $file_extension = $file->getClientOriginalName();
            $filename = $file_extension;
            $request->file('photo')->move($destination_path, $filename);
        }else{
            $filename = 'profile.png';
            copy($file_path, $destination_path .$filename);
        }

        $customer = Customer::create([
            'userId' => $user->id,
            'name' => $request->input('name'),
             'status' => 'INACTIVE',
             'photo' => $filename
        ]);

        return 'Customer registered, please wait for admin confirmation';
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function showDetail(string $id)
    {
        
        $customer =  Customer::where('userId',$id)->first();
       
        $data = array(
            'isLogin'=>Auth::check(),
            'isAdmin'=>true,
            'customer'=>$customer
            );
        return View::make("customerdetail")->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $update = Customer::where('id', $id)->update(['status' => 'ACTIVE']);
        $customers =  Customer::with('user')->get();
        $data = array(
            'isLogin'=>Auth::check(),
            'isAdmin'=>true,
            'customers'=>$customers,
            'message'=>'Customer Approved'
            );
        return View::make("customerpage")->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
