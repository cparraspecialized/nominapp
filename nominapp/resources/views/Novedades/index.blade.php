@extends ('layouts.admin')
@section ('content')


    
  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Novedades</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <h3>Consulta de Novedades</h3>
                @include('Novedades.search') 
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <h4><div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="thead-light">
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Tienda</th>
                            <th>Novedad</th>
                            <th>Fecha inicio de la novedad</th>
                            <th>Fecha fin de la novedad</th>
                            <th>Observacion</th>
                            <th>Usuario que hizo la novedad</th>
        
                        </thead>
                        @foreach ($novedades as $nov)
                        <tr>
                            <td>{{$nov->fkcedulaEmpleado}}</td>
                            <td>{{$nov->empleados['nombreEmpleado']}}</td>
                            <td>{{$nov->empleados['apellidoEmpleado']}}</td>
                            <td>{{$nov->empleados->tiendas['nombreTienda']}}</td>
                            <td>{{$nov->TipoNovedad['descripcionTipoNovedad']}}</td>
                            <td>{{$nov->fechaNovedad}}</td>
                            <td>{{$nov->fechaFinNovedad}}</td>
                            <td>{{$nov->observacionNovedad}}</td>
                            <td>{{$nov->users['name']}}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{$novedades->render()}} 
                </div></h4>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.col-md-6 -->
@endsection