<?php

if($_COOKIE['login']==false){
	header('Location: ../index.php');
}else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include_once '../componentes/head.php';?>
    <body>
        <div class="row">
            <div class="col s3 column">
                <ul>
                    <li><a href="javascript:;" id="home">Home</a></li>
                    <li><a href="javascript:;" id="admin">Admins</a></li>
                    <li><a href="javascript:;" id="contact">Contactos</a></li>
                    <li><a href="javascript:;" id="cliente">Clientes</a></li>
                    <li><a href="javascript:;" id="Company">Empresas</a></li>
                    <li><a href="javascript:;" id="Factura">Factura</a></li>
                    <li><a href="javascript:;" id="Factura_Combustible">Factura Combustible</a></li>
                    <li><a href="javascript:;" id="Formas_Pago">Formas de Pago</a></li>
                    <li><a href="javascript:;" id="Liquidaciones_ECT">Liquidaciones ECT</a></li>
                    <li><a href="javascript:;" id="Precio_Litros">Precio/Litro</a></li>
                    <li><a href="javascript:;" id="Presupuesto">Presupuesto</a></li>
                    <li><a href="javascript:;" id="Produccion_Mes">Produccion Mes</a></li>
                    <li><a href="javascript:;" id="Tipos_Entidades">Tipos Entidades</a></li>
                    <li><a href="javascript:;" id="Tipos_Factura">Tipos Factura</a></li>
                    <li><a href="javascript:;" id="Tipos_Factura_Combustible">Tipos Factura Combustible</a></li>
                    <li><a href="javascript:;" id="Transacciones">Transacciones</a></li>
                    <li><a href="javascript:;" id="Transaccion_Contrato">Transacción Contrato</a></li>
                </ul>
            </div>
            <div class="col s9" id="contenido"></div>
        </div>
    </body>
    </html>
    <?php
}