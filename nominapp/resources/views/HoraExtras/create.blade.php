@extends ('layouts.admin')
@section ('content')
    {!!Form::open(array('url'=>'HoraExtras','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Crear Hora extra para empleado</h5>
          </div>
          <div class="card-body">

            <div class="form-group">
                <label for="fkidTipoHora"><p class="font-weight-normal">Tipo de hora extra: </p></label>
                {!! Form::select('fkidTipoHora',$tipohoras,null,['id'=>'fkidTipoHora', 'placeholder'=>'Seleccione Tipo hora','class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                <label for="fkcedulaEmpleado"><p class="font-weight-normal">Cedula del Empleado:</p></label>
                {!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado', 'placeholder'=>'Seleccione Empleado','class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                <label for="horasExtra"><p class="font-weight-normal">Ingrese el numero de horas extras realizadas: </p></label>
                <input type="number" name="horasExtra" class="form-control" placeholder="horas Extras">
            </div>
            <div class="form-group">
                <label for="fechaHorasExtra"><p class="font-weight-normal">Fecha de la Hora extra: </p></label>
                <input type="date" name="fechaHorasExtra" class="form-control" placeholder="fecha de hora extra">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}
   
@endsection