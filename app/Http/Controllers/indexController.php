<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Item;
use App\models\Store;
use App\models\Company;
use App\models\Category;
use App\models\Unity;

use App\models\Reception_item;
use App\User;
use DB;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        /*
        $user = User::find(1);
        $allItemsIds = $user->action()
                        ->where('module_name','items')
                        ->where('action','add')
                        ->pluck('module_id')
                        ->toArray();
        dd(Item::whereIn('id',$allItemsIds)->get());
        die();
        */

        

        return view('admin.master');
    }

    /**
     * Get all store names for view it
     * in input field by Json.
     * ===============================
     * = use in files view path 'admin' in line:-
     * = (index:34 | store-create:230 | store-edit:154 )
     * ===============================
     */
    public function stores(Request $request)
    {
        /* ====== Get value from search input. ====== */
        $search = $request->get('search');

        /* ====== Get all store name where like search input value. ====== */
        $data = Store::select(['id', 'name'])
                ->where('name', 'like', '%' . $search . '%')
                ->orderBy('name')
                ->paginate(7);
                
        /* ====== Return store names as json. ====== */
        return response()->json(
            ['items' => $data->toArray()['data'],
            'pagination' => $data->nextPageUrl() ? true : false]
        );
    }

    public function companies(Request $request)
    {
        $search = $request->get('search');
        $data = Company::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(7);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function categories(Request $request)
    {
        $search = $request->get('search');
        $data = Category::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(7);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function unities(Request $request)
    {
        $search = $request->get('search');
        $data = Unity::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(7);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
}
