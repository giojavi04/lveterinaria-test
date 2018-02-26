@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Servicio - {{$record->service->name}}</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Id: </b> {{$record->id}}</li>
                            <li class="list-group-item"><b>Nombre de la mascota: </b> {{$record->post->pet_name}} {{$record->post->race}}</li>
                            <li class="list-group-item"><b>Servicio: </b> {{$record->service->name}}</li>
                            <li class="list-group-item"><b>Observación: </b> {{$record->observation}}</li>
                        </ul>
                    </div>
                </div>
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{ route('home') }}">Regresar</a></li>
                    @can('admin')
                        <li><a href="{{ route('records.edit', [$record->id]) }}">Editar servicio</a></li>
                        <li>
                            <a href="{{ route('records.destroy', [$record->id]) }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('delete-post').submit();">
                                <span class="text-danger">Eliminar servicio</span></a>
                            </a>

                            <form id="delete-post" action="{{ route('records.destroy', [$record->id]) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
@endsection
