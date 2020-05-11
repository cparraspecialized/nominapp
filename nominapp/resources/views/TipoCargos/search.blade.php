{!! Form::open(array('url'=>'TipoCargos','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
        

            <div class="form-row form-group col-sm-12">
              <div class="col-sm-12 form-group">
                <input type="text" name="descripcionTipoCargo" class="form-control" value="{{$descripcionTipoCargo}}" placeholder="Descripcion Tipo Cargo">
            </div>
            <div class="col-sm-4 form-group">
              <a class="btn btn-outline-info btn-block  form-group" role="button" href="{{URL::action('TipoCargoController@export',['descripcionTipoCargo'=>$descripcionTipoCargo])}}">Exportar</a>
            </div>
            <div class="col-sm-4 form-group">
              <button class="btn btn-outline-primary btn-block  form-group"  type="submit">Buscar</button>
            </div> 
            <div class="col-sm-4 form-group">             
              <a href="{{route('TipoCargos.create')}}"> <button type="button" class="btn btn-outline-success btn-block">CREATE</button>                        
            </div>

            </div>  
</div>

            
{{Form::close()}}