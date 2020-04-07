{!! Form::open(array('url'=>'HoraExtras','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
        

            <div class="form-row form-group col-sm-12">
              <div class="col-sm-3 form-group">
                <label for="fkcedulaEmpleado"><p class="font-weight-normal">Empleado: </p></label>
                {!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado','placeholder'=>'Seleccione Empleado','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-3 form-group">
              <label for="fkidTipoHora"><p class="font-weight-normal">Tipo de Hora Extra </p></label>
              {!! Form::select('fkidTipoHora',$tipohoraextra,null,['id'=>'fkidTipoHora','placeholder'=>'Seleccione Tipo Novedad','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-3 form-group">
              <label for="fechaHorasExtra"><p class="font-weight-normal">Fecha de inicio: </p></label>
              <input type="date" name="fechaHorasExtra" class="form-control"   placeholder="Fecha de novedad">
            </div>
            <div class="col-sm-3 form-group">
              <label for="fechafinHorasExtra"><p class="font-weight-normal">Fecha de fin: </p></label>
              <input type="date" name="fechafinHorasExtra" class="form-control"   placeholder="Fecha de novedad">
            </div>
           
              
            <div class="col-sm-6 form-group">
              <a class="btn btn-outline-info btn-block  form-group" role="button" href="{{URL::action('HoraExtraController@export',['fkcedulaEmpleado'=>$fkcedulaEmpleado,'fkidTipoHora'=>$fkidTipoHora,'fechaHorasExtra'=>$fechaHorasExtra,'fechafinHorasExtra'=>$fechafinHorasExtra])}}">Exportar</a>
            </div>
            <div class="col-sm-6 form-group">
              <button class="btn btn-outline-primary btn-block  form-group"  type="submit">Buscar</button>
            </div> 
            </div>  
</div>

            
{{Form::close()}}