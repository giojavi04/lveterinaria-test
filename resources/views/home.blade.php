@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Mis mascotas</h3>
            <div class="list-group">
                @foreach($posts as $post)
                    <a href="{{ route('post.view', [$post->id]) }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$post->pet_name}}</h4>
                        <p class="list-group-item-text">
                            {{$post->client_name}} - Ver más...
                        </p>
                    </a>
                @endforeach
            </div>

            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
