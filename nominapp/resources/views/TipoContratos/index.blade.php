@extends ('layouts.admin')
@section ('content')


  <!-- /.col-md-6 -->
  <div class="col-lg-12 col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0">Contratos</h5>
        @include('TipoContratos.search') 
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-8 col-md-8 col.sm-8 col-xs-12">
                <h3>Consulta de Tipo de Contratos</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
                <h4><div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>Tipo de Contrato</th>
                            <th>Fecha de Creación</th>
                        </thead>
                        @foreach ($tipocontrato as $tcon)
                        <tr>
                            <td>{{$tcon->descripcionTipoContrato}}</td>
                            <td>{{$tcon->created_at}}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{$tipocontrato->render()}} 
                </div></h4>
            </div>
        </div>
        
      </div>
    </div>
  </div>
<!-- /.col-md-6 -->
    
@endsection