@extends ('layouts.admin')
@section ('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear Tienda</h3>
           
        {!!Form::open(array('url'=>'Tiendas','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombreTienda">Tienda:</label>
            <input type="text" name="nombreTienda" class="form-control" placeholder="nombreTienda">
        </div>
        <div class="form-group">
            <label for="Tienda">Departamento:</label>
            {!! Form::select('departamento',$departamento,null,['id'=>'departamento', 'placeholder'=>'Seleccione Departamento'],['class' => 'form-control'])!!}
        
        <label for="fkcodigoMunicipio">Municipio</label>
            {!! Form::select('fkcodigoMunicipio',['placeholder'=>'Seleccione Municipio'],null,['id'=>'fkcodigoMunicipio'],['name'=>'fkcodigoMunicipio'],['class' => 'form-control'])!!}
           
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>

        {!!Form::close()!!}
    </div>
    </div>
@endsection