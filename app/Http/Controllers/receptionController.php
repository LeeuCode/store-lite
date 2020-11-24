<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Store;
use App\models\Item;
use App\models\Reception;
use App\models\Reception_item;
use App\models\Quantity;
use DB;

class receptionController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($req = 'index', $id = 0)
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['id'] = 0;

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

        $data['stores'] = Store::all();
        return view('admin.reception-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

            // Prepare Item data to save in Reception_items table.
            $receptionItem = new Reception_item();
            $receptionItem->reception_id = $reception->id;
            $receptionItem->item_id = $item_id[$id];
            //$receptionItem->item_id = $item_id[$id];
            $receptionItem->store_id = $storId;
            $receptionItem->quantity = $quantity[$id];
            // Save data as a new column in Reception_items table.
            $receptionItem->save();

            // Get Quantity where item_id & store_id columns.
            $item = Quantity::where('item_id', $item_id[$id])
                            ->where('store_id',$storId);

            /**
             * - Check if items > 0 or not.
             * - If tems count > 0 update item_quantity column.
             * - Else add column to Quantity table.
             */  
            if($item->count() > 0 ) {
                // Get item_quantity value.
                $_quantity = $item->firstOrFail()->item_quantity;
                $item->update(array(
                    'item_quantity'=>( $_quantity + $quantity[$id] )
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
