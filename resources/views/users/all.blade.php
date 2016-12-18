@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Користувачі</div>
                    <div class="panel-body">
                        <form class="form-inline" method="POST" action="{{ url('/users/show') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input name="search" class="form-control" id="search" placeholder="Пошук">
                            </div>
                            <button type="submit" class="btn btn-default">Знайти користувача</button>
                        </form>
                        <br>

                        <a href="{{ url('/users/add') }}">Додати користувача</a>
                        <br><br>
                        <ul>
                            @foreach ($users as $user)
                                <li>
                                    <a href="{{ url('/users/show/' . $user->id) }}">{{ $user->name }} ({{ $user->email  }})</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
