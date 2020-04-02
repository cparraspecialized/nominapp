@extends ('layouts.admin')
@section ('content')


  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Empleados</h5>
      </div>
      <div class="card-body">
        
<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <h3>Consulta de Empleados</h3>
        @include('Empleados.search') 
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tienda</th>
                    <th>Fecha de Ingreso</th>
                    <th>Cargo</th>
                    <th>Contrato</th>
                    <th>Salario</th>
                    <th>Estado</th>
                    <th>Fecha de Retiro</th>
                    <th>Motivo de Retiro</th>
                    <th>Usuario que modifico</th>
                    <th>Retirar/Ingresar</th>
                    <th>Editar Información</th>

                </thead>
                @foreach ($empleados as $emp)
                <tr>
                    <td>{{$emp->cedula}}</td>
                    <td>{{$emp->nombreEmpleado}}</td>
                    <td>{{$emp->apellidoEmpleado}}</td>
                    <td>{{$emp->tiendas['nombreTienda']}}</td>
                    <td>{{$emp->fechaIngresoEmpleado}}</td>
                    <td>{{$emp->tipocargo['descripcionTipoCargo']}}</td>
                    <td>{{$emp->tipocontrato['descripcionTipoContrato']}}</td>
                    <td>{{$emp->sueldoEmpleado}}</td>
                    <td>{{$emp->estadoEmpleado}}</td>
                    <td>{{$emp->fechaRetiroEmpleado}}</td>
                    <td>{{$emp->tiporetiro['descripcionTipoRetiro']}}</td>
                    <td>{{$emp->users['name']}}</td>
                    @if ($emp->estadoEmpleado == 'ACTIVO')
                    <td><a href="{{route('status',['id' => $emp->cedula])}}"><button class="btn btn-outline-danger">Retirar</button></td>
                    @endif
                    @if ($emp->estadoEmpleado == 'INACTIVO')
                    <td><a href="{{route('status',['id' => $emp->cedula])}}"><button class="btn btn-outline-success">Ingresar</button></td>
                    @endif
                    <td><a href="{{route('Empleados.edit', $emp->cedula)}}"><button class="btn btn-outline-primary">Editar</button></td>
                </tr>
                @endforeach
            </table>
            {{ $empleados->render() }} 
        </div>
    </div>
</div>
    
      </div>
    </div>
  </div>
<!-- /.col-md-6 -->
@endsection