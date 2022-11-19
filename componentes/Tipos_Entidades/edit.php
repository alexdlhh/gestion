<?php
require __DIR__.'/../../function.php';
// interfaz para introducir datos como los del siguiente insert INSERT INTO `Tipos_Entidades` (`id`, `name`) VALUES (1, 'EMPRESA');
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Tipos Entidades</span>
                <div class="row">
                    <form class="col s12" method="post" action="api.php?option=edit_tipos_entidades">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="id" name="id" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="id">id</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate" value="<?=$_GET['id']?>">
                                <label for="name">name</label>
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
     $("#action").click(function(){
        console.log("Enviado");
        //Obtenemos los datos del formulario
        var datos = $("#form").serialize();
        console.log(datos);
        //Hacemos la petición ajax
        action = '';
        if(data.id==0){
            action = 'insertTipos_Entidades';
        }else{
            action = 'updateTipos_Entidades';
        }
        $.ajax({
            url: "api.php?option="+action,
            type: "POST",
            data: datos,
            success: function(data){
                console.log(data);
                if(data.status==200){
                    alert("Datos guardados correctamente");
                    window.location.href = "index.php";
                }else{
                    alert("Error al guardar los datos");
                }
            }
        });
    });
</script>