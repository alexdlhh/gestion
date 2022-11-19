<?php
require __DIR__.'/../../function.php';
// interfaz para introducir datos como los del siguiente insert INSERT INTO `Produccion_Mes` (`id`, `id_cliente`, `company`, `mes_vto`, `fecha_emision`, `cliente`, `refer_cliente`, `cif`, `direccion`, `telefono`, `servicios`, `company1`, `agente`, `company2`, `poliza`, `identifier`, `descripcion`, `contratado`, `pneta`, `hsp`, `total`, `status`, `cobro`, `importe`, `fecha`, `contidad_pte`) VALUES (1, 1, 1, 1, '2022-11-17', 1, '1', '65789', 'tcfvgbhkl', '56789', 'tyvgbhk', 'tfghj', 1, 'jhbkjn', '567689', '546576', 'hfjvgkbl', '1', 1, '1', 1000, 1, 1, 10, '2022-11-17', 1);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Produccion Mes</span>
                <form action="api.php" method="post">
                    <input type="hidden" name="option" value="edit_produccion_mes">
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="id_cliente" name="id_cliente" type="text" value="<?=$produccion_mes->id_cliente?>">
                            <label for="id_cliente">id_cliente</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="company" name="company" type="text" value="<?=$produccion_mes->company?>">
                            <label for="company">company</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="mes_vto" name="mes_vto" type="text" value="<?=$produccion_mes->mes_vto?>">
                            <label for="mes_vto">mes_vto</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="fecha_emision" name="fecha_emision" type="text" value="<?=$produccion_mes->fecha_emision?>">
                            <label for="fecha_emision">fecha_emision</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="cliente" name="cliente" type="text" value="<?=$produccion_mes->cliente?>">
                            <label for="cliente">cliente</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="refer_cliente" name="refer_cliente" type="text" value="<?=$produccion_mes->refer_cliente?>">
                            <label for="refer_cliente">refer_cliente</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="cif" name="cif" type="text" value="<?=$produccion_mes->cif?>">
                            <label for="cif">cif</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="direccion" name="direccion" type="text" value="<?=$produccion_mes->direccion?>">
                            <label for="direccion">direccion</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="telefono" name="telefono" type="text" value="<?=$produccion_mes->telefono?>">
                            <label for="telefono">telefono</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="servicios" name="servicios" type="text" value="<?=$produccion_mes->servicios?>">
                            <label for="servicios">servicios</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="company1" name="company1" type="text" value="<?=$produccion_mes->company1?>">
                            <label for="company1">company1</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="agente" name="agente" type="text" value="<?=$produccion_mes->agente?>">
                            <label for="agente">agente</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="company2" name="company2" type="text" value="<?=$produccion_mes->company2?>">
                            <label for="company2">company2</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="poliza" name="poliza" type="text" value="<?=$produccion_mes->poliza?>">
                            <label for="poliza">poliza</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="identifier" name="identifier" type="text" value="<?=$produccion_mes->identifier?>">
                            <label for="identifier">identifier</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="descripcion" name="descripcion" type="text" value="<?=$produccion_mes->descripcion?>">
                            <label for="descripcion">descripcion</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="contratado" name="contratado" type="text" value="<?=$produccion_mes->contratado?>">
                            <label for="contratado">contratado</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="pneta" name="pneta" type="text" value="<?=$produccion_mes->pneta?>">
                            <label for="pneta">pneta</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="hsp" name="hsp" type="text" value="<?=$produccion_mes->hsp?>">
                            <label for="hsp">hsp</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="total" name="total" type="text" value="<?=$produccion_mes->total?>">
                            <label for="total">total</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="status" name="status" type="text" value="<?=$produccion_mes->status?>">
                            <label for="status">status</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="cobro" name="cobro" type="text" value="<?=$produccion_mes->cobro?>">
                            <label for="cobro">cobro</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="importe" name="importe" type="text" value="<?=$produccion_mes->importe?>">
                            <label for="importe">importe</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="fecha" name="fecha" type="text" value="<?=$produccion_mes->fecha?>">
                            <label for="fecha">fecha</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="contidad_pte" name="contidad_pte" type="text" value="<?=$produccion_mes->contidad_pte?>">
                            <label for="contidad_pte">contidad_pte</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
            action = 'addProduccionMes';
        }else{
            action = 'updateProduccionMes';
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
