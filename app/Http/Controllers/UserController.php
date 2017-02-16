<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Patrol;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    protected function showUserForm()
    {
        return view('users/add');
    }

    /**
     * Create a new user.
     *
     * @param Request $data
     * @return User
     */
    protected function addUser(Request $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        return redirect()->route('user', ['id' => $user->id]);
    }


    /**
     * Show users
     *
     */
    protected function show($id = null)
    {
        if ($id) {
            $user = User::find($id);
            $patrols = $user->patrols;
            $protocols = $user->protocols;
            return view('users/user', [
                'user' => $user,
                'patrols' => $patrols,
                'protocols' => $protocols
            ]);
        } else {
            $isAdmin = Auth::user()->role === 'admin';

            $users = User::all();
            return view('users/all', ['users' => $users, 'isAdmin' => $isAdmin]);
        }
    }

    /**
     * Search for user
     *
     */
    protected function search(Request $data)
    {
        if ($data->search) {
            $users = User::where('name', 'LIKE', '%' . $data->search . '%')->get();
        } else {
            $users = User::all();
        }
        $isAdmin = Auth::user()->role === 'admin';
        return view('users/all', ['users' => $users, 'search' => $data->search, 'isAdmin' => $isAdmin]);
    }
}
