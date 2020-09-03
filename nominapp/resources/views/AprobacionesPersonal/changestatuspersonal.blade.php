@extends ('layouts.admin')
@section ('content')
{!!Form::model($empleado,['method'=>'PATH','route'=>['changestatuspersonal',$empleado->cedula]])!!}
{{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Aprobacion Retiros/Reingresos</h5>
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
              <div class="col-sm-4 form-group">
                <label for="cedula"><p class="font-weight-normal">Cedula</p></label>
                <input type="text" name="cedula" class="form-control" readonly value="{{$empleado->cedula}}" placeholder="Cedula del empleado">
            </div>
              <div class="col-sm-4 form-group">
                <label for="nombreEmpleado" ><p class="font-weight-normal">Nombres </p></label>
                <input type="text" name="nombreEmpleado" class="form-control" readonly value="{{$empleado->nombreEmpleado}}" placeholder="Nombre del empleado">
            </div>
            <div class="col-sm-4 form-group">
                <label for="apellidoEmpleado" ><p class="font-weight-normal">Apellidos </p></label>
                <input type="text" name="apellidoEmpleado" class="form-control" readonly value="{{$empleado->apellidoEmpleado}}" placeholder="Apellido del empleado">
            </div>
            @if ($empleado->estadoEmpleado == 'ACTIVO')
            <div class="col-sm-6 form-group">
              <label for="fkidTipoRetiro"  ><p class="font-weight-normal">Motivo de Retiro </p></label>
              {!! Form::select('fkidTipoRetiro',$tiporetiro,null,['id'=>'fkidTipoRetiro', 'placeholder'=>'Seleccione Motivo de Retiro','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-6 form-group">
              <label for="fechaRetiroEmpleado"><p class="font-weight-normal">Fecha de retiro </p></label>
              <input type="date" name="fechaRetiroEmpleado" class="form-control" placeholder="fechaRetiroEmpleado">
            </div>
            @endif
            @if ($empleado->estadoEmpleado == 'INACTIVO')
            <div class="col-sm-6 form-group">
              <label for="fkidTipoContrato"  ><p class="font-weight-normal">Contrato </p></label>
              {!! Form::select('fkidTipoContrato',$tipocontrato,null,['id'=>'fkidTipoContrato', 'placeholder'=>'Seleccione Contrato','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-6 form-group">
              <label for="fechaIngresoEmpleado"><p class="font-weight-normal">Fecha de ingreso </p></label>
              <input type="date" name="fechaIngresoEmpleado" class="form-control" placeholder="fechaIngresoEmpleado">
            </div>
            @endif
            </div>
                     
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>        
        </div>
      </div>
      {!!Form::close()!!}

@endsection