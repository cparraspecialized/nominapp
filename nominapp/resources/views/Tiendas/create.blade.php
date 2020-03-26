@extends ('layouts.admin')
@section ('content')
    <div class="form-group">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear Tienda</h3>
           
        {!!Form::open(array('url'=>'Tiendas','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombreTienda"><h4>Ingrese nombre de la tienda:</h4></label>
           <h4> <input type="text" name="nombreTienda" class="form-control" placeholder="Nombre de la tienda"></h4>
        </div>
        <div class="form-group">
            <label for="Tienda"><h4>Departamento:</h4></label>
           <h4> {!! Form::select('departamento',$departamento,null,['id'=>'departamento', 'placeholder'=>'Seleccione Departamento'],['class' => 'form-control'])!!}</h4>
        </div>
        <label for="fkcodigoMunicipio"><h4>Municipio</h4></label>
           <h4> {!! Form::select('fkcodigoMunicipio',['placeholder'=>'Seleccione Municipio'],null,['id'=>'fkcodigoMunicipio'],['name'=>'fkcodigoMunicipio'],['class' => 'form-control'])!!}</h4>
           <br>

           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>
        </div>
    


        {!!Form::close()!!}
    </div>

@endsection