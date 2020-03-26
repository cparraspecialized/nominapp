@extends ('layouts.admin')
@section ('content')
    <div class="form-group">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Crear una nueva Novedad</h3>
           
            {!!Form::open(array('url'=>'Novedades','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                {{Form::token()}}
                <h4><div class="form-group">
                    <label for="fkcedulaEmpleado">Cedula del Empleado:</label>
                    {!! Form::select('fkcedulaEmpleado',$empleados,null,['id'=>'fkcedulaEmpleado', 'placeholder'=>'Seleccione Empleado'],['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    <label for="fktipoNovedad">Novedad a reportar</label>
                    {!! Form::select('fktipoNovedad',$tnovedades,null,['id'=>'fktipoNovedad', 'placeholder'=>'Seleccione Novedades'],['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    <label for="fechaNovedad">Fecha de la novedad</label>
                    <input type="date" name="fechaNovedad" class="form-control" placeholder="Fecha de novedad">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
                    <button class="btn btn-danger btn-lg btn-block" type="reset">Cancelar</button>
                </div></h4>

        
            {!!Form::close()!!}
        
    </div>
@endsection