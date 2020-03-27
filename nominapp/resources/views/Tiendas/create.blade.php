@extends ('layouts.admin')
@section ('content')
         
    {!!Form::open(array('url'=>'Tiendas','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Crear Tienda</h5>
          </div>
          <div class="card-body">

            <div class="form-group">
                <label for="nombreTienda"><p class="font-weight-normal">Ingrese nombre de la tienda: </p></label>
                <input type="text" name="nombreTienda" class="form-control" placeholder="Nombre de la tienda">
            </div>
            <div class="form-group">
                <label for="Tienda"><p class="font-weight-normal">Departamento: </p></label>
                <p class="font-weight-normal"> {!!Form::select('departamento',$departamento,null,['id'=>'departamento', 'placeholder'=>'Seleccione Departamento','class' => 'form-control form-control-lg"'])!!}</p>
            </div>
            <div class="form-group">
                <label for="fkcodigoMunicipio"><p class="font-weight-normal">Municipio</p></label>
                 {!! Form::select('fkcodigoMunicipio',['placeholder'=>'Seleccione Municipio'],null,['id'=>'fkcodigoMunicipio','name'=>'fkcodigoMunicipio','class' => 'form-control form-control-lg"'])!!}
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection