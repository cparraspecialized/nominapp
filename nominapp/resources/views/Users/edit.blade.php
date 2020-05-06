@extends ('layouts.admin')
@section ('content')
    {!!Form::model($users,['route'=>['Users.update',$users->id],
    'method'=>'PUT'])!!}

      <div class="col-lg-12 col-sm-12 form-group">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Editar Usuarios</h5>
          </div>
          <div class="card-body">
            <div class="form-row form-group  col-sm-12">              
              <div class="col-sm-4 form-group">
                <label for="name" ><p class="font-weight-normal">Nombres </p></label>
                <input type="text" name="name" class="form-control" value="{{$users->name}}" placeholder="nombre">
              </div>
              <div class="col-sm-4 form-group">
                <label for="email" ><p class="font-weight-normal">Correo Electronico </p></label>
                <input type="text" name="email" class="form-control" value="{{$users->email}}" placeholder="correo electronico">
              </div>
              <div class="col-sm-4 form-group">
                <label for="fkidTienda"  ><p class="font-weight-normal">Tienda </p></label>
                {!! Form::select('fkidTienda',$tiendas,null,['id'=>'fkidTienda', 'placeholder'=>'Seleccione Tienda','value'=>'{{$users->fkidTienda}}','class' => 'form-control'])!!}
              </div>
              <div class="col-sm-4 form-group">
                <label for="fkidRol"  ><p class="font-weight-normal">Rol </p></label>
                {!! Form::select('fkidRol',$rol,null,['id'=>'fkidRol', 'placeholder'=>'Seleccione Rol','value'=>'{{$users->fkidRol}}','class' => 'form-control'])!!}
              </div>
            </div>
           
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>

          </div>
        </div>
      </div>
      {!!Form::close()!!}

@endsection