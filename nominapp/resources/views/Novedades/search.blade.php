{!! Form::open(array('url'=>'Novedades','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
        

            <div class="form-row form-group col-sm-12">
              <div class="col-sm-3 form-group">
                <label for="fkcedulaEmpleado"><p class="font-weight-normal">Empleado: </p></label>
                {!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado','placeholder'=>'Seleccione Empleado','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-3 form-group">
              <label for="fechaInicioNovedad"><p class="font-weight-normal">Fecha de inicio: </p></label>
              <input type="date" name="fechaInicioNovedad" class="form-control"   placeholder="Fecha de novedad">
            </div>
            <div class="col-sm-3 form-group">
              <label for="fechaFinNovedad"><p class="font-weight-normal">Fecha de fin: </p></label>
              <input type="date" name="fechaFinNovedad" class="form-control"   placeholder="Fecha de novedad">
            </div>
            <div class="col-sm-3 form-group">
              <label for="fkTipoNovedad"><p class="font-weight-normal">Tipo de Novedad </p></label>
              {!! Form::select('fkTipoNovedad',$tiponovedad,null,['id'=>'fkTipoNovedad','placeholder'=>'Seleccione Tipo Novedad','class' => 'form-control'])!!}
            </div>
              
            <div class="col-sm-4 form-group">
              <a class="btn btn-outline-info btn-block  form-group" role="button" href="{{URL::action('NovedadController@export',['fkcedulaEmpleado'=>$fkcedulaEmpleado,'fechaInicioNovedad'=>$fechaInicioNovedad,'fechaFinNovedad'=>$fechaFinNovedad])}}">Exportar</a>
            </div>
            <div class="col-sm-4 form-group">
              <button class="btn btn-outline-primary btn-block  form-group"  type="submit">Buscar</button>
            </div> 
            <div class="col-sm-4 form-group">             
              <a href="{{route('Novedades.create')}}"> <button type="button" class="btn btn-outline-success btn-block">https://www.youtube.com/watch?v=b5YMPhoUCRo
              </button>                        
            </div>
            </div>  
</div>

            
{{Form::close()}}