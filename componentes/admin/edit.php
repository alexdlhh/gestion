<?php
require __DIR__.'/../../function.php';
//vamos a hacer una vista donde exista un formulario donde poder insertar datos como el siguiente insert INSERT INTO `Admin` (`id`, `user`, `pass`) VALUES (1, 'alex', 'alex');
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Administrador</span>
                <form action="javascript:;" method="post" id="form">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="user" type="text" id="user" class="validate">
                            <label for="user">Usuario</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="pass" type="password" id="pass" class="validate">
                            <label for="pass">Contraseña</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="pass2" type="password" id="pass2" class="validate">
                            <label for="pass2">Repetir Contraseña</label>
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
            'user': $("#user").val(),
            'pass': $("#pass").val(),
            'pass2': $("#pass2").val()
        }
        console.log(data);
        if(data.pass == data.pass2){
            var action = "";
            if(data.id == 0){
                action = "insertAdmin";
            }else{
                action = "updateAdmin";
            }
            //Hacemos un CURL mediante POST a api.php, option = editadmin
            $.post("/api.php", {option: action, data: data}, function(data){
                //Recibimos un JSON con los datos de las admin
                data = JSON.parse(data);
                if(data.status == "success"){
                    //Si todo ha ido bien, redirigimos a la lista de admin
                    window.location.href = "?place=admin";
                }else{
                    //Si ha habido algún error, mostramos un mensaje
                    alert('Error: '+data.message);
                }
            });
        }else{
            alert("Las contraseñas no coinciden");
        }
    });
});
</script>