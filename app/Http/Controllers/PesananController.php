<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index() {
        $pesanan = Checkout::all();

        return view('user.riwayat', compact('pesanan'));
    }

    public function detail(Request $request) {
        if (!$request->has('invoice')) {
            return redirect()->route('pesanan');
        }

        $data = Checkout::firstWhere('invoice', $request->query('invoice'));

        return view('user.riwayatDetail', compact('data'));
    }
}
