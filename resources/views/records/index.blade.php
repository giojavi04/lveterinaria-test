@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Servicios ingresados</h3>
                <h2 class="text-center">
                    <a href="{{route('records.create')}}" class="btn btn-primary">
                        Ingresar servicio
                    </a>
                </h2>
                <div class="list-group">
                    @foreach($records as $record)
                        <a href="{{ route('records.show', [$record->id]) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{$record->service->name}}</h4>
                            <p class="list-group-item-text">
                                {{$record->post->pet_name}} - Ver más...
                            </p>
                        </a>
                    @endforeach
                </div>

                {{ $records->links() }}
            </div>
        </div>
    </div>
@endsection
