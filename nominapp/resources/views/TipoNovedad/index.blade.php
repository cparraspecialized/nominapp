@extends ('layouts.admin')
@section ('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col.sm-8 col-xs-12">
        <h3>Tipos de novedades</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <div class="table-responsive">
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
        </div>
    </div>
</div>
    
@endsection