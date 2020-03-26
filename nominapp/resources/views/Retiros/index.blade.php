@extends ('layouts.admin')
@section ('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col.sm-8 col-xs-12">
        <h3>Retiros</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Empleado</th>
                    <th>Descripcion del ingreso</th>
                    <th>Fecha de retiro</th>
                    <th>Usuario que hizo el retiro</th>

                </thead>
                @foreach ($retiros as $ret)
                <tr>
                    <td>{{$ret->fkcedulaEmpleado}}</td>
                    <td>{{$ret->descripcionIngreso}}</td>
                    <td>{{$ret->fechaRetiro}}</td>
                    <td>{{$ret->users['name']}}</td>
                </tr>
                @endforeach
            </table>
            {{ $retiros->render() }} 
        </div>
    </div>
</div>
    
@endsection