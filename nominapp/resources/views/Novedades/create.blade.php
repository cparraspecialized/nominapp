@extends ('layouts.admin')
@section ('content')
    {!!Form::open(array('url'=>'Novedades','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Crear una nueva Novedad</h5>
          </div>
          <div class="card-body">

            <div class="form-group">
                <label for="fkcedulaEmpleado"><p class="font-weight-normal">Cedula del Empleado: </p></label>
                {!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado', 'placeholder'=>'Seleccione Empleado','class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                <label for="fktipoNovedad"><p class="font-weight-normal">Novedad a reportar</p></label>
                {!! Form::select('fktipoNovedad',$tnovedades,null,['id'=>'fktipoNovedad', 'placeholder'=>'Seleccione Novedades','class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                <label for="fechaNovedad"><p class="font-weight-normal">Fecha de la novedad: </p></label>
                <input type="date" name="fechaNovedad" class="form-control" placeholder="Fecha de novedad">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}
@endsection