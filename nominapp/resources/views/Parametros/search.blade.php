{!! Form::open(array('url'=>'Parametros','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="col-lg-12 col-sm-12 form-group">
  <div class="col-sm-4 form-group">             
      <a href="{{route('Parametros.create')}}"> <button type="button" class="btn btn-outline-success btn-block">Crear</button></a>                      
    </div>
  </div>  
</div>

            
{{Form::close()}}