@extends ('layouts.admin')
@section ('content')
        {!!Form::open(array('url'=>'TipoContratos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
     
          <div class="col-lg-12 col-sm-12 form-group">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Crear un tipo de Contrato</h5>
              </div>
              <div class="card-body">               
                <div class="form-group">
                    <label for="descripcionTipoContrato"><p class="font-weight-normal">Descripcion tipo de Contrato: </p></label>
                    <input type="text" name="descripcionTipoContrato" class="form-control" placeholder="Descripcion">
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
                <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>
    
              </div>
            </div>
          </div>
          {!!Form::close()!!}
@endsection