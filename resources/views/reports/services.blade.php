@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Reporte de Servicios disponibles</h3>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha de creación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$service->id}}</td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->description}}</td>
                                    <td>{{$service->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $services->links() }}
            </div>
        </div>
    </div>
@endsection