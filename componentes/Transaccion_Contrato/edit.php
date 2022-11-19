<?php
require __DIR__.'/../../function.php';
// interfaz para introducir datos como los del siguiente insert INSERT INTO `Transaccion_Contrato` (`id`, `concepto`, `importe`, `fecha`, `company`, `id_contrato`) VALUES (1, 'fhgjh', 1000, '2022-11-17', 1, 1);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Transaccion_Contrato</span>
                <form action="save.php" method="post">
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="concepto" name="concepto" type="text" value="<?=$transaccion_contratos->concepto?>">
                            <label for="concepto">concepto</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="importe" name="importe" type="text" value="<?=$transaccion_contratos->importe?>">
                            <label for="importe">importe</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="fecha" name="fecha" type="text" value="<?=$transaccion_contratos->fecha?>">
                            <label for="fecha">fecha</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="company" name="company" type="text" value="<?=$transaccion_contratos->company?>">
                            <label for="company">company</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="id_contrato" name="id_contrato" type="text" value="<?=$transaccion_contratos->id_contrato?>">
                            <label for="id_contrato">id_contrato</label>
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
            action = 'insertTransaccionContrato';
        }else{
            action = 'updateTransaccionContrato';
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