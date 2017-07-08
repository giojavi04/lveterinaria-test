@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Últimos posts</h3>
            @can('admin')
                <h2 class="text-center">
                    <a href="{{route('post.create')}}" class="btn btn-primary">
                        Crear post
                    </a>
                </h2>
            @endcan
            <div class="list-group">
                @foreach($posts as $post)
                    <a href="{{ route('post.view', [$post->id]) }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$post->title}}</h4>
                        <p class="list-group-item-text">
                            {{$post->description}} - Ver más...
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
