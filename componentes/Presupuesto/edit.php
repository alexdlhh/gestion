<?php
require __DIR__.'/../../function.php';
// interfaz para introducir datos como los del siguiente insert INSERT INTO `Presupuesto` (`id`, `id_cliente`, `company`) VALUES (1, 1, 1);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Presupuesto</span>
                <div class="row">
                    <form class="col s12" method="post" action="api.php?option=edit_presupuesto">
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
                            <input type="text" name="id" value="<?=$_GET['id']?>" hidden>
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <input type="text" name="id" value="<?=$_GET['id']?>" hidden>
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
            action = 'insertPresupuesto';
        }else{
            action = 'updatePresupuesto';
        }
        $.ajax({
            url: "api.php?option="+action,
            type: "POST",
            data: datos,
            success: function(data){
                console.log(data);
                //Si se ha insertado correctamente
                if(data == 1){
                    //Mostramos un mensaje
                    alert("Presupuesto insertado correctamente");
                    //Redirigimos a la página de listado
                    window.location.href = "?place=Presupuesto&file=list";
                }else{
                    alert("Error al insertar Presupuesto");
                }
            }
        });
    });
</script>