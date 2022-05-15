<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        return view('user.login');
    }

    public function login(Request $request) {
        $email = $request->get('email');
        $password = $request->get('password');

        try {

            /** @var  $user User */
            $user = User::where('email', $email)->where('password', $password)->first();
            if ($user) {
                return redirect('home');
            } else {
                return Redirect::back()->withErrors(['msg' => 'Email or Password not correct']);
            }
        } catch (\Exception $exception) {
            return Redirect::back()->withErrors(['msg' => $exception->getMessage()]);
        }
    }

    public function registerUser() {
        return view('user.register');
    }


    public function register(Request $request) {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $user = new User();

            $user->name = $name;
            $user->email = $email;
            $user->password = $password;

            $user->save();

            return redirect('');
        } catch (\Exception $exception) {
            return Redirect::back()->withErrors(['msg' => $exception->getMessage()]);
        }
    }

    public function home() {

        return view('welcome');
    }
}
