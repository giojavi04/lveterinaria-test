@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ingreso de mascota</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                <label for="user_id" class="col-md-4 control-label">Nombre del Cliente:</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="user_id" required autofocus>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pet_name') ? ' has-error' : '' }}">
                                <label for="pet_name" class="col-md-4 control-label">Nombre de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="pet_name" type="text" class="form-control" name="pet_name" value="{{ old('pet_name') }}" required>

                                    @if ($errors->has('pet_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pet_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pet_img" class="col-md-4 control-label">Imágen de la mascota:</label>
                                <div class="col-md-6">
                                    <input type="file" id="pet_img" name="pet_img">
                                    <p class="help-block">Solo se permite png y jpg.</p>
                                    @if ($errors->has('pet_img'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pet_img') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pet_age') ? ' has-error' : '' }}">
                                <label for="pet_age" class="col-md-4 control-label">Edad de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="pet_age" type="number" class="form-control" name="pet_age" value="{{ old('pet_age') }}">

                                    @if ($errors->has('pet_age'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pet_age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">Tipo de mascota:</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="type" required>
                                        @foreach($races as $race)
                                            <option value="{{$race->name}}">{{$race->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('race') ? ' has-error' : '' }}">
                                <label for="race" class="col-md-4 control-label">Raza de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="race" type="text" class="form-control" name="race" value="{{ old('race') }}">

                                    @if ($errors->has('race'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('race') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                <label for="color" class="col-md-4 control-label">Color de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}">

                                    @if ($errors->has('color'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                                <label for="weight" class="col-md-4 control-label">Peso de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="weight" type="text" class="form-control" name="weight" value="{{ old('weight') }}">

                                    @if ($errors->has('weight'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('chip') ? ' has-error' : '' }}">
                                <label for="chip" class="col-md-4 control-label">Chip de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="chip" type="text" class="form-control" name="chip" value="{{ old('chip') }}">

                                    @if ($errors->has('chip'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('chip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="qr" class="col-md-4 control-label">Código QR:</label>
                                <div class="col-md-6">
                                    <input type="file" id="qr" name="qr" required>
                                    <p class="help-block">Para generar un código Qr ingrese a la siguiente <a href="http://www.codigos-qr.com/generador-de-codigos-qr/" target="_black">link</a></p>
                                    @if ($errors->has('qr'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('qr') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ingresar Mascota
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
