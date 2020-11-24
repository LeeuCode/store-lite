<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\models\Store;
use App\models\Item;
use App\models\Reception;
use App\models\Reception_item;
use App\models\Dismissal;
use App\models\Dismissal_item;
use App\models\Reactionary;
use App\models\Reactionary_item;
use App\models\Quantity;
use DB;

class TreasuryBondsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
    }

    public function reception($req = 'index', $id = 0)
    {
        if($req == 'index') {
            return view('admin.reception');
        } elseif($req == 'create') {
            return $this->receptionCreate();
        } elseif($req == 'json' && !empty($id)) { 

            $barcode = Item::select('id','name')->where('barcode', $id);
            
            if($barcode->count() > 0) {
                return $barcode->firstOrFail();
            } else {
                return '';
            }
        } elseif($req == 'item' && !empty($id)) { 

            $items = Item::where('name', 'like', ''.$id.'%');

            if($items->count() > 0) {
                return $items->get();
            } else {
                return '';
            }
        }
    }

    protected function receptionCreate()
    {
        $data['id'] = 0;
        $user = Auth::user();

        if(Reception::count() > 0 ) {
            $reception = (Reception::orderBy('id','desc')->firstOrFail()->id+1);

            if($reception < 10) {
                $data['id'] = '0'.$reception;
            } else {
                $data['id'] = $reception;
            }
        } else {
            $data['id'] = '01';
        }

        if ($user->store_option == 'all') {
            $data['stores'] = Store::all(); 
        } else {
            $stoeIDs = \json_decode($user->store_ids);
            $data['stores'] = Store::find($stoeIDs);
        }

        return view('admin.reception-create', $data);
    }

    protected function receptionSave(Request $request)
    {
        $barcodes = $request->input('barcode');
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $item_id = $request->input('item_id');
        $receptionId = $request->input('reception_id');
        $storId = $request->input('store_id');

        $reception = new Reception();
        $reception->barcode = $receptionId;
        $reception->store_id = $storId;

        $reception->save();

        foreach($barcodes as $id=>$val) {

            $receptionItem = new Reception_item();
            $receptionItem->reception_id = $reception->id;
            $receptionItem->item_id = $item_id[$id];
            $receptionItem->item_id = $item_id[$id];
            $receptionItem->store_id = $storId;
            $receptionItem->quantity = $quantity[$id];

            $receptionItem->save();

            $item = Quantity::where('item_id', $item_id[$id])
                            ->where('store_id',$storId);

            if($item->count() > 0 ) {
                $_quantity = $item->firstOrFail()->item_quantity;
                $item->update(array(
                    'item_quantity'=>($_quantity+$quantity[$id])
                ));
            } else {
                $quantityRow = new Quantity();
                $quantityRow->store_id	= $storId;
                $quantityRow->item_id	= $item_id[$id];
                $quantityRow->item_quantity	= $quantity[$id];
                $quantityRow->save();

            }   
        }

        return array('id'=>($reception->id+1),'message'=> 'تم حفظ الفاتوره رقم ('.$receptionId.') بنجاح');
    }


    function dismissal($req = 'index', $storeId = 0, $id = 0)
    {
        if($req == 'index') {
            // return view('admin.reception');
        } elseif($req == 'create') {
            return $this->dismissalCreate();
        } elseif($req == 'json' && !empty($storeId) && !empty($id)) { 


            $item = DB::table('items')->join('quantities','items.id', '=', 'quantities.item_id')
                        ->where('quantities.store_id', '=', $storeId)
                        ->where('items.barcode', '=', $id);

            if($item->count() > 0) {
                return response()->json($item->first());
            } else {
                return '';
            }
        } elseif($req == 'item' && !empty($storeId) && !empty($id)) { 

            $items = DB::table('items')->join('quantities','items.id', '=', 'quantities.item_id')
                        ->where('quantities.store_id', '=', $storeId)
                        ->where('items.name', 'like', '%'.$id.'%');

            if($items->count() > 0) {
                return $items->get();
            } else {
                return '';
            }
        }
    }

    function dismissalCreate()
    {

        $data['id'] = 0;
        $user = Auth::user();

        if(Dismissal::count() > 0 ) {
            $dismissal = (Dismissal::orderBy('id','desc')->firstOrFail()->id+1);

            if($dismissal < 10) {
                $data['id'] = '0'.$dismissal;
            } else {
                $data['id'] = $dismissal;
            }
        } else {
            $data['id'] = '01';
        }

        if ($user->store_option == 'all') {
            $data['stores'] = Store::all(); 
        } else {
            $stoeIDs = \json_decode($user->store_ids);
            $data['stores'] = Store::find($stoeIDs);
        }

        return view('admin.dismissal-create', $data);
    }

    public function dismissalSave(Request $request)
    {
        $barcodes = $request->input('barcode');
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $item_id = $request->input('item_id');
        $receptionId = $request->input('reception_id');
        $storId = $request->input('store_id');

        $reception = new Dismissal();
        $reception->barcode = $receptionId;
        $reception->store_id = $storId;

        $reception->save();

        foreach($barcodes as $id=>$val) {

            $receptionItem = new Dismissal_item();
            $receptionItem->dismissal_id = $reception->id;
            $receptionItem->item_id = $item_id[$id];
            $receptionItem->store_id = $storId;
            $receptionItem->quantity = $quantity[$id];

            $receptionItem->save();

            $item = Quantity::where('item_id', $item_id[$id])
                            ->where('store_id',$storId);

            if($item->count() > 0 ) {
                $_quantity = $item->firstOrFail()->item_quantity;
                $item->update(array(
                    'item_quantity'=>($_quantity-$quantity[$id])
                ));
            }
        }
        return array('id'=>($reception->id+1),'message'=> 'تم حفظ الفاتوره رقم ('.$receptionId.') بنجاح');
    }

    public function reactionary($req = 'index', $storeId = 0, $id = 0)
    {
        if($req == 'index') {
            // return view('admin.reception');
        } elseif($req == 'create') {
            return $this->reactionaryCreate();
        } elseif($req == 'json' && !empty($storeId) && !empty($id)) { 


            $item = DB::table('items')->join('quantities','items.id', '=', 'quantities.item_id')
                    ->select('items.id','items.name')
                    ->where('quantities.store_id', '=', $storeId)
                    ->where('items.barcode', '=', $id);

            if($item->count() > 0) {
                return response()->json($item->first());
            } else {
                return '';
            }
        } elseif($req == 'item' && !empty($storeId) && !empty($id)) { 

            $items = DB::table('items')->join('quantities','items.id', '=', 'quantities.item_id')
                        ->where('quantities.store_id', '=', $storeId)
                        ->where('items.name', 'like', '%'.$id.'%');

            if($items->count() > 0) {
                return $items->get();
            } else {
                return '';
            }
        }
    }


    public function reactionaryCreate()
    {
        $data['id'] = 0;
        $user = Auth::user();

        if(Reactionary::count() > 0 ) {
            $dismissal = (Reactionary::orderBy('id','desc')->firstOrFail()->id+1);

            if($dismissal < 10) {
                $data['id'] = '0'.$dismissal;
            } else {
                $data['id'] = $dismissal;
            }
        } else {
            $data['id'] = '01';
        }

        if ($user->store_option == 'all') {
            $data['stores'] = Store::all(); 
        } else {
            $stoeIDs = \json_decode($user->store_ids);
            $data['stores'] = Store::find($stoeIDs);
        }

        return view('admin.reactionary-create', $data);
    }

    public function reactionarySave(Request $request)
    {
        $barcodes = $request->input('barcode');
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $item_id = $request->input('item_id');
        $receptionId = $request->input('reception_id');
        $storId = $request->input('store_id');

        $reception = new Reactionary();
        $reception->barcode = $receptionId;
        $reception->store_id = $storId;

        $reception->save();

        foreach($barcodes as $id=>$val) {

            $receptionItem = new Reactionary_item();
            $receptionItem->reactionary_id = $reception->id;
            $receptionItem->item_id = $item_id[$id];
            $receptionItem->item_id = $item_id[$id];
            $receptionItem->store_id = $storId;
            $receptionItem->quantity = $quantity[$id];

            $receptionItem->save();

            $item = Quantity::where('item_id', $item_id[$id])
                            ->where('store_id',$storId);

            if($item->count() > 0 ) {
                $_quantity = $item->firstOrFail()->item_quantity;
                $item->update(array(
                    'item_quantity'=>($_quantity+$quantity[$id])
                ));
            } else {
                $quantityRow = new Quantity();
                $quantityRow->store_id	= $storId;
                $quantityRow->item_id	= $item_id[$id];
                $quantityRow->item_quantity	= $quantity[$id];
                $quantityRow->save();

            }   
        }
        return array('id'=>($reception->id+1),'message'=> 'تم حفظ الفاتوره رقم ('.$receptionId.') بنجاح');
    }

}
