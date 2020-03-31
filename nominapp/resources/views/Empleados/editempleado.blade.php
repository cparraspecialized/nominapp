@extends ('layouts.admin')
@section ('content')
{!!Form::model($empleado,['method'=>'PATH','route'=>['updateempleado',$empleado->cedula]])!!}
      {{Form::token()}}
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Editar Empleado</h5>
          </div>
          <div class="card-body">
            <div class="form-row form-group  col-sm-12">
              <div class="col-sm-4 form-group">
                <label for="cedula"><p class="font-weight-normal">Cedula</p></label>
                <input type="text" name="cedula" class="form-control" value="{{$empleado->cedula}}" disabled placeholder="Cedula del empleado">
            </div>
              <div class="col-sm-4 form-group">
                <label for="nombreEmpleado" ><p class="font-weight-normal">Nombres </p></label>
                <input type="text" name="nombreEmpleado" class="form-control" value="{{$empleado->nombreEmpleado}}" placeholder="Nombre del empleado">
            </div>
            <div class="col-sm-4 form-group">
                <label for="apellidoEmpleado" ><p class="font-weight-normal">Apellidos </p></label>
                <input type="text" name="apellidoEmpleado" class="form-control" value="{{$empleado->apellidoEmpleado}}" placeholder="Apellido del empleado">
            </div>
            <div class="col-sm-6 form-group">
              <label for="fkidTienda"  ><p class="font-weight-normal">Tienda </p></label>
              {!! Form::select('fkidTienda',$tiendas,null,['id'=>'fkidTienda', 'placeholder'=>'Seleccione Tienda','value'=>'{{$empleado->fkidTienda}}','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-6 form-group">
              <label for="fechaIngresoEmpleado"><p class="font-weight-normal">Fecha de ingreso </p></label>
              <input type="date" name="fechaIngresoEmpleado" class="form-control" value="{{$empleado->fechaIngresoEmpleado}}" placeholder="fechaIngresoEmpleado">
            </div>
            <div class="col-sm-4 form-group">
              <label for="fkidTipoCargo"  ><p class="font-weight-normal">Cargo </p></label>
              {!! Form::select('fkidTipoCargo',$tipocargo,null,['id'=>'fkidTipoCargo', 'placeholder'=>'Seleccione Cargo','value'=>'{{$empleado->fkidTipoCargo}}','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-4 form-group">
              <label for="fkidTipoContrato"  ><p class="font-weight-normal">Contrato </p></label>
              {!! Form::select('fkidTipoContrato',$tipocontrato,null,['id'=>'fkidTipoContrato', 'placeholder'=>'Seleccione Contrato','value'=>'{{$empleado->fkidTipoContrato}}','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-4 form-group">
              <label for="sueldoEmpleado"  ><p class="font-weight-normal">Salario </p></label>
              <input type="text" name="sueldoEmpleado" class="form-control" value="{{$empleado->sueldoEmpleado}}"  placeholder="Salario del empleado">
            </div>
            </div>
           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection