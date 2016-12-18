@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Протоколи</div>
                    <div class="panel-body">
                        <br><br>
                        <ul>
                        @foreach ($protocols as $protocol)
                            <li>
                                <a href="{{ url('/protocols/show/' . $protocol->id) }}">{{ $protocol->purpose }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
