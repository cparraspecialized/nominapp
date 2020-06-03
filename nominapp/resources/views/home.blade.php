@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ config('app.name') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Bienvenidos a Nominapp, aplicación de uso interno de Specialized Colombia para la gestión del recurso humano.</h1>
                    <h4>A continuación tienes algunos enlaces rápidos:</h2>
                    @if($presupuestada <= 17)
                    <li class="list-group-item list-group-item-success">El numero de empleados contratados con la posicion presupuestada es de {{$presupuestada ?? ''}}</li>
                    @endif
                    @if($presupuestada > 17)
                    <li class="list-group-item list-group-item-danger">El numero de empleados contratados con la posicion presupuestada es de {{$presupuestada ?? ''}}</li>
                    @endif
                    @if($extra <= 17)
                    <li class="list-group-item list-group-item-success">El numero de empleados contratados con la posicion extra es de {{$extra ?? ''}}</li>
                    @endif
                    @if($extra > 17)
                    <li class="list-group-item list-group-item-danger">El numero de empleados contratados con la posicion extra es de {{$extra ?? ''}}</li>
                    @endif
                    <br>

                    <div class="form-row form-group">
                        <div class="col-sm-4 form-group">

                            <a class="btn btn-outline-info form-control" href="{{url('Empleados/')}}" role="button">Consultar Empleados Ingresos y Retiros</a>
                           
                        </div>
                        <div class="col-sm-4 form-group">
                            <a class="btn btn-outline-info form-control" href="{{url('Novedades/')}}" role="button">Consultar Novedades</a>
                        </div>
                        <div class="col-sm-4 form-group">
                            <a class="btn btn-outline-info form-control" href="{{url('HoraExtras/')}}" role="button">Consultar Horas Extras</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
