@extends ('layouts.admin')
@section ('content')
    <div class="form-group">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>CGenerar Hora Extra</h3>
           
        {!!Form::open(array('url'=>'HoraExtras','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}
       <div class="form-group">
        <h4> <label for="fkidTipoHora">Tipo de horas:</label> </h4>
        <h4>   {!! Form::select('fkidTipoHora',$tipohoras,null,['id'=>'fkidTipoHora', 'placeholder'=>'Seleccione Tipo hora'],['class' => 'form-control'])!!}</h4>
        </div>
        <div class="form-group">
        <h4> <label for="fkcedulaEmpleado">Cedula del Empleado:</label></h4>
    <h4>  {!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado', 'placeholder'=>'Seleccione Empleado'],['class' => 'form-control'])!!}</h4>
        </div>
        <div class="form-group">
        <h4><label for="horasExtra">Ingrese valor de horas extras</label></h4>
    <h4>  <input type="number" name="horasExtra" class="form-control" placeholder="horas Extras"></h4>
        </div>
        <div class="form-group">
        <h4> <label for="fechaHorasExtra">Fecha del Hora extra</label></h4>
    <h4>  <input type="date" name="fechaHorasExtra" class="form-control" placeholder="fecha de hora extra"></h4>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>
        </div></h4>

        {!!Form::close()!!}
    </div>
    </div>
   
@endsection