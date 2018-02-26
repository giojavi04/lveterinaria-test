@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edición de servicio</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('records.update', [$record->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('post_id') ? ' has-error' : '' }}">
                                <label for="post_id" class="col-md-4 control-label">Nombre de la Mascota:</label>

                                <div class="col-md-6">
                                    <input id="post_id" type="hidden" class="form-control" name="post_id" value="{{ $record->post_id }}" readonly>
                                    <input id="name_post" type="text" class="form-control" name="name_post" value="{{ $record->post->pet_name }} {{ $record->post->race }}" readonly>

                                    @if ($errors->has('post_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('post_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">
                                <label for="service_id" class="col-md-4 control-label">Servicio:</label>

                                <div class="col-md-6">
                                    <input id="service_id" type="hidden" class="form-control" name="service_id" value="{{ $record->service_id }}" readonly>
                                    <input id="name_service" type="text" class="form-control" name="name_service" value="{{ $record->service->name }}" readonly>

                                    @if ($errors->has('service_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('service_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('observation') ? ' has-error' : '' }}">
                                <label for="observation" class="col-md-4 control-label">Nombre de la mascota:</label>

                                <div class="col-md-6">
                                    <input id="observation" type="text" class="form-control" name="observation" value="{{ $record->observation }}" required>

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
                                        Actualizar servicio
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
