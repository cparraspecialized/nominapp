@extends ('layouts.admin')
@section ('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear un Ingreso de un empleado</h3>
           
        {!!Form::open(array('url'=>'HoraExtras','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
        <h4><div class="form-group">
            <label for="fkidTipoHora">Tipo de horas:</label>
            {!! Form::select('fkidTipoHora',$tipohoras,null,['id'=>'fkidTipoHora', 'placeholder'=>'Seleccione Tipo hora'],['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            <label for="fkcedulaEmpleado">Cedula del Empleado:</label>
            {!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado', 'placeholder'=>'Seleccione Empleado'],['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
            <label for="horasExtra">Ingrese valor de horas extras</label>
            <input type="number" name="horasExtra" class="form-control" placeholder="horas Extras">
        </div>
        <div class="form-group">
            <label for="fechaHorasExtra">Fecha del Hora extra</label>
            <input type="date" name="fechaHorasExtra" class="form-control" placeholder="fecha de hora extra">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>
        </div></h4>

        {!!Form::close()!!}
    </div>
   
@endsection