<?php

namespace App\Http\Controllers;

use App\User;
use App\Patrol;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Show users
     *
     */
    protected function users()
    {
        $users = User::all();
        return view('users/all', ['users' => $users]);
    }

    /**
     * Show patrol form
     *
     */
    protected function showPatrolForm()
    {
        return view('patrols/add');
    }

    /**
     * Show patrol form
     *
     * @param Request $data
     * @return Patrol
     */
    protected function addPatrol(Request $data)
    {
        $patrol = new Patrol;
        $patrol->leader = $data->leader;
        $patrol->city = $data->city;
        $patrol->start_date = $data->start_date;
        $patrol->end_date = $data->end_date;
        $patrol->save();
        $users = User::find($data['users']);
        $users->each(function($user) use ($patrol) {
            $user->patrols()->attach($patrol);
        });

        return $patrol;
    }


    /**
     * Show patrol form
     *
     */
    protected function showPatrols()
    {
        $patrols = Patrol::all();
        $patrols->each(function($patrol) {
            $users = $patrol->users;
            $patrol['users'] = $users;
            $leader = User::find($patrol->leader);
            $patrol['leader'] = $leader;
        });
        return view('patrols/all', ['patrols' => $patrols]);
    }
}
