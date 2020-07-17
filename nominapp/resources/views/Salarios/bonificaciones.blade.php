@extends ('layouts.admin')
@section ('content')

  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Salaios</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <h3>Consulta de Salarios</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Bonificacion</th>
                            <th>Usuario</th>
                            <th>Editar</th>
                        </thead>
                        @foreach ($salario as $sal)
                        <tr>
                            <td>{{$sal->ids}}</td>
                            <td>{{$sal->empleados['nombreEmpleado']}} {{$sal->empleados['apellidoEmpleado']}}</td>
                            <td>${{number_format($sal->bonificacion, 0)}}</td>
                            <td>{{$sal->users['name']}}</td>
                            <td><a href="{{route('editsal', $sal->ids)}}"><button class="btn btn-outline-primary">Editar</button></td>
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