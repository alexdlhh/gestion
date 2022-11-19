<?php
require __DIR__.'/../../function.php';
//vamos a hacer una vista donde exista un formulario donde poder insertar datos como el siguiente insert INSERT INTO `Contratos` (`id`, `id_cliente`, `company`, `mes_vto`, `fecha_emision`, `cliente`, `refer_cliente`, `cif`, `direccion`, `telefono`, `servicios`, `company1`, `agente`, `company2`, `poliza`, `identifier`, `descripcion`, `contratado`, `pneta`, `hsp`, `total`, `status`, `cobro`, `importe`, `fecha`, `contidad_pte`) VALUES (1, 1, 1, 1, '2022-11-17', 1, '1', '34567', 'gfhjbhk', '54678', 'gfhvjbhklm', 'yvgjbh', 1, 'gfhgvjbhk', '6578', '65678', 'tfchvgjbh', 'yvgjbk', 1, '1', 1000, 1, 1, 1000, '2022-11-17', 1);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?=$_GET['id']?'Editar':'Crear'?> Contrato</span>
                <form action="javascript:;" method="post" id="form">
                    <div class="row">
                        <input type="text" id="id" id="id" value="<?=$_GET['id']?>" hidden>
                        <div class="input-field col s3">
                            <input type="text" id="id_cliente" id="id_cliente" value="<?=$_GET['id_cliente']?>">
                            <label for="id_cliente">id_cliente</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="company" id="company" value="<?=$_GET['company']?>">
                            <label for="company">company</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="mes_vto" id="mes_vto" value="<?=$_GET['mes_vto']?>">
                            <label for="mes_vto">mes_vto</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="fecha_emision" id="fecha_emision" value="<?=$_GET['fecha_emision']?>">
                            <label for="fecha_emision">fecha_emision</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="cliente" id="cliente" value="<?=$_GET['cliente']?>">
                            <label for="cliente">cliente</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="refer_cliente" id="refer_cliente" value="<?=$_GET['refer_cliente']?>">
                            <label for="refer_cliente">refer_cliente</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="cif" id="cif" value="<?=$_GET['cif']?>">
                            <label for="cif">cif</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="direccion" id="direccion" value="<?=$_GET['direccion']?>">
                            <label for="direccion">direccion</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="telefono" id="telefono" value="<?=$_GET['telefono']?>">
                            <label for="telefono">telefono</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="servicios" id="servicios" value="<?=$_GET['servicios']?>">
                            <label for="servicios">servicios</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="company1" id="company1" value="<?=$_GET['company1']?>">
                            <label for="company1">company1</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="agente" id="agente" value="<?=$_GET['agente']?>">
                            <label for="agente">agente</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="company2" id="company2" value="<?=$_GET['company2']?>">
                            <label for="company2">company2</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="poliza" id="poliza" value="<?=$_GET['poliza']?>">
                            <label for="poliza">poliza</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="identifier" id="identifier" value="<?=$_GET['identifier']?>">
                            <label for="identifier">identifier</label>
                        </div>
                        <div class="input-field col s3">
                            <input type="text" id="descripcion" id="descripcion" value="<?=$_GET['descripcion']?>">
                            <label for="descripcion">descripcion</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s3">
                            <button type="submit" class="btn waves-effect waves-light">Guardar</button>
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
            id: $("#id").val(),
            id_cliente: $("#id_cliente").val(),
            company: $("#company").val(),
            mes_vto: $("#mes_vto").val(),
            fecha_emision: $("#fecha_emision").val(),
            cliente: $("#cliente").val(),
            refer_cliente: $("#refer_cliente").val(),
            cif: $("#cif").val(),
            direccion: $("#direccion").val(),
            telefono: $("#telefono").val(),
            servicios: $("#servicios").val(),
            company1: $("#company1").val(),
            agente: $("#agente").val(),
            company2: $("#company2").val(),
            poliza: $("#poliza").val(),
            identifier: $("#identifier").val(),
            descripcion: $("#descripcion").val()
        };
        var action = "";
        if(data.id == 0){
            action = "addContract";
        }else{
            action = "updateContract";
        }
        //Hacemos un CURL mediante POST a api.php, option = editadmin
        $.post("/api.php", {option: action, data: data}, function(data){
            //Recibimos un JSON con los datos de las admin
            data = JSON.parse(data);
            //Si la respuesta es correcta
            if(data.status == "success"){
                //Redireccionamos a la vista de admin
                window.location.href = "?place=contact";
            }else{
                //Si no, mostramos un mensaje de error
                alert("Error al guardar");
            }
        });
});
</script>