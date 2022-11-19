<?php
require __DIR__.'/../../function.php';
//panel para editar/insertar Factuas con la estruectura de ejemplo de este insert INSERT INTO `Facturas` (`id`, `date`, `num`, `dirigido`, `cif`, `base`, `iva`, `otros`, `irpf`, `total`, `type`, `prestado`, `asunto`, `motivo`, `company`) VALUES (1, '2022-11-17', 1, 1, '54678', 1000, 21, 'u', 15, 1210, 1, 'hjn', 'hbjn', 'hbjn', 1);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Factura</span>
                <div class="row">
                    <form class="col s12" method="post" action="api.php?option=editFactura">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="date" name="date" type="date" class="validate" value="<?=$factura->date?>">
                                <label for="date">Fecha</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="num" name="num" type="number" class="validate" value="<?=$factura->num?>">
                                <label for="num">Nº Factura</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="dirigido" name="dirigido" type="text" class="validate" value="<?=$factura->dirigido?>">
                                <label for="dirigido">Dirigido a</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="cif" name="cif" type="text" class="validate" value="<?=$factura->cif?>">
                                <label for="cif">CIF</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="base" name="base" type="number" class="validate" value="<?=$factura->base?>">
                                <label for="base">Base</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="iva" name="iva" type="number" class="validate" value="<?=$factura->iva?>">
                                <label for="iva">IVA</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="otros" name="otros" type="number" class="validate" value="<?=$factura->otros?>">
                                <label for="otros">Otros</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="irpf" name="irpf" type="number" class="validate" value="<?=$factura->irpf?>">
                                <label for="irpf">IRPF</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="total" name="total" type="number" class="validate" value="<?=$factura->total?>">
                                <label for="total">Total</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="type" name="type" type="number" class="validate" value="<?=$factura->type?>">
                                <label for="type">Tipo</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="prestado" name="prestado" type="text" class="validate" value="<?=$factura->prestado?>">
                                <label for="prestado">Prestado</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="asunto" name="asunto" type="text" class="validate" value="<?=$factura->asunto?>">
                                <label for="asunto">Asunto</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="motivo" name="motivo" type="text" class="validate" value="<?=$factura->motivo?>">
                                <label for="motivo">Motivo</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="company" name="company" type="number" class="validate" value="<?=$factura->company?>">
                                <label for="company">Empresa</label>
                            </div>
                            <input type="hidden" name="id" value="<?=$factura->id?>">
                            <div class="col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <input type="text" id="id" name="id" value="<?=$factura->id?>">
                        </div>
                    </form>
                </div>
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
        var data = $("#form").serialize();
        //Enviamos los datos por POST
        if($("#id").val() == 0){
            action = 'insertFactura';            
        }else{
            action = 'editFactura';
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