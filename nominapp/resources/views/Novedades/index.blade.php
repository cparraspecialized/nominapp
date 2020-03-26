@extends ('layouts.admin')
@section ('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col.sm-8 col-xs-12">
        <h3>Novedades</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <h4><div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Empleado</th>
                    <th>Novedad</th>
                    <th>Fecha de la novedad</th>
                    <th>Usuario que hizo la novedad</th>

                </thead>
                @foreach ($novedades as $nov)
                <tr>
                    <td>{{$nov->fkcedulaEmpleado}}</td>
                    <td>{{$nov->TipoNovedad['descripcionTipoNovedad']}}</td>
                    <td>{{$nov->fechaNovedad}}</td>
                    <td>{{$nov->users['name']}}</td>
                </tr>
                @endforeach
            </table>
            {{ $novedades->render() }} 
        </div></h4>
    </div>
</div>
    
@endsection