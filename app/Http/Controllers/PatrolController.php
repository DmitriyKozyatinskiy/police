<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Patrol;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PatrolController extends Controller
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
     * Show patrol form
     *
     */
    protected function showPatrolForm()
    {
        $users = User::all();
        return view('patrols/add', ['users' => $users]);
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

        return redirect()->route('patrol', ['id' => $patrol->id]);
    }


    /**
     * Show patrol form
     *
     */
    protected function show($id = null)
    {
        if ($id) {
            $patrol = Patrol::find($id);
            $members = $patrol->users;
            $protocols = $patrol->protocols;
            $leader = User::find($patrol->leader);
            $currentUser = Auth::user();
            $isMember = count($members->filter(function ($member, $key) use ($currentUser) {
                return $member->id === $currentUser->id;
            }));
            return view('patrols/patrol', [
                'patrol' => $patrol,
                'members' => $members,
                'protocols' => $protocols,
                'leader' => $leader,
                'isMember' => $isMember
            ]);
        } else {
            $isAdmin = Auth::user()->role === 'admin';
            $patrols = Patrol::all();
            return view('patrols/all', ['patrols' => $patrols, 'isAdmin' => $isAdmin]);
        }
    }
}
