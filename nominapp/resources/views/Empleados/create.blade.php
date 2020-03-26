@extends ('layouts.admin')
@section ('content')
    <div class="form-group">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear Empleado</h3>
           
        {!!Form::open(array('url'=>'Empleados','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
       <h4> <div class="form-group">
    <h4>  <label for="cedula">Cedula del Empleado:</label></h4>
    <h4> <input type="text" name="cedula" class="form-control" placeholder="Cedula del empleado"></h4>
        </div>
        <div class="form-group">
        <h4> <label for="nombreEmpleado">Nombre Empleado</label></h4>
    <h4> <input type="text" name="nombreEmpleado" class="form-control" placeholder="Nombre del empleado"></h4>
        </div>
        <div class="form-group">
        <h4> <label for="apellidoEmpleado">Apellidos Empleado:</label>
            <input type="text" name="apellidoEmpleado" class="form-control" placeholder="Apellido del empleado"></h4>
        </div>
        <div class="form-group">
        <h4> <label for="fkidTienda">Tienda del Empleado:</label></h4>
         <h4>{!! Form::select('fkidTienda',$tiendas,null,['id'=>'fkidTienda', 'placeholder'=>'Seleccione Tienda'],['class' => 'form-control'])!!}</h4>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>
        </div></h4>

        {!!Form::close()!!}
    </div>

@endsection