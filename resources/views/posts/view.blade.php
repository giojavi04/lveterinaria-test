@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mascota - {{$post->pet_name}}</div>
                    <div class="panel-body">
                        @if($post->pet_img)
                            <img src="{{ Storage::disk()->url($post->pet_img) }}" alt="{{$post->pet_name}}" style="max-width: 100%;">
                        @endif
                        <ul class="list-group">
                            <li class="list-group-item"><b>Id: </b> {{$post->id}}</li>
                            <li class="list-group-item"><b>Nombre del dueño: </b> {{$post->user->first_name}} {{$post->user->last_name}}</li>
                            <li class="list-group-item"><b>Nombre de la mascota: </b> {{$post->pet_name}}</li>
                            <li class="list-group-item"><b>Edad: </b> {{$post->pet_age}}</li>
                            <li class="list-group-item"><b>Tipo: </b> {{$post->type}}</li>
                            <li class="list-group-item"><b>Raza: </b> {{$post->race}}</li>
                            <li class="list-group-item"><b>Color: </b> {{$post->color}}</li>
                            <li class="list-group-item"><b>Peso:</b> {{$post->weight}}</li>
                            <li class="list-group-item"><b>Chip:</b> {{$post->chip}}</li>
                            <li class="list-group-item"><b>Url:</b> {{$post->url}}</li>
                        </ul>
                        @if($post->qr)
                            <img src="{{ Storage::disk()->url($post->qr) }}" alt="{{$post->pet_name}}" style="max-width: 100%;">
                        @endif
                    </div>
                </div>
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{ route('home') }}">Regresar</a></li>
                    @can('admin')
                        <li><a href="{{ route('post.edit', [$post->id]) }}">Editar post</a></li>
                        <li>
                            <a href="{{ route('logout', [$post->id]) }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('delete-post').submit();">
                                <span class="text-danger">Eliminar post</span></a>
                            </a>

                            <form id="delete-post" action="{{ route('post.destroy', [$post->id]) }}" method="POST" style="display: none;">
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
