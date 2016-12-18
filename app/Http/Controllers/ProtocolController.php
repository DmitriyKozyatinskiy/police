<?php

namespace App\Http\Controllers;

use Auth;
use App\Protocol;
use App\User;
use App\Patrol;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProtocolController extends Controller
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
    protected function showProtocolForm($patrolId)
    {
        return view('protocols/add', ['patrolId' => $patrolId]);
    }

    /**
     * Create a new protocol.
     *
     * @param Request $data
     * @return resource
     */
    protected function addProtocol(Request $data)
    {
        $protocol = new Protocol;
        $protocol->violator = $data->violator;
        $protocol->victim = $data->victim;
        $protocol->address = $data->address;
        $protocol->purpose = $data->purpose;
        $user = Auth::user();
        $protocol->user()->associate($user);
        $patrol = Patrol::find($data->patrolId);
        $protocol->patrol()->associate($patrol);
        $protocol->save();

        return redirect()->route('protocol', ['id' => $protocol->id]);
    }


    /**
     * Show protocols
     *
     */
    protected function show($id = null)
    {
        if ($id) {
            $protocol = Protocol::find($id);
            $author = $protocol->user;
            $patrol = $protocol->patrol;

            return view('protocols/protocol', [
                'protocol' => $protocol,
                'author' => $author,
                'patrol' => $patrol
            ]);
        } else {
            $protocols = Protocol::all();
            return view('protocols/all', ['protocols' => $protocols]);
        }
    }
}
