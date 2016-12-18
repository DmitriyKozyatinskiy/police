@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/users/show') }}">Назад</a>
                        <br><br>
                        <ul>
                            <li>ФІО: {{ $user->name }}</li>
                            <li>Email: {{ $user->email }}</li>
                            <li>Патрулі користувача:</li>
                            <ul>
                                @foreach ($patrols as $patrol)
                                    <li>
                                        <a href="{{ url('/patrols/show/' . $patrol->id) }}">
                                            {{$patrol->city}} ({{ $patrol->start_date->toDateString() }} - {{ $patrol->end_date->toDateString() }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <li>Протоколи користувача:</li>
                            <ul>
                                @foreach ($protocols as $protocol)
                                    <li>
                                        <a href="#">{{ $protocol->purpose }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
