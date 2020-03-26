@extends ('layouts.admin')
@section ('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col.sm-8 col-xs-12">
        <h3>Ingresos de empleados</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Cedula</th>
                    <th>Descripcion</th>
                    <th>Fecha de ingreso</th>
                    <th>Usuario que hizo ingreso</th>

                </thead>
                @foreach ($ingresos as $ing)
                <tr>
                    <td>{{$ing->fkcedulaEmpleado}}</td>
                    <td>{{$ing->descripcionIngreso}}</td>
                    <td>{{$ing->fechaIngreso}}</td>
                    <td>{{$ing->users['name']}}</td>
                </tr>
                @endforeach
            </table>
            {{ $ingresos->render() }} 
        </div>
    </div>
</div>
    
@endsection