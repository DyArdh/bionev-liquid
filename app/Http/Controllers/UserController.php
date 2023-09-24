<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');;
        }
    }

    public function login() {
        return view('auth/login');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function profile() {
        return view('user.profile');
    }

    public function updateProfile(Request $request) {
        try {
            $userId = Auth::user()->id;

            $validation = $request->validate([
                'name' => 'string|max:40',
                'bod' => 'string|max:40',
                'gender' => 'string',
                'address' => 'string',
                'phone' => 'string|min:10|max:13',
                'email' => 'string|unique|max:40',
                'password' => 'string',
            ]);

            User::where('id', $userId)->update($validation);
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
}
