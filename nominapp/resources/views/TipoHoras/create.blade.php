@extends ('layouts.admin')
@section ('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear un Retiro de un empleado</h3>
           
        {!!Form::open(array('url'=>'TipoHoras','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
        {{Form::token()}}        
        <div class="form-group">
            <label for="descripcionTipo">Descripcion tipo hora</label>
            <input type="text" name="descripcionTipo" class="form-control" placeholder="Descripcion">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>

        {!!Form::close()!!}
        </div>
    </div>
@endsection