@extends ('layouts.admin')
@section ('content')
    {!!Form::open(array('url'=>'Empleados','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Crear Empleado</h5>
          </div>
          <div class="card-body">

            <div class="form-group">
                <label for="cedula"><p class="font-weight-normal">Cedula del Empleado:</p></label>
                <input type="text" name="cedula" class="form-control" placeholder="Cedula del empleado">
            </div>
            <div class="form-group">
                <label for="nombreEmpleado"><p class="font-weight-normal">Nombre Empleado: </p></label>
                <input type="text" name="nombreEmpleado" class="form-control" placeholder="Nombre del empleado">
            </div>
            <div class="form-group">
                <label for="apellidoEmpleado"><p class="font-weight-normal">Apellidos Empleado: </p></label>
                <input type="text" name="apellidoEmpleado" class="form-control" placeholder="Apellido del empleado">
            </div>
            <div class="form-group">
                <label for="fkidTienda"><p class="font-weight-normal">Tienda del Empleado: </p></label>
                {!! Form::select('fkidTienda',$tiendas,null,['id'=>'fkidTienda', 'placeholder'=>'Seleccione Tienda','class' => 'form-control'])!!}
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection