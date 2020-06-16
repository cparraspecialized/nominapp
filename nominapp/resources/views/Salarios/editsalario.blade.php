@extends ('layouts.admin')
@section ('content')
    {!!Form::model($salario,['route'=>['updatesal',$salario->id],
    'method'=>'PUT'])!!}

      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Editar Salario</h5>
          </div>
          <div class="card-body">
            <div class="form-row form-group  col-sm-12">
            <div class="form-row form-group  col-sm-12">
              <input type="text" hidden name="id" class="form-control" readonly value="{{$salario->id}}" placeholder="Cedula del empleado">
            </div>    
            <div class="col-sm-4 form-group">
              <label for="fkCedulaEmpleado"><p class="font-weight-normal">Cedula</p></label>
              <input type="text" name="fkCedulaEmpleado" class="form-control" value="{{$salario->fkCedulaEmpleado}}" disabled placeholder="Cedula del empleado">
            </div>
              <div class="col-sm-4 form-group">
                <label for="salarioBase" ><p class="font-weight-normal">Salario </p></label>
                <input type="text" name="salarioBase" class="form-control" value="{{$salario->salarioBase}}" placeholder="Nombre del empleado">
            </div>
            <div class="col-sm-4 form-group">
                <label for="bonificacion" ><p class="font-weight-normal">Bonificacion </p></label>
                <input type="text" name="bonificacion" class="form-control" value="{{$salario->bonificacion}}" placeholder="Apellido del empleado">
            </div>
            <div class="col-sm-4 form-group">
              <label for="auxilioTransporte"><p class="font-weight-normal">Auxilio de transporte </p></label>
              <input type="text" name="auxilioTransporte" class="form-control" value="{{$salario->auxilioTransporte}}" placeholder="fechaIngresoEmpleado">
            </div>
            <div class="col-sm-4 form-group">
              <label for="auxilioMedicinaPrepagada"><p class="font-weight-normal">Auxilio mEdicina Prepagada </p></label>
              <input type="text" name="auxilioMedicinaPrepagada" class="form-control" value="{{$salario->auxilioMedicinaPrepagada}}" placeholder="fechaIngresoEmpleado">
            </div>          
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection