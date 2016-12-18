@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Додати патруль</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/patrols/add') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Оберіть склад патруля</label>
                                <div class="col-md-8">
                                    @foreach ($users as $user)
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <input type="checkbox" name="users[{{ $loop->index }}]" value="{{ $user->id }}">
                                                {{ $user->name }} ({{ $user->email }})
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="radio" name="leader" value="{{ $user->id }}" checked>
                                                <span></span>Лідер</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">Місто патрулювання</label>

                                <div class="col-md-6">
                                    <input id="city" class="form-control" name="city" value="{{ old('city') }}" required>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-4 control-label">Період патрулювання</label>

                                <div class="col-md-6">
                                    <div class="input-group input-daterange">
                                        <input id="start_date" name="start_date" type="text" class="form-control">
                                        <span class="input-group-addon">до</span>
                                        <input id="end_date" name="end_date" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Додати патруль
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
