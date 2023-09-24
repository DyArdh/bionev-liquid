<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index() {
        $data = User::where('role', 'User')->orderBy('name', 'asc')->get();

        return view('admin.users', compact('data'));
    }
}
