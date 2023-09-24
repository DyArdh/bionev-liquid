<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\City;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index() {
        $provinces = Province::all();

        return view("user.checkout", ["provinces" => $provinces]);
    }

    public function payment(Request $request) {
        if (!$request->has('invoice')) {
            return redirect()->route('checkout');
        }

        $data = Checkout::firstWhere('invoice', $request->query('invoice'));

        return view("user.payment", compact('data'));
    }

    public function storePayment(Request $request) {
        $min = 1000000000;
        $max = 9999999999;
        $randomNumber = mt_rand($min, $max);
        $invoiceID = "INV-" . date("Ymd") . "-" . str_pad($randomNumber, 10, '0', STR_PAD_LEFT);

        $data = $request->validate([
            'name' => 'required',
            'no_hp' => 'required|min:10|max:13',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'courier' => 'required',
            'qty' => 'required|numeric',
        ]);

        $product = Product::first();
        $productWeight = $product->weight * $request->qty;
        $shippingCost = Http::asForm()->withHeaders([
            "key" => "4930838704876d8aa5335a730bc8f4d4",
        ])->post("https://api.rajaongkir.com/starter/cost", [
            "origin" => "256",
            "destination" => $request->city,
            "weight" => $productWeight,
            "courier" => $request->courier,
        ]);

        $cost = $shippingCost->json();
        $uniqueCode = substr($invoiceID, -3);

        $data['price'] = $product->price;
        $data['shipping_cost'] = (int)$cost['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
        $data['total'] = ($product->price * $request->qty) + (int)$cost['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'] + (int)$uniqueCode;
        $data['invoice'] = $invoiceID;
        $data['product_id'] = $product->id;
        $data['user_id'] = Auth::user()->id;

        
        Checkout::create($data);

        return redirect("/checkout/payment?invoice=$invoiceID");
    }

    public function getCity($id) {
        $city = City::where('province_id', $id)->get();

        return compact('city');
    }

    public function getShippingCost(Request $request) {
        $shippingCost = Http::asForm()->withHeaders([
            "key" => "4930838704876d8aa5335a730bc8f4d4",
        ])->post("https://api.rajaongkir.com/starter/cost", [
            "origin" => "256",
            "destination" => $request->query("destination"),
            "weight" => $request->query("weight"),
            "courier" => $request->query("courier"),
        ]);

        return $shippingCost->json("rajaongkir.results");
    }
}
