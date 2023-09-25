<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

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

    public function changePassword(Request $request) {
        try {
            $userId = Auth::user()->id;

            $hashedPassword =User::find($userId)->password;
            $validation = $request->validate([
                'password' => 'string',
                'new_password' => 'string',
                'confirm_password' => 'string',
            ]);

            if ($validation['new_password'] !== $validation['confirm_password']) {
                return response()->json(['success' => false, 'message' => 'Konfirmasi password tidak sesuai!'], 400);
            }

            if (Hash::check($validation['password'], $hashedPassword)) {
                User::where('id', $userId)->update([
                    'password' => Hash::make($validation['new_password'], [
                        'rounds' => 12,
                    ]),
                ]);
                return response()->json(['success' => true, 'messange' => 'Password berhasil dirubah!' ], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Password yang anda masukkan tidak sesuai!'], 403);
            }

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

    public function renderRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $validation = $request->validate([
            'name' => 'string|max:40',
            'address' => 'string',
            'phone' => 'string|min:10|max:13',
            'email' => 'string|max:40',
            'password' => 'string'
        ]);

        User::create($validation);

        return redirect()->route('login');
    }
}
