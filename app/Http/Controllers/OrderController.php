<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $data = Checkout::where('status', 'Unpaid');

        return view('admin.orders');
    }
}
