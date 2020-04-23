@extends ('layouts.admin')
@section ('content')


    
  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Usuarios</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <h3>Consulta de Usuarios</h3>
               
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
                            <th>Rol</th>      
                        </thead>
                        @foreach ($users as $use)
                        <tr>                            
                            <td>{{$use->id}}</td>
                            <td>{{$use->name}}</td>
                            <td>{{$use->email}}</td>
                            <td>{{$use->tiendas['nombreTienda']}}</td>
                            <td>{{$use->rol['tipo_Rol']}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div></h4>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.col-md-6 -->
@endsection