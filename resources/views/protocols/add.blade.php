@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Додати протокол</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/protocols/add') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="patrolId" value="{{ $patrolId  }}">
                            <div class="form-group{{ $errors->has('violator') ? ' has-error' : '' }}">
                                <label for="violator" class="col-md-4 control-label">Порушник</label>
                                <div class="col-md-6">
                                    <input id="violator" class="form-control" name="violator" value="{{ old('violator') }}" required>

                                    @if ($errors->has('violator'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('violator') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('victim') ? ' has-error' : '' }}">
                                <label for="victim" class="col-md-4 control-label">Постраждалий</label>
                                <div class="col-md-6">
                                    <input id="victim" class="form-control" name="victim" value="{{ old('victim') }}">

                                    @if ($errors->has('victim'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('victim') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Адреса</label>
                                <div class="col-md-6">
                                    <input id="address" class="form-control" name="address" value="{{ old('address') }}">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('purpose') ? ' has-error' : '' }}">
                                <label for="purpose" class="col-md-4 control-label">Опис</label>
                                <div class="col-md-6">
                                    <textarea id="purpose" class="form-control" name="purpose" required>{{ old('purpose') }}</textarea>

                                    @if ($errors->has('purpose'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('purpose') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                <label for="tags" class="col-md-4 control-label">Теги</label>
                                <div class="col-md-6">
                                    <input id="tags" class="form-control" name="tags" value="{{ old('tags') }}">

                                    @if ($errors->has('tags'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Додати протокол
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
