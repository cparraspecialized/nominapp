{!! Form::open(array('url'=>'Empleados','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
        

            <div class="form-row form-group col-sm-12">
              <div class="col-sm-3 form-group">

                <input type="text" name="cedula" class="form-control" value="{{$cedula}}" placeholder="Cedula del empleado">
            </div>
              <div class="col-sm-3 form-group">

                <input type="text" name="nombreEmpleado" class="form-control"  value="{{$nombreEmpleado}}" placeholder="Nombre del empleado">
            </div>
            <div class="col-sm-3 form-group">
            <input type="text" name="apellidoEmpleado" class="form-control" value="{{$apellidoEmpleado}}" placeholder="Apellido del empleado">
            </div>
            <div class="col-sm-3 form-group">
              {!! Form::select('fkidTienda',$tiendas,null,['id'=>'fkidTienda', 'value'=>'{{$fkidTienda}}','placeholder'=>'Seleccione Tienda','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-4 form-group">
              <a class="btn btn-outline-info btn-block  form-group" role="button" href="{{URL::action('EmpleadoController@export',['cedula'=>$cedula,'nombreEmpleado'=>$nombreEmpleado,'apellidoEmpleado'=>$apellidoEmpleado,'fkidTienda'=>$fkidTienda])}}">Exportar</a>
            </div>
            <div class="col-sm-4 form-group">
              <button class="btn btn-outline-primary btn-block  form-group"  type="submit">Buscar</button>
            </div>   
            <div class="col-sm-4 form-group">             
              <a href="{{route('Empleados.create')}}"> <button type="button" class="btn btn-outline-success btn-block">Crear</button></a>                
            </div>
            </div>  
</div>

            
{{Form::close()}}