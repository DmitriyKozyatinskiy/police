@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    Ви увійшли в систему
                    <h4>
                        <a href="{{ url('/users') }}">Користувачі</a>
                    </h4>
                    <h4>
                        <a href="{{ url('/patrols') }}">Патрулі</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
