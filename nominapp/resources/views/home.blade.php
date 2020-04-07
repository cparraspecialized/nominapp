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

                    <h3>Bienvenidos a Nominapp, aplicacion de uso interno de Specialized Colombia para la gestion del recurso humano.</h1>
                    <h4>A continuacion tienes algunos enlaces rapidos:</h2>
                        
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
