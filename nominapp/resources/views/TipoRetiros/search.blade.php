{!! Form::open(array('url'=>'TipoRetiros','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
        

            <div class="form-row form-group col-sm-12">
              <div class="col-sm-12 form-group">
                <input type="text" name="descripcionTipoRetiro" class="form-control" value="{{$descripcionTipoRetiro}}" placeholder="Descripcion Tipo Retiro">
            </div>
            <div class="col-sm-4 form-group">
              <a class="btn btn-outline-info btn-block  form-group" role="button" href="{{URL::action('TipoRetiroController@export',['descripcionTipoRetiro'=>$descripcionTipoRetiro])}}">Exportar</a>
            </div>
            <div class="col-sm-4 form-group">
              <button class="btn btn-outline-primary btn-block  form-group"  type="submit">Buscar</button>
            </div> 
            <div class="col-sm-4 form-group">             
              <a href="{{route('TipoRetiros.create')}}"> <button type="button" class="btn btn-outline-success btn-block">Crear</button></a>                        
            </div>
            </div>  
</div>

            
{{Form::close()}}