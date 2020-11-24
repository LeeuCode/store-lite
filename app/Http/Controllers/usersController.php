<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.users');
    }

    public function create()
    {
        return view('admin.user-create');
    }

    public function save(Request $request)
    {
        $user = new User();

        $file = $request->file('image');
        $image = rand(). '.' .$file->getClientOriginalExtension();
        $file->move(\public_path('avatars'),$image);

        $storeOption = $request->store_option;
        $storeIDs = json_encode($request->store_ids);
        $storePermation = json_encode($request->storePermation);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $image;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->is_home = $request->home;
        $user->modulePermissions = json_encode($request->modulePermissions);
        $user->store_option = $storeOption;
        $user->store_ids = ($storeOption == 'custom') ? $storeIDs : '{}' ;
        $user->storePermation = ($storeOption == 'custom') ? $storePermation : '{}' ;
        $user->save();

        \Session::flash('status', ' أضافة الصنف إلي النظام');

        return back();
    }

    public function edit($id)
    {
        # code...
    }

    public function profile($id)
    {
        return view('admin.user-profile');
    }
}
