<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Item;
use App\models\Company;
use App\models\Category;
use App\models\Unity;

class ItemsController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = Item::paginate(15);
        return view('admin.items', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item_id = (item::orderBy('id', 'desc')->firstOrFail()->id + 1);

        if($item_id < 10) {
            $item_id = '0'.$item_id; 
        }

        $data['companies'] = Company::all();
        $data['categories'] = Category::all();
        $data['unities'] = Unity::all();
        $data['barcode_id'] = $item_id;
        return view('admin.item-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // `barcode`, `name`, `company_id`, `category_id`, `unity_id`, `minimum`, `created_at`, `updated_at`
        $item = new Item();
        $item->barcode = $request->input('barcode');
        $item->name = $request->input('name');
        $item->company_id = $request->input('company_id');
        $item->category_id = $request->input('category_id');
        $item->unity_id = $request->input('unity_id');
        $item->minimum = $request->input('minimum');
        $item->save();

        \Session::flash('status', ' أضافة الصنف إلي النظام');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
