
function realizaProceso(){
        var parametros =  $('#formularioRegistro').serialize();
        var url = "../controlador/c_usuario.php";
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

function subirArchivo(){
        alert("hola");
        var parametros =  $('#f_subirArchivo').serialize();
        alert("parametros : "+parametros);
        var url = "../controlador/c_archivo.php";
        $.ajax({
                data:  parametros,
                url:  url,
                type:  'post',
                beforeSend: function () {
                        $("#resp").html("subiendo archivo favor de esperar un momento...");
                },
                success:  function (response) {
                        $("#resp").html(response);
                }
        });       
}

function subir2(){
        var parametros = new FormData($("#f_subirArchivo")[0]);
        var url = "../controlador/c_archivo.php";

        $.ajax({
                data : parametros,
                url : url,
                type:  'post',
                contentType : false,
                processData : false,
                beforeSend: function () {
                        $("#resp").html("subiendo archivo favor de esperar un momento...");
                },
                success:  function (response) {
                        $("#resp").html(response);
                }
        });
}