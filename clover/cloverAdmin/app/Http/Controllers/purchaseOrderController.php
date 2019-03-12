<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
use App\PurchaseOrderDetail;

class purchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = PurchaseOrder::orderBy('id')->get();
        return view('purchaseOrder.listPurchaseOrder', compact('order'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'userId' => 'required',  
            'name' => 'required',  
            'mobile' => 'required',
            'landmark' => 'required',
            'town' => 'required',
            'adressType' => ''
         ]);
         
         $purchaseOrderDb = new PurchaseOrder;
         $purchaseOrderDb->user_id = $request->input('userId');
         $purchaseOrderDb->name = $request->input('name');
         $purchaseOrderDb->mobile = $request->input('mobile');
         $purchaseOrderDb->landmark = $request->input('landmark');
         $purchaseOrderDb->city = $request->input('town');
         $purchaseOrderDb->address_type = $request->input('adressType');
         $purchaseOrderDb->order_total = $request->input('orderTotal');
         $purchaseOrderDb->save();

         $products = json_decode($request->orderDetail);
         $finalArray = array();
         foreach ($products as $key=>$value){
            array_push($finalArray, array(
                'user_id'=>$request->input('userId'),
                'product_id'=>$value->id,
                'category'=>$value->category,
                'name'=>$value->name,
                'description'=>$value->description,
                'image_url'=>$value->image_url,
                'price'=>$value->price,
                )
            );
        }
        PurchaseOrderDetail::insert($finalArray);
        return ['success'=> true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = PurchaseOrder::find($id);
        return view('purchaseOrder.showPurchaseOrder', compact('item'));
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