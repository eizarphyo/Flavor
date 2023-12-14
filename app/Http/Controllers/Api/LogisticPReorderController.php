<?php

namespace App\Http\Controllers\api;

use App\Models\Preorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogisticPReorderController extends Controller
{
    public function index(){
        $preorder_data = Preorder::select('preorders.*','customers.name as customer_name','customers.region as customer_region','customers.address as customer_address','preorder_items.order_count')
        ->leftJoin('customers','preorders.customer_id','customers.id')
        ->leftJoin('preorder_items','preorders.id','preorder_items.preorder_id')
        ->leftJoin('products','preorder_items.product_id','products.id')
        ->orderBy('preorders.id')
        ->get();


        return response()->json([
         'status' => 'success',
         'preorder_data' => $preorder_data
        ], 200);
     }
}
