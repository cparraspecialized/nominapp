$(function(){

    $("#departamento").on('change',onSelectProjectChange);

})

function onSelectProjectChange(){
    var departamento_id = $(this).val();

    $.get('/api/Tiendas/'+departamento_id+'/municipios',function (data){
        var html_select = '<option value="">Seleccione Municipio</option>';
        for(var i=0; i<data.length; i++){
            html_select += '<option value="'+data[i].codigoMunicipio+'">'+data[i].nombreMunicipio+'</option>' ;

            $('#fkcodigoMunicipio').html(html_select);
        }
    })
}

$(function(){

    $("#fkcodigoMunicipio").on('change',onSelectProjectChangee);

})

function onSelectProjectChangee(){
    var municipio_id = $(this).val();

    $.get('/api/bicicleta/bicicleta/'+municipio_id+'/tiendas',function (data){
        var html_select = '<option value="">Seleccione Tienda</option>';
        for(var i=0; i<data.length; i++){
            html_select += '<option value="'+data[i].tieCodigo+'">'+data[i].tieNombre+'</option>' ;

            $('#tienda').html(html_select);
        }
    })
}