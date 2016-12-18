@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    Ви увійшли в систему
                    <h4>
                        <a href="{{ url('/users/show') }}">Користувачі</a>
                        &nbsp;&nbsp;<a href="{{ url('/patrols/show') }}">Патрулі</a>
                        &nbsp;&nbsp;<a href="{{ url('/protocols/show') }}">Протоколи</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
