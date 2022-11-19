<?php
require __DIR__.'/../../function.php';
// interfaz para introducir datos como los del siguiente insert INSERT INTO `Precio_Litros` (`id`, `id_factura`, `company`, `litros`, `type`, `precio`, `base`) VALUES (1, 1, 1, 10, 1, 1000, 1000);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Precio Litros</span>
                <div class="row">
                    <form class="col s12" method="post" action="api.php?option=edit_precio_litros">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="id" name="id" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="id">id</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="id_factura" name="id_factura" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="id_factura">id_factura</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="company" name="company" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="company">company</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="litros" name="litros" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="litros">litros</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="type" name="type" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="type">type</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="precio" name="precio" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="precio">precio</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="base" name="base" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="base">base</label>
                            </div>
                            <input type="text" name="id" value="<?=$_GET['id']?>" hidden>
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //Cuando se envie el formulario
    $("#action").click(function(){
        console.log("Enviado");
        //Obtenemos los datos del formulario
        var datos = $("#form").serialize();
        console.log(datos);
        //Hacemos la petición ajax
        action = '';
        if(data.id==0){
            action = 'insertPrecio_Litros';
        }else{
            action = 'updatePrecio_Litros';
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
</script>