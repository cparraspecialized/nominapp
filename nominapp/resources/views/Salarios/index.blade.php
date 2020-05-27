@extends ('layouts.admin')
@section ('content')

  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Tiendas</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <h3>Consulta de Tiendas</h3>
                @include('Salarios.search') 
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Cedula</th>
                            <th>Salario Base</th>
                            <th>Bonificacion</th>
                            <th>Auxilio de transporte</th>
                            <th>Auxilio Capacitacion</th>
                            <th>Auxilio Comunicacion</th>
                            <th>Gasto Representacion</th>
                            <th>Auxilio Medicina Prepagada</th>
                        </thead>
                        @foreach ($salario as $sal)
                        <tr>
                            <td>{{$sal->id}}</td>
                            <td>{{$sal->empleados['nombreEmpleado']}}</td>
                            <td>{{$sal->salarioBase}}</td>
                            <td>{{$sal->bonificacion}}</td>
                            <td>{{$sal->auxilioTransporte}}</td>
                            <td>{{$sal->auxilioCapacitacion}}</td>
                            <td>{{$sal->auxilioComunicacion}}</td>
                            <td>{{$sal->gastoRepresentacion}}</td>
                            <td>{{$sal->auxilioMedicinaPrepagada}}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $salario->render() }} 
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.col-md-6 -->


    
@endsection