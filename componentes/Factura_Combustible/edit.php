<?php
require __DIR__.'/../../function.php';
//una vista donde poder editar los datos de la factura combustible con la siguiente estructura INSERT INTO `Facturas_Combustible` (`id`, `orden`, `fecha_albaran`, `albaran`, `cliente`, `company`, `type`, `num_order`, `factura`, `num_remesa`, `fecha_dto`, `fecha_factura`, `fecha_remesa`, `dias`, `num_factura`, `total`, `dirigido`, `cif`, `cobrado`, `vto`, `otros`, `timbres`, `interes`, `comision`, `base`, `desglose`, `gastos`, `iva`, `fecha_pago`, `observaciones`, `autonomo`, `ssociales`, `sueldos`) VALUES (1, 1, '2022-11-17', 1, 1, '1', 1, '1', '1', '1', '2022-11-17', '2022-11-17', '2022-11-17', 11, '1', 1210, '1', '5467898', 1, '1', 'K', '?', '1', '1', 1000, '{\"test\":1}', '1', 1, '2022-11-17', 'yugh', '1', '1', 1);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Factura Combustible</span>
                <div class="row">
                    <form class="col s12" method="post" action="save.php">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="orden" name="orden" type="text" class="validate" value="<?=$factura['orden']?>">
                                <label for="orden">Orden</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="fecha_albaran" name="fecha_albaran" type="text" class="validate" value="<?=$factura['fecha_albaran']?>">
                                <label for="fecha_albaran">Fecha Albaran</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="albaran" name="albaran" type="text" class="validate" value="<?=$factura['albaran']?>">
                                <label for="albaran">Albaran</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="cliente" name="cliente" type="text" class="validate" value="<?=$factura['cliente']?>">
                                <label for="cliente">Cliente</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="company" name="company" type="text" class="validate" value="<?=$factura['company']?>">
                                <label for="company">Company</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="type" name="type" type="text" class="validate" value="<?=$factura['type']?>">
                                <label for="type">Type</label>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="num_order" name="num_order" type="text" class="validate" value="<?=$factura['num_order']?>">
                                <label for="num_order">Num Order</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="factura" name="factura" type="text" class="validate" value="<?=$factura['factura']?>">
                                <label for="factura">Factura</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="num_remesa" name="num_remesa" type="text" class="validate" value="<?=$factura['num_remesa']?>">
                                <label for="num_remesa">Num Remesa</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="fecha_dto" name="fecha_dto" type="text" class="validate" value="<?=$factura['fecha_dto']?>">
                                <label for="fecha_dto">Fecha Dto</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="fecha_factura" name="fecha_factura" type="text" class="validate" value="<?=$factura['fecha_factura']?>">
                                <label for="fecha_factura">Fecha Factura</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="fecha_remesa" name="fecha_remesa" type="text" class="validate" value="<?=$factura['fecha_remesa']?>">
                                <label for="fecha_remesa">Fecha Remesa</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="dias" name="dias" type="text" class="validate" value="<?=$factura['dias']?>">
                                <label for="dias">Dias</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="num_factura" name="num_factura" type="text" class="validate" value="<?=$factura['num_factura']?>">
                                <label for="num_factura">Num Factura</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="total" name="total" type="text" class="validate" value="<?=$factura['total']?>">
                                <label for="total">Total</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="dirigido" name="dirigido" type="text" class="validate" value="<?=$factura['dirigido']?>">
                                <label for="dirigido">Dirigido</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="cif" name="cif" type="text" class="validate" value="<?=$factura['cif']?>">
                                <label for="cif">Cif</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="cobrado" name="cobrado" type="text" class="validate" value="<?=$factura['cobrado']?>">
                                <label for="cobrado">Cobrado</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="vto" name="vto" type="text" class="validate" value="<?=$factura['vto']?>">
                                <label for="vto">Vto</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="otros" name="otros" type="text" class="validate" value="<?=$factura['otros']?>">
                                <label for="otros">Otros</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="timbres" name="timbres" type="text" class="validate" value="<?=$factura['timbres']?>">
                                <label for="timbres">Timbres</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="interes" name="interes" type="text" class="validate" value="<?=$factura['interes']?>">
                                <label for="interes">Interes</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="comision" name="comision" type="text" class="validate" value="<?=$factura['comision']?>">
                                <label for="comision">Comision</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="base" name="base" type="text" class="validate" value="<?=$factura['base']?>">
                                <label for="base">Base</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="desglose" name="desglose" type="text" class="validate" value="<?=$factura['desglose']?>">
                                <label for="desglose">Desglose</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="gastos" name="gastos" type="text" class="validate" value="<?=$factura['gastos']?>">
                                <label for="gastos">Gastos</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="iva" name="iva" type="text" class="validate" value="<?=$factura['iva']?>">
                                <label for="iva">Iva</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="fecha_pago" name="fecha_pago" type="text" class="validate" value="<?=$factura['fecha_pago']?>">
                                <label for="fecha_pago">Fecha Pago</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="observaciones" name="observaciones" type="text" class="validate" value="<?=$factura['observaciones']?>">
                                <label for="observaciones">Observaciones</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="autonomo" name="autonomo" type="text" class="validate" value="<?=$factura['autonomo']?>">
                                <label for="autonomo">Autonomo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="ssociales" name="ssociales" type="text" class="validate" value="<?=$factura['ssociales']?>">
                                <label for="ssociales">Ssociales</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="sueldos" name="sueldos" type="text" class="validate" value="<?=$factura['sueldos']?>">
                                <label for="sueldos">Sueldos</label>
                            </div>
                        </div>
                        <input type="text" id="id" name="id" value="<?=$factura['id']?>" hidden>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
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
        var datos = $("#form").serialize();
        console.log(datos);
        //Hacemos la petición ajax
        action = '';
        if(data.id==0){
            action = 'insertFacturaCombustible';
        }else{
            action = 'updateFacturaCombustible';
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
