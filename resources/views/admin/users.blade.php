@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Користувачі</div>
                    <div class="panel-body">
                        <a href="{{ url('/add_patrol') }}">Додати користувача</a>
                        <ul>
                            @foreach ($users as $user)
                                <li>{{ $user->name }} ({{ $user->email  }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
