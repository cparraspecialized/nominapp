@extends ('layouts.admin')
@section ('content')
    {!!Form::model($novedad,['method'=>'PATH','route'=>['changestatusnovedad',$novedad->id]])!!}
    {{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Aprobacion Novedad</h5>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul> 
            </div>
            @endif
          </div>
            <div class="form-row form-group  col-sm-12">
                <input type="text" hidden name="id" class="form-control" readonly value="{{$novedad->id}}" placeholder="Cedula del empleado">
            </div>    
            <div class="col-sm-4 form-group">
                <label for="fkcedulaEmpleado"><p class="font-weight-normal">Cedula</p></label>
                <input type="text" name="fkcedulaEmpleado" class="form-control" readonly value="{{$novedad->fkcedulaEmpleado}}" placeholder="Cedula del empleado">
            </div>
              <div class="col-sm-4 form-group">
                <label for="nombreEmpleado" ><p class="font-weight-normal">Nombres </p></label>
                <input type="text" name="nombreEmpleado" class="form-control" readonly value="{{$novedad->empleados['nombreEmpleado']}}" placeholder="Nombre del empleado">
            </div>
            <div class="col-sm-4 form-group">
                <label for="apellidoEmpleado" ><p class="font-weight-normal">Apellidos </p></label>
                <input type="text" name="apellidoEmpleado" class="form-control" readonly value="{{$novedad->empleados['apellidoEmpleado']}}" placeholder="Apellido del empleado">
            </div>
            <div class="col-sm-4 form-group">
              <label for="fktipoNovedad"><p class="font-weight-normal">Novedad a reportar</p></label>
              {!! Form::select('fktipoNovedad',$tnovedades,null,['id'=>'fktipoNovedad', 'placeholder'=>'Seleccione Novedades','value'=>'{{$novedad->fktipoNovedad}}','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-4 form-group">
                <label for="fechaNovedad"><p class="font-weight-normal">Fecha de inicio de la novedad: </p></label>
                <input type="date" name="fechaNovedad" class="form-control" value="{{$novedad->fechaNovedad}}" placeholder="fecha Inicio Novedad">
            </div>
            <div class="col-sm-4 form-group">
              <label for="fechaFinNovedad"><p class="font-weight-normal">Fecha de fin de la novedad: </p></label>
              <input type="date" name="fechaFinNovedad" class="form-control" value="{{$novedad->fechaFinNovedad}}" placeholder="fecha Fin Novedad">
            </div>
            <div class="col-sm-12 form-group">
              <label for="observacionNovedad"><p class="font-weight-normal">Observaciones de la novedad: </p></label>
              <input type="text" class="form-control" name="observacionNovedad" value="{{$novedad->observacionNovedad}}" placeholder="Observacion Novedad" >
            </div>          
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection