<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class OrderController extends Controller
{
    public function index() {
        $dataUnpaid = Checkout::where('status', 'Unpaid')->orderBy('created_at', 'desc')->get();
        $dataPaid = Checkout::where('status', 'Paid')->orderBy('created_at', 'desc')->get();

        return view('admin.orders', compact('dataUnpaid', 'dataPaid'));
    }

    public function update(Request $request) {
        try {
            $invoiceId = $request->query('invoice');

            $validation = $request->validate([
                'status' => 'string'
            ]);

            Checkout::where('invoice', $invoiceId)->update($validation);
            return response()->json(['success' => true ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500); 
        }
    }

    public function getOrder(Request $request) {
        try {        
            $data = DB::table('checkouts')
                        ->leftJoin('products', 'checkouts.product_id', '=', 'products.id')
                        ->leftJoin('cities', 'checkouts.city', '=', 'cities.id')
                        ->leftJoin('provinces', 'checkouts.province', '=', 'provinces.id')
                        ->select('checkouts.invoice', 'checkouts.name', 'checkouts.no_hp', 'checkouts.address', 'cities.name as city', 'provinces.name as province', 'checkouts.zipcode', 'checkouts.courier', 'products.name as product', 'checkouts.price', 'checkouts.qty', 'checkouts.shipping_cost', 'checkouts.total', 'checkouts.status', 'checkouts.created_at as time_order')
                        ->where('checkouts.invoice', $request->query('invoice'))
                        ->get();
            return response()->json(['success' => true, 'data' => $data ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500); 
        }
    }
}
