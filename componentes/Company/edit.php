<?php
require __DIR__.'/../../function.php';
//vamos a hacer una vista donde exista un formulario donde poder insertar datos como el siguiente insert INSERT INTO `Company` (`id`, `name`, `type`) VALUES (1, 'ANA', NULL);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Compañia</span>
                <form action="javascript:;" method="post" id="form">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" id="name" class="validate">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="type" type="text" id="type" class="validate">
                            <label for="type">Tipo</label>
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
            'name': $("#name").val(),
            'type': $("#type").val()
        }
        console.log(data);
        var action = "";
        if(data.id == 0){
            action = "addCompany";
        }else{
            action = "updateCompany";
        }
        //Hacemos un CURL mediante POST a api.php, option = editadmin
        $.post("/api.php", {option: action, data: data}, function(data){
            //Recibimos un JSON con los datos de las admin
            data = JSON.parse(data);
            //Si la respuesta es correcta
            if(data.status == "success"){
                //Redireccionamos a la vista de admin
                window.location.href = "?place=Company";
            }else{
                //Si no, mostramos un mensaje de error
                alert("Error al guardar");
            }
        });
    });
});
</script>