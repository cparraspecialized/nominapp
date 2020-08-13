@extends ('layouts.admin')
@section ('content')
    {!!Form::model($parametro,['route'=>['updatepara',$parametro->id],
    'method'=>'PUT'])!!}

      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Cambio Parametros</h5>
          </div>
          <div class="card-body">
            <div class="form-row form-group  col-sm-12">
            <div class="form-row form-group  col-sm-12">
              <input type="text" hidden name="id" class="form-control" readonly value="{{$parametro->id}}" placeholder="id">
            </div>  
            <div class="col-sm-4 form-group">
              <label for="salarioMinimo"><p class="font-weight-normal">Salario Minimo</p></label>
              <input type="text" name="salarioMinimo" class="form-control" value="{{$parametro->salarioMinimo}}" placeholder="Salario Minimo">
            </div>
            <div class="col-sm-4 form-group">
              <label for="auxilioTransportes"><p class="font-weight-normal">Auxilio Transporte</p></label>
              <input type="text" name="auxilioTransportes" class="form-control" value="{{$parametro->auxilioTransportes}}" placeholder="Auxilio Transporte">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection