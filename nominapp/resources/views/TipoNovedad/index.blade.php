@extends ('layouts.admin')
@section ('content')

</div>
      <!-- /.col-md-6 -->
      <div class="col-lg-12 col-sm-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Novedades</h5>
            @include('TipoNovedad.search')
          </div>
          <div class="card-body">
            
<div class="row">
    <div class="col-lg-8 col-md-8 col.sm-8 col-xs-12">
        <h3>Tipos de novedades</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <h4><div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Descripcion Novedad</th>
                    <th>Fecha de creacion</th>
                </thead>
                @foreach ($tiponovedad as $tnov)
                <tr>
                    <td>{{$tnov->descripcionTipoNovedad}}</td>
                    <td>{{$tnov->created_at}}</td>
                </tr>
                @endforeach
            </table>
            {{$tiponovedad->render()}} 
        </div></h4>
         </div>
          </div>
        </div>
      </div>
<!-- /.col-md-6 -->
@endsection