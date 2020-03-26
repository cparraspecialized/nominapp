@extends ('layouts.admin')
@section ('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear un Retiro de un empleado</h3>
           
        {!!Form::open(array('url'=>'Retiros','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="fkcedulaEmpleado">Cedula del Empleado:</label>
            {!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado', 'placeholder'=>'Seleccione Empleado'],['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            <label for="descripcionIngreso">Descripcion Retiro</label>
            <input type="text" name="descripcionIngreso" class="form-control" placeholder="Descripcion Retiro">
        </div>
        <div class="form-group">
            <label for="fechaRetiro">Fecha de retiro</label>
            <input type="date" name="fechaRetiro" class="form-control" placeholder="Fecha de retiro">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>

        {!!Form::close()!!}
    </div>
    </div>
@endsection