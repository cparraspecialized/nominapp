@extends ('layouts.admin')
@section ('content')
         
    {!!Form::open(array('url'=>'Salarios','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}
 
      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Crear Salario</h5>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="fkCedulaEmpleado"><p class="font-weight-normal">Cedula del Empleado: </p></label>
              {!! Form::select('fkCedulaEmpleado',$empleados,null,['id'=>'fkCedulaEmpleado', 'required'=>'required','placeholder'=>'Seleccione Empleado','class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                <label for="salarioBase"><p class="font-weight-normal">Ingrese el salario Base: </p></label>
                <input type="number" name="salarioBase" class="form-control" placeholder="Valor del salario">
            </div>
            <div class="form-group">
              <label for="bonificacion"><p class="font-weight-normal">Ingrese la bonificacion: </p></label>
              <input type="number" name="bonificacion" class="form-control" placeholder="Valor de la bonificacion">
            </div>
            <div class="form-group">
              <label for="auxilioTransporteEspecial"><p class="font-weight-normal">Ingrese auxilio especial de transporte: </p></label>
              <input type="number" name="auxilioTransporteEspecial" class="form-control" placeholder="Valor auxilio de transporte especial">
            </div>
            <!--<div class="form-group">
              <label for="auxilioCapacitacion"><p class="font-weight-normal">Ingrese auxilio de capacitación: </p></label>
              <input type="number" name="auxilioCapacitacion" class="form-control" placeholder="Valor auxilio de capacitacion">
            </div>
            <div class="form-group">
              <label for="auxilioComunicacion"><p class="font-weight-normal">Ingrese auxilio de comunicacion: </p></label>
              <input type="number" name="auxilioComunicacion" class="form-control" placeholder="Valor auxilio de comunicacion">
            </div>
            <div class="form-group">
              <label for="gastoRepresentacion"><p class="font-weight-normal">Ingrese gasto representantes: </p></label>
              <input type="number" name="gastoRepresentacion" class="form-control" placeholder="Valor gasto representantes">
            </div>-->
            <div class="form-group">
              <label for="auxilioMedicinaPrepagada"><p class="font-weight-normal">Ingrese auxilio de Medicina Prepagada: </p></label>
              <input type="number" name="auxilioMedicinaPrepagada" class="form-control" placeholder="Valor auxilio de Mediciana prepagada">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection