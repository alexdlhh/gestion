<?php
require __DIR__.'/../../function.php';
//vista formulario para insertar datos conforme a este insert INSERT INTO `Cliente` (`id`, `company`) VALUES (1, 1);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Cliente</span>
                <form action="javascript:;" method="post" id="form">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="company" type="text" id="company" class="validate">
                            <label for="company">Empresa</label>
                        </div>
                    </div>
                    <input type="text" value="<?=$_GET['id']?>" id="id" hidden>
                    <div class="row">
                        <div class="col s12">
                            <a class="btn" href="javascript:;" id="action">Guardar</a>
                        </div>
                    </div>
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
        var data = {
            'id': $("#id").val(),
            'company': $("#company").val()
        }
        console.log(data);
        var action = "";
        if(data.id == 0){
            action = "insertCliente";
        }else{
            action = "updateCliente";
        }
        //Hacemos un CURL mediante POST a api.php, option = editadmin
        $.post("/api.php", {option: action, data: data}, function(data){
            //Recibimos un JSON con los datos de las admin
            data = JSON.parse(data);
            //Si la respuesta es correcta
            if(data.status == "ok"){
                //Redireccionamos a la vista de admin
                window.location.href = "/componentes/cliente/";
            }else{
                //Si no, mostramos un mensaje de error
                alert("Error al guardar");
            }
        });
    });
});
</script>