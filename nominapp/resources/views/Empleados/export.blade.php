
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead class="thead-light">
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tienda</th>
                    <th>Fecha de Ingreso</th>
                    <th>Cargo</th>
                    <th>Contrato</th>
                    <th>Salario</th>
                    <th>Estado</th>
                    <th>Fecha de Retiro</th>
                    <th>Motivo de Retiro</th>
                    <th>Usuario que modifico</th>
                </thead>
                @foreach ($empleados as $emp)
                <tbody>
                <tr>
                    <td>{{$emp->cedula}}</td>
                    <td>{{$emp->nombreEmpleado}}</td>
                    <td>{{$emp->apellidoEmpleado}}</td>
                    <td>{{$emp->tiendas['nombreTienda']}}</td>
                    <td>{{$emp->fechaIngresoEmpleado}}</td>
                    <td>{{$emp->tipocargo['descripcionTipoCargo']}}</td>
                    <td>{{$emp->tipocontrato['descripcionTipoContrato']}}</td>
                    <td>$ {{number_format($emp->sueldoEmpleado, 0) }}</td>
                    <td>{{$emp->estadoEmpleado}}</td>
                    <td>{{$emp->fechaRetiroEmpleado}}</td>
                    <td>{{$emp->tiporetiro['descripcionTipoRetiro']}}</td>
                    <td>{{$emp->users['name']}}</td>                 
                </tr>
                @endforeach
              </tbody>
            </table>
         