@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $protocol->purpose }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/protocols/show') }}">Назад</a>
                        <br><br>
                        <ul>
                            <li>
                                Патруль:
                                <a href="{{ url('patrols/show/' . $patrol->id) }}">
                                    {{ $patrol->city }} ({{ $patrol->start_date }} - {{ $patrol->end_date }})
                                </a>
                            </li>
                            <li>
                                Автор: <a href="{{ url('users/show/' . $author->id) }}">{{ $author->name }}</a>
                            </li>
                            <li>Дата: {{ $protocol->create_date }}</li>
                            <li>Причина: {{ $protocol->purpose }}</li>
                            <li>Злодій: {{ $protocol->violator }}</li>
                            <li>Постраждалий: {{ $protocol->victim }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

