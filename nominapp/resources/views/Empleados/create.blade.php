@extends ('layouts.admin')
@section ('content')
    {!!Form::open(array('url'=>'Empleados','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Crear Empleado</h5>
          </div>
          <div class="card-body">
            <div class="form-row form-group  col-sm-12">
              <div class="col-sm-4 form-group">
                <label for="cedula"><p class="font-weight-normal">Cedula</p></label>
                <input type="text" name="cedula" class="form-control" required placeholder="Cedula del empleado">
            </div>
              <div class="col-sm-4 form-group">
                <label for="nombreEmpleado" ><p class="font-weight-normal">Nombres </p></label>
                <input type="text" name="nombreEmpleado" class="form-control" required placeholder="Nombre del empleado">
            </div>
            <div class="col-sm-4 form-group">
                <label for="apellidoEmpleado" ><p class="font-weight-normal">Apellidos </p></label>
                <input type="text" name="apellidoEmpleado" class="form-control" required placeholder="Apellido del empleado">
            </div>
            <div class="col-sm-4 form-group">
              <label for="fkidTienda"  ><p class="font-weight-normal">Tienda </p></label>
              {!! Form::select('fkidTienda',$tiendas,null,['id'=>'fkidTienda','required=required', 'placeholder'=>'Seleccione Tienda','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-4 form-group">
              <label for="fechaIngresoEmpleado"><p class="font-weight-normal">Fecha de ingreso </p></label>
              <input type="date" name="fechaIngresoEmpleado" class="form-control"  required placeholder="fechaIngresoEmpleado">
            </div>
            <div class="col-sm-4 form-group">
              <label for="fechaFinContratoEmpleado"><p class="font-weight-normal">Fecha fin de contrato </p></label>
              <input type="date" name="fechaFinContratoEmpleado" class="form-control" placeholder="fechaIngresoEmpleado">
              <small id="HelpBlock" class="form-text text-muted">
                Requerido en caso de que el contrato sea termino fijo.
              </small>
            </div>
            <div class="col-sm-4 form-group">
              <label for="fkidTipoCargo"  ><p class="font-weight-normal">Cargo </p></label>
              {!! Form::select('fkidTipoCargo',$tipocargo,null,['id'=>'fkidTipoCargo', 'required','placeholder'=>'Seleccione Cargo','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-4 form-group">
              <label for="fkidTipoContrato"  ><p class="font-weight-normal">Contrato </p></label>
              {!! Form::select('fkidTipoContrato',$tipocontrato,null,['id'=>'fkidTipoContrato','required', 'placeholder'=>'Seleccione Contrato','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-4 form-group">
              <label for="sueldoEmpleado"  ><p class="font-weight-normal">Salario </p></label>
              <input type="number" name="sueldoEmpleado" class="form-control" required placeholder="Salario del empleado">
            </div>
            <div class="col-sm-6 form-group">
              <label for="fkcentroCostos"  ><p class="font-weight-normal">Centro de Costos </p></label>
              {!! Form::select('fkcentroCostos',$centrocosto,null,['id'=>'fkcentroCostos','required', 'placeholder'=>'Seleccione Centro de Costos','class' => 'form-control'])!!}
            </div>
            <div class="col-sm-6 form-group">
              <label for="fkdivision"  ><p class="font-weight-normal">Division </p></label>
              {!! Form::select('fkdivision',$division,null,['id'=>'fkdivision','required', 'placeholder'=>'Seleccione Division','class' => 'form-control'])!!}
            </div>
            </div>
           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection