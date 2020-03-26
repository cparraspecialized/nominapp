@extends ('layouts.admin')
@section ('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col.sm-8 col-xs-12">
        <h3>Tipo de horas</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col.sm-12 col-xs-12">
        <h4><div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Tipo de hora</th>
                </thead>
                @foreach ($tipohoras as $tiho)
                <tr>
                    <td>{{$tiho->descripcionTipo}}</td>
                </tr>
                @endforeach
            </table>
        </div></h4>
    </div>
</div>
    
@endsection