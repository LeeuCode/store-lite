<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\models\Store;
use App\models\Item;
use App\models\Reception;
use App\models\Reactionary;
use App\models\Dismissal;
use App\models\Reception_item;
use App\models\Reactionary_item;

class StoresController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->store_option == 'all') {
            $data['stores'] = Store::paginate(15);
        } else {
            $stoeIDs = \json_decode($user->store_ids);
            $data['stores'] = Store::whereIn('id',$stoeIDs)->paginate(15);
        }

        return view('admin.stores', $data);
    }

    public function edit($id)
    {
        $data['store'] = Store::find($id);
        $data['receptionsCount'] = Store::find($id)->receptions()->count();
        
        return view('admin.store.store-edit', $data);
    }

    public function create()
    {
        $barcode = Store::count();
        if($barcode > 0) {
            $barcode = (Store::orderBy('id', 'desc')->firstOrFail()->id + 1);

            if($barcode < 10) {
                $data['barcode'] = '0'.$barcode; 
            } else {
                $data['barcode'] = $barcode; 
            }
        } else {
            $data['barcode'] = '0'.($barcode + 1);
        }

        return view('admin.store-create', $data);
    }

    public function saveStore(Request $request)
    {
        $store = new Store();
        $store->barcode = $request->input('barcode');
        $store->name = $request->input('name');
        $store->phone = $request->input('phone');
        $store->address = $request->input('address');
        $store->notes = $request->input('notes');
        $store->save();

        \Session::flash('status', ' أضافة المخزن إلي النظام');

        return back();
    }

    public function items($id)
    {
        $data['store'] = Store::find($id);
        return view('admin.store.store-items', $data);
    }

    public function receptions($id)
    {
        $data['receptions'] = Reception::where('store_id', $id)->get();
        $data['store'] = Store::find($id);
        return view('admin.store.store-receptions', $data);
    }

    public function receptionBill($id)
    {
        $data['reception'] = Reception::find($id);
        return view('admin.store.store-reception-bill', $data);
    }

    public function dismissals($id)
    {
        $data['dismissals'] = Dismissal::where('store_id', $id)->get();
        $data['store'] = Store::find($id);
        return view('admin.store.store-dismissals', $data);
    }

    public function dismissalBill($id)
    {
        $data['dismissal'] = Dismissal::find($id);
        return view('admin.store.store-dismissal-bill', $data);
    }

    public function reactionaries($id)
    {
        $data['reactionaries'] = Reactionary::where('store_id', $id)->get();
        $data['store'] = Store::find($id);
        return view('admin.store.store-reactionaries', $data);
    }

    public function reactionaryBill($id)
    {
        $data['reactionary'] = Reactionary::find($id);
        return view('admin.store.store-reactionary-bill', $data);
    }
}
