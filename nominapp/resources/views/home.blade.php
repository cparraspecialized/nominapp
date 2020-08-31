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

                    @if($Fija <= 95)
                    <li class="list-group-item list-group-item-success">El numero de empleados contratados con la posicion fija es de {{$Fija}}</li>
                    @endif
                    @if($Fija > 95)
                    <li class="list-group-item list-group-item-danger">El numero de empleados contratados con la posicion fija es de {{$Fija}}</li>
                    @endif
                    @if($Temporal <= 100)
                    <li class="list-group-item list-group-item-success">El numero de empleados contratados con la posicion temporal es de {{$Temporal}}</li>
                    @endif
                    @if($Temporal > 100)
                    <li class="list-group-item list-group-item-danger">El numero de empleados contratados con la posicion temporal es de {{$Temporal}}</li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
