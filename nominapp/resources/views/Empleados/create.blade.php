@extends ('layouts.admin')
@section ('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear Empleado</h3>
           
        {!!Form::open(array('url'=>'Empleados','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="cedula">Cedula del Empleado:</label>
            <input type="text" name="cedula" class="form-control" placeholder="Cedula del empleado">
        </div>
        <div class="form-group">
            <label for="nombreEmpleado">Nombre Empleado</label>
            <input type="text" name="nombreEmpleado" class="form-control" placeholder="Nombre del empleado">
        </div>
        <div class="form-group">
            <label for="apellidoEmpleado">Apellidos Empleado:</label>
            <input type="text" name="apellidoEmpleado" class="form-control" placeholder="Apellido del empleado">
        </div>
        <div class="form-group">
            <label for="fkidTienda">Tienda del Empleado:</label>
            {!! Form::select('fkidTienda',$tiendas,null,['id'=>'fkidTienda', 'placeholder'=>'Seleccione Tienda'],['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>

        {!!Form::close()!!}
    </div>
    </div>
@endsection