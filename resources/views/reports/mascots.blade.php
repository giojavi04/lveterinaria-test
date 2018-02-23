@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Reporte de Mascotas registradas</h3>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Nombre de mascota</th>
                            <th>Raza</th>
                            <th>Edad</th>
                            <th>Color</th>
                            <th>Peso</th>
                            <th>Url</th>
                            <th>Ingresado</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($mascots as $mascot)
                                <tr>
                                    <td>{{$mascot->id}}</td>
                                    <td>{{$mascot->user->first_name}} {{$mascot->user->last_name}}</td>
                                    <td>{{$mascot->pet_name}}</td>
                                    <td>{{$mascot->chip}}</td>
                                    <td>{{$mascot->pet_age}}</td>
                                    <td>{{$mascot->color}}</td>
                                    <td>{{$mascot->weight}}</td>
                                    <td>{{$mascot->url}}</td>
                                    <td>{{$mascot->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $mascots->links() }}
            </div>
        </div>
    </div>
@endsection