<?php
require __DIR__.'/../../function.php';
//vista que permita meter datos como los del siguiente insert INSERT INTO `Formas_pago` (`id`, `nombre`) VALUES (1, 'Transferencia');
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Forma de Pago</span>
                <form action="javascript:;" method="post" id="form">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nombre" name="nombre" type="text" class="validate" value="<?=$forma_pago->nombre?>">
                            <label for="nombre">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                    <input type="text" name="id" value="<?=$_GET['id']?>" hidden>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    //Cuando se envie el formulario
    $("#action").click(function(){
        console.log("Enviado");
        //Obtenemos los datos del formulario
        var datos = $("#form").serialize();
        console.log(datos);
        //Hacemos la petición ajax
        action = '';
        if(data.id==0){
            action = 'insertFormas_pago';
        }else{
            action = 'updateFormas_pago';
        }
        $.post("api.php?option="+action, data, function(response){
            console.log(response);
            //Si la respuesta es correcta
            if(response == "success"){
                //Mostramos un mensaje
                alert("Factura insertada correctamente");
                //Redireccionamos a la página principal
                window.location.href = "index.php";
            }else{
                alert("Error al insertar la Factura");
            }
        });
    });
});
</script>