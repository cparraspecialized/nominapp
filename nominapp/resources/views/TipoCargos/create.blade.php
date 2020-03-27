@extends ('layouts.admin')
@section ('content')
        {!!Form::open(array('url'=>'TipoCargos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
     
          <div class="col-lg-12 col-sm-12 form-group">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Crear un tipo de Cargo</h5>
              </div>
              <div class="card-body">               
                <div class="form-group">
                    <label for="descripcionTipoCargo"><p class="font-weight-normal">Descripcion tipo de Cargo: </p></label>
                    <input type="text" name="descripcionTipoCargo" class="form-control" placeholder="Descripcion">
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
                <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>
    
              </div>
            </div>
          </div>
          {!!Form::close()!!}
@endsection