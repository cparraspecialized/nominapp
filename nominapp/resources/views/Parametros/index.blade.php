@extends ('layouts.admin')
@section ('content')


  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Parametros</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
              <h3>Parametros</h3>
              
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
               <h4><div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="thead-light">
                          <thead class="thead-light">
                            <th>Salario Minimo</th>
                            <th>Auxilio Transporte</th>
                            <th>Editar</th>
                        </thead>
                        @foreach ($parametr as $para)
                        <tr>
                          <td>${{number_format($para->salarioMinimo, 0)}}</td>
                          <td>${{number_format($para->auxilioTransportes, 0)}}</td>
                          <td><a href="{{route('editparametro', $para->id)}}"><button class="btn btn-outline-primary">Editar</button></td>
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