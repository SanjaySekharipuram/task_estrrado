<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function loginIndex(){
        
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }
        return view('admin.login_index');
    }

    
    public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');
        
            if (Auth::guard('admin')->attempt($credentials)) {
                return view('admin.index');
            }
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
    }

    public function vendorsList(){
        return view('admin.vendors');
    }


    public function getVendors(){
        $vendors = Vendor::all();
        
        return response()->json([
            'success' => true,
            'data' => $vendors,
        ]);
    }

    public function addVendor(Request $request){
        Vendor::create($request->all());

        return response()->json([
            'success' => true
        ]);
    }

    public function getSingleData(Request $request){
        $vendor = Vendor::find($request->id);

        return response()->json([
            'success' => true,
            'data' => $vendor,
        ]);

    }
    
    public function updateVendor(Request $request){
        $vendor = Vendor::find($request->id);
        
        $vendor->name = $request->name;
        $vendor->email = $request->email;

        if(!is_null($request->password))
        {
            $vendor->password = $request->password;
        }
     
        $vendor->save();
        return response()->json([
            'success' => true
        ]);
    }
}
