<?php
require __DIR__.'/../../function.php';
// crear una interfaz para introducir los datos de la nueva liquidacion ect INSERT INTO `Liquidaciones_ECT` (`id`, `id_cliente`, `company`) VALUES (1, 1, 1);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Liquidacion ECT</span>
                <form action="javascript:;" method="post" id="form">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="id" name="id" type="text" class="validate" value="<?=$_GET['id']?>">
                            <label for="id">id</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="id_cliente" name="id_cliente" type="text" class="validate" value="<?=$_GET['id']?>">
                            <label for="id_cliente">id_cliente</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="company" name="company" type="text" class="validate" value="<?=$_GET['id']?>">
                            <label for="company">company</label>
                        </div>
                    </div>
                    <input type="text" name="id" value="<?=$_GET['id']?>" hidden>
                    <button class="btn waves-effect waves-light" type="submit" name="action"><?=$_GET['id']?'Editar':'Crear'?>
                        <i class="material-icons right">send</i>
                    </button>
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
            action = 'insertLiquidaciones_ECT';
        }else{
            action = 'updateLiquidaciones_ECT';
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