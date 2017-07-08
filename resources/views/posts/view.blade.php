@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$post->title}}</div>
                    <div class="panel-body">
                        {{$post->content}}
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
