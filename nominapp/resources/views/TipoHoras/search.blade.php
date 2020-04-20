{!! Form::open(array('url'=>'TipoHoras','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
        

            <div class="form-row form-group col-sm-12">
              <div class="col-sm-12 form-group">
                <input type="text" name="descripcionTipo" class="form-control" value="{{$descripcionTipo}}" placeholder="Descripcion Tipo Hora">
            </div>
            <div class="col-sm-4 form-group">
              <a class="btn btn-outline-info btn-block  form-group" role="button" href="{{URL::action('TipoHoraController@export',['descripcionTipo'=>$descripcionTipo])}}">Exportar</a>
            </div>
            <div class="col-sm-4 form-group">
              <button class="btn btn-outline-primary btn-block  form-group"  type="submit">Buscar</button>
            </div> 
            </div>  
</div>

            
{{Form::close()}}