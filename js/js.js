function realizaProceso(){
        var parametros =  $('#formularioRegistro').serialize();
        var url = "../controlador/c_usuario.php"
        $.ajax({
                data:  parametros,
                url:  url,
                type:  'post',
                beforeSend: function () {
                        $("#resp").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resp").html(response);
                }
        });
}