@extends ('layouts.admin')
@section ('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col.sm-8 col-xs-12">
        <h3>Tiendas</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre Tienda</th>
                    <th>Codigo Municipio </th>

                </thead>
                @foreach ($tiendas as $tie)
                <tr>
                    <td>{{$tie->id}}</td>
                    <td>{{$tie->nombreTienda}}</td>
                    <td>{{$tie->fkcodigoMunicipio}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    
@endsection