@extends ('layouts.admin')
@section ('content')


  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Retiros/Reingresos</h5>
      </div>
      <div class="card-body">
        
<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <h3>Aprobaciones en esperda de Retiros/Reingresos</h3>
    
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead class="thead-light">
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tienda</th>
                    <th>Fecha de Retiro/Reingreso</th>
                    <th>Retiro</th>
                    <th>Ringreso</th>
                    <th>Usuario que modifico</th>
                    <th>Validacion</th>
                </thead>
                @foreach ($empleados as $emp)
                <tr>
                    <td>{{$emp->cedula}}</td>
                    <td>{{$emp->nombreEmpleado}}</td>
                    <td>{{$emp->apellidoEmpleado}}</td>
                    <td>{{$emp->tiendas['nombreTienda']}}</td>
                    <td>{{$emp->fechaIngresoEmpleado}}</td>
                    <td>{{$emp->tiporetiro['descripcionTipoRetiro']}}</td>
                    <td>{{$emp->tipocontrato['descripcionTipoContrato']}}</td>
                    <td>{{$emp->users['name']}}</td>
                    @if($emp->validacionRetiro == '0')
                    <td><a href="{{route('statuspersonal',['id' => $emp->cedula])}}"><button class="btn btn-outline-success">Aprobar</button></td>
                    @endif
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