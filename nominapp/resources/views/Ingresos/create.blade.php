@extends ('layouts.admin')
@section ('content')
    <div class="form-group">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear un Ingreso de un empleado</h3>
           
        {!!Form::open(array('url'=>'Ingresos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
       <h4>  <div class="form-group">
            <label for="fkcedulaEmpleado"><h4>Cedula del Empleado: </h4></label>
            <h4>{!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado', 'placeholder'=>'Seleccione Empleado'],['class' => 'form-control'])!!} </h4>
        </div>
        <div class="form-group">
          <h4>  <label for="descripcionIngreso">Descripcion Ingreso</label></h4>
        <h4><input type="text" name="descripcionIngreso" class="form-control" placeholder="descripcion del Ingreso"></h4>
        </div>
        <div class="form-group">
        <h4> <label for="fechaIngreso">Fecha del Ingreso</label></h4>
     <h4>  <input type="date" name="fechaIngreso" class="form-control" placeholder="fecha de Ingreso"></h4>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>
        </div></h4>

        {!!Form::close()!!}
    </div>

@endsection