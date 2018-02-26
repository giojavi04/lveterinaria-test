@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ingreso nuevo servicio</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('records.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('post_id') ? ' has-error' : '' }}">
                                <label for="post_id" class="col-md-4 control-label">Nombre de la mascota:</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="post_id" required autofocus>
                                        @foreach($mascots as $mascot)
                                            <option value="{{$mascot->id}}">{{$mascot->pet_name}} ({{$mascot->user->first_name}} {{$mascot->user->last_name}})</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('post_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('post_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">
                                <label for="service_id" class="col-md-4 control-label">Nombre de la mascota:</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="service_id" required>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('service_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('service_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('observation') ? ' has-error' : '' }}">
                                <label for="observation" class="col-md-4 control-label">Observación:</label>

                                <div class="col-md-6">
                                    <input id="observation" type="text" class="form-control" name="observation" value="{{ old('observation') }}">

                                    @if ($errors->has('observation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('observation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ingresar Servicio
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
