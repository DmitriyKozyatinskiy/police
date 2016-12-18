@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $patrol->city }} ({{ $patrol->start_date->toDateString() }} - {{ $patrol->end_date->toDateString() }})</div>
                    <div class="panel-body">
                        <a href="{{ url('/patrols/show') }}">Назад</a>
                        @if ($isMember)
                            &nbsp;&nbsp;&nbsp;<a href="{{ url('protocols/add/' . $patrol->id) }}">Додати протокол</a>
                        @endif
                        <br><br>
                        <ul>
                            <li>Місто: {{ $patrol->city }}</li>
                            <li>Дата початку: {{ $patrol->start_date->toDateString() }}</li>
                            <li>Дата кінця: {{ $patrol->end_date->toDateString() }}</li>
                            <li>
                                Лідер патруля: <a href="{{ url('users/show/' . $leader->id) }}">{{ $leader->name }}</a>
                            </li>
                            <li>Члени патруля:</li>
                            <ul>
                                @foreach ($members as $member)
                                    <li>
                                        <a href="{{ url('users/show/' . $member->id) }}">{{ $member->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <li>Протоколи патруля:</li>
                            <ul>
                                @foreach ($protocols as $protocol)
                                    <li>
                                        <a href="{{ url('protocols/show/' . $protocol->id) }}">{{ $protocol->purpose }}</a>
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
