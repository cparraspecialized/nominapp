@extends ('layouts.admin')
@section ('content')
    {!!Form::model($horasextras,['method'=>'PATH','route'=>['changestatushora',$horasextras->id]])!!}
    {{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Aprobacion Horas extras</h5>
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
          <div class="card-body">
            <div class="form-row form-group  col-sm-12">
              
                <input type="text" hidden name="id" class="form-control" readonly value="{{$horasextras->id}}" placeholder="Cedula del empleado">
            
              <div class="col-sm-4 form-group">
                <label for="fkcedulaEmpleado"><p class="font-weight-normal">Cedula</p></label>
                <input type="text" name="fkcedulaEmpleado" class="form-control" readonly value="{{$horasextras->fkcedulaEmpleado}}" placeholder="Cedula del empleado">
            </div>
              <div class="col-sm-4 form-group">
                <label for="nombreEmpleado" ><p class="font-weight-normal">Nombres </p></label>
                <input type="text" name="nombreEmpleado" class="form-control" readonly value="{{$horasextras->empleados['nombreEmpleado']}}" placeholder="Nombre del empleado">
            </div>
            <div class="col-sm-4 form-group">
                <label for="apellidoEmpleado" ><p class="font-weight-normal">Apellidos </p></label>
                <input type="text" name="apellidoEmpleado" class="form-control" readonly value="{{$horasextras->empleados['apellidoEmpleado']}}" placeholder="Apellido del empleado">
            </div>           
            <div class="col-sm-4 form-group">
              <label for="fkidTipoHora"><p class="font-weight-normal">Horas Extras</p></label>
              {!! Form::select('fkidTipoHora',$tipohoras,null,['id'=>'fkidTipoHora', 'placeholder'=>'Seleccione Hora extra','value'=>'{{$horasextras->fkidTipoHora}}','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-4 form-group">
                <label for="horasExtra"><p class="font-weight-normal">horas extras: </p></label>
                <input type="text" name="horasExtra" class="form-control" value="{{$horasextras->horasExtra}}" placeholder="horas extras">
            </div>
            <div class="col-sm-4 form-group">
              <label for="fechaHorasExtra"><p class="font-weight-normal">Fecha de fin de la novedad: </p></label>
              <input type="date" name="fechaHorasExtra" class="form-control" value="{{$horasextras->fechaHorasExtra}}" placeholder="fecha Hora extra">
            </div>
            <div class="col-sm-12 form-group">
              <label for="observacionHoraExtra"><p class="font-weight-normal">Observaciones de la novedad: </p></label>
              <input type="text" class="form-control" name="observacionHoraExtra" value="{{$horasextras->observacionHoraExtra}}" placeholder="Observacion Horas extras" >
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection