{!! Form::open(array('url'=>'Salarios','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
        

            <div class="form-row form-group col-sm-12"> 
              <div class="col-sm-12 form-group">
                <label for="fkCedulaEmpleado"><p class="font-weight-normal">Empleado: </p></label>
                {!! Form::select('fkCedulaEmpleado',$empleados,null,['id'=>'fkCedulaEmpleado','placeholder'=>'Seleccione Empleado','class' => 'form-control'])!!}
             </div>                     
              <div class="col-sm-4 form-group">
                <a class="btn btn-outline-info btn-block  form-group" role="button" href="{{URL::action('SalarioController@export')}}">Exportar</a>
              </div>
              <div class="col-sm-4 form-group">
                <button class="btn btn-outline-primary btn-block  form-group"  type="submit">Buscar</button>
              </div> 
              <div class="col-sm-4 form-group">             
                <a href="{{route('Salarios.create')}}"> <button type="button" class="btn btn-outline-success btn-block">Crear</button></a>                      
              </div>
            </div>  
</div>

            
{{Form::close()}}