<?php
require __DIR__.'/../../function.php';
// interfaz para introducir datos como los del siguiente insert INSERT INTO `Transacciones` (`id`, `id_factura`, `forma_pago`, `fecha_pago`, `importe`, `type`, `forma_cobro`, `fecha_cobro`, `forma_pc`) VALUES (1, 1, '1', '2022-11-17', 1000, 1, '1', '2022-11-17', '1');
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Transacciones</span>
                <form action="save.php" method="post">
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="id_factura" name="id_factura" type="text" value="<?=$transaccioness->id_factura?>">
                            <label for="id_factura">id_factura</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="forma_pago" name="forma_pago" type="text" value="<?=$transaccioness->forma_pago?>">
                            <label for="forma_pago">forma_pago</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="fecha_pago" name="fecha_pago" type="text" value="<?=$transaccioness->fecha_pago?>">
                            <label for="fecha_pago">fecha_pago</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="importe" name="importe" type="text" value="<?=$transaccioness->importe?>">
                            <label for="importe">importe</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="type" name="type" type="text" value="<?=$transaccioness->type?>">
                            <label for="type">type</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="forma_cobro" name="forma_cobro" type="text" value="<?=$transaccioness->forma_cobro?>">
                            <label for="forma_cobro">forma_cobro</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="fecha_cobro" name="fecha_cobro" type="text" value="<?=$transaccioness->fecha_cobro?>">
                            <label for="fecha_cobro">fecha_cobro</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="forma_pc" name="forma_pc" type="text" value="<?=$transaccioness->forma_pc?>">
                            <label for="forma_pc">forma_pc</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
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
            action = 'insertTransacciones';
        }else{
            action = 'updateTransacciones';
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