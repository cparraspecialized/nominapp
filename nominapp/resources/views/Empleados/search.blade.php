{!! Form::open(array('url'=>'Empleados','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
        

            <div class="form-row form-group col-sm-12">
              <div class="col-sm-3 form-group">

                <input type="text" name="cedula" class="form-control" value="{{old('cedula')}}" placeholder="Cedula del empleado">
            </div>
              <div class="col-sm-3 form-group">

                <input type="text" name="nombreEmpleado" class="form-control"  value="{{old('nombreEmpleado')}}" placeholder="Nombre del empleado">
            </div>
            <div class="col-sm-3 form-group">
            <input type="text" name="apellidoEmpleado" class="form-control" value="{{old('apellidoEmpleado')}}" placeholder="Apellido del empleado">
            </div>
            <div class="col-sm-3 form-group">
              {!! Form::select('fkidTienda',$tiendas,null,['id'=>'fkidTienda', 'placeholder'=>'Seleccione Tienda','class' => 'form-control'])!!}
            </div>
            
            </div>
           
            <button class="btn btn-primary btn-sm btn-block" type="submit">Buscar</button>
            <a class="btn btn-primary form-control" href="{{URL::action('EmpleadoController@export',['cedula','nombreEmpleado','apellidoEmpleado','fkidTienda'])}}">Exportar</a>

</div>

            
{{Form::close()}}