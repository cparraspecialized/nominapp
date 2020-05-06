@extends ('layouts.admin')
@section ('content')


  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Roles</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
               <h4><div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="thead-light">
                            <th>Rol</th>
                            <th>Fecha Creacion</th>
                        </thead>
                        @foreach ($rol as $rol)
                        <tr>
                            <td>{{$rol->tipo_Rol}}</td>
                            <td>{{$rol->created_at}}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{$rol->render()}} 
                </div></h4>
            </div>
        </div>
            
      </div>
    </div>
  </div>
<!-- /.col-md-6 -->
@endsection