@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edición de mascota</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('post.update', [$post->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}">
                                <label for="client_name" class="col-md-4 control-label">Nombre del Cliente:</label>

                                <div class="col-md-6">
                                    <input id="client_name" type="text" class="form-control" name="client_name" value="{{ $post->client_name }}" required autofocus>

                                    @if ($errors->has('client_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email del Cliente:</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $post->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Teléfono del Cliente:</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $post->phone }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pet_name') ? ' has-error' : '' }}">
                                <label for="pet_name" class="col-md-4 control-label">Nombre de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="pet_name" type="text" class="form-control" name="pet_name" value="{{ $post->pet_name }}" required>

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
                                    <p class="help-block">Puedes dejar vacio este campo si ya tienes una imagen subida.</p>
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
                                    <input id="pet_age" type="number" class="form-control" name="pet_age" value="{{ $post->pet_age }}">

                                    @if ($errors->has('pet_age'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pet_age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                                <label for="color" class="col-md-4 control-label">Color de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" class="form-control" name="color" value="{{ $post->color }}">

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
                                    <input id="weight" type="text" class="form-control" name="weight" value="{{ $post->weight }}">

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
                                    <input id="chip" type="text" class="form-control" name="chip" value="{{ $post->chip }}">

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
                                    <input type="file" id="qr" name="qr">
                                    <p class="help-block">Solo se permite png y jpg.</p>
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
                                        Actualizar Mascota
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
