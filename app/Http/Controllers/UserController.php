<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
     {
        $this->middleware('auth');
        $this->middleware('admin');
     }
     
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors([
                    'email' => 'Please login to access the dashboard.',
                ])
                ->onlyInput('email');
        }

        $users = User::get();
        return view('auth.users')->with('users', $users);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $file = public_path('/storage/' . $user->photo);

        try {
            if (File::exists($file)) {
                File::delete($file);
            }
            $user->delete();
            return redirect('users')->with('success', 'Berhasil hapus data');
        } catch (\Throwable $th) {
            return redirect('users')->with('error', 'Gagal hapus data');
        }
    }
}
