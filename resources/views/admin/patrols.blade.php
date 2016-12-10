@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Патрулі</div>
                    <div class="panel-body">
                        <a href="{{ url('/add_patrol') }}">Додати патруль</a>
                        @foreach ($patrols as $patrol)
                            <div>
                                <h4>Члени патруля</h4>
                                <ul>
                                    @foreach ($patrol->users as $user)
                                        <li>{{ $user->name }} ({{ $user->email }})</li>
                                    @endforeach
                                </ul>
                                <div>Лідер: {{ $patrol->leader->name }}</div>
                                <div>Місто: {{ $patrol->city }}</div>
                                <div>Дата початку: {{ $patrol->start_date }}</div>
                                <div>Дата кінця: {{ $patrol->end_date }}</div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
