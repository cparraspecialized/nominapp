@extends ('layouts.admin')
@section ('content')


  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Horas Extras</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <h3> Consulta de Horas Extras</h3>
                @include('HoraExtras.search') 
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
               <h4><div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="thead-light">
                            <th>Empleado</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Tienda</th>
                            <th>Tipo Hora Extra</th>
                            <th>Horas extras</th>
                            <th>Fecha Horas extras</th>
                            <th>Observacion</th>
                            <th>Usuario que hizo ingreso</th>
        
                        </thead>
                        @foreach ($horasextras as $hoext)
                        <tr>
                            <td>{{$hoext->fkcedulaEmpleado}}</td>
                            <td>{{$hoext->empleados['nombreEmpleado']}}</td>
                            <td>{{$hoext->empleados['apellidoEmpleado']}}</td>
                            <td>{{$hoext->empleados->tiendas['nombreTienda']}}</td>
                            <td>{{$hoext->tipohoras['descripcionTipo']}}</td>
                            <td>{{$hoext->horasExtra}}</td>
                            <td>{{$hoext->fechaHorasExtra}}</td>
                            <td>{{$hoext->observacionHoraExtra}}</td>
                            <td>{{$hoext->users['name']}}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $horasextras->render() }} 
                </div></h4>
            </div>
        </div>
            
      </div>
    </div>
  </div>
<!-- /.col-md-6 -->
@endsection