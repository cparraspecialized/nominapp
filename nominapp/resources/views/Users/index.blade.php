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
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Correo Electronico</th>
                            <th>Tienda</th>
                            <th>Rol</th> 
                            <th>Estado</th> 
                            <th>Editar</th>  
                            <th>Retirar/Ingresar</th>  
                        </thead>
                        @foreach ($users as $use)
                        <tr>                            
                            <td>{{$use->id}}</td>
                            <td>{{$use->name}}</td>
                            <td>{{$use->email}}</td>
                            <td>{{$use->tiendas['nombreTienda']}}</td>
                            <td>{{$use->rol['tipo_Rol']}}</td>
                            <td>{{$use->estadoUser}}</td>
                            <td><a href="{{route('Users.edit', $use->id)}}"><button class="btn btn-outline-primary">Editar</button></td>
                            @if ($use->estadoUser == 'ACTIVO')
                            <td><a href="{{route('status',['id' => $use->id])}}"><button class="btn btn-outline-danger">Retirar</button></td>
                            @endif
                            @if ($use->estadoUser == 'INACTIVO')
                            <td><a href="{{route('status',['id' => $use->id])}}"><button class="btn btn-outline-success">Ingresar</button></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                    {{$users->render()}} 
                </div></h4>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.col-md-6 -->
@endsection