@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Патрулі</div>
                    <div class="panel-body">
                        <a href="{{ url('/patrols/add') }}">Додати патруль</a>
                        <br><br>
                        <ul>
                        @foreach ($patrols as $patrol)
                            <li>
                                <a href="{{ url('/patrols/show/' . $patrol->id) }}">
                                    {{ $patrol->city }} ({{ $patrol->start_date->toDateString()  }} - {{ $patrol->end_date->toDateString() }})
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
