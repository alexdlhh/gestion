<?php

if($_COOKIE['login']==false){
	header('Location: ../index.php');
}else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include_once '../componentes/head.php';?>
    <body>
        <div class="row vh100">
            <div class="col s2 column hpercen100">
                <ul class="side_nav">
                    <li><a href="index.php" id="home">Home</a></li>
                    <li class="<?=$_GET['place']=='admin'?'active':''?>"><a href="?place=admin" id="admin">Admins</a></li>
                    <li class="<?=$_GET['place']=='contact'?'active':''?>"><a href="?place=contact" id="contact">Contratos</a></li>
                    <li class="<?=$_GET['place']=='cliente'?'active':''?>"><a href="?place=cliente"  id="cliente">Clientes</a></li>
                    <li class="<?=$_GET['place']=='Company'?'active':''?>"><a href="?place=Company"  id="Company">Empresas</a></li>
                    <li class="<?=$_GET['place']=='Factura'?'active':''?>"><a href="?place=Factura"  id="Factura">Factura</a></li>
                    <li class="<?=$_GET['place']=='Factura_Combustible'?'active':''?>"><a href="?place=Factura_Combustible"  id="Factura_Combustible">Factura Combustible</a></li>
                    <li class="<?=$_GET['place']=='Formas_Pago'?'active':''?>"><a href="?place=Formas_Pago"  id="Formas_Pago">Formas de Pago</a></li>
                    <li class="<?=$_GET['place']=='Liquidaciones_ECT'?'active':''?>"><a href="?place=Liquidaciones_ECT"  id="Liquidaciones_ECT">Liquidaciones ECT</a></li>
                    <li class="<?=$_GET['place']=='Precio_Litros'?'active':''?>"><a href="?place=Precio_Litros"  id="Precio_Litros">Precio/Litro</a></li>
                    <li class="<?=$_GET['place']=='Presupuesto'?'active':''?>"><a href="?place=Presupuesto" id="Presupuesto">Presupuesto</a></li>
                    <li class="<?=$_GET['place']=='Produccion_Mes'?'active':''?>"><a href="?place=Produccion_Mes"  id="Produccion_Mes">Produccion Mes</a></li>
                    <li class="<?=$_GET['place']=='Tipos_Entidades'?'active':''?>"><a href="?place=Tipos_Entidades"  id="Tipos_Entidades">Tipos Entidades</a></li>
                    <li class="<?=$_GET['place']=='Tipos_Factura'?'active':''?>"><a href="?place=Tipos_Factura"  id="Tipos_Factura">Tipos Factura</a></li>
                    <li class="<?=$_GET['place']=='Tipos_Factura_Combustible'?'active':''?>"><a href="?place=Tipos_Factura_Combustible"  id="Tipos_Factura_Combustible">Tipos Factura Combustible</a></li>
                    <li class="<?=$_GET['place']=='Transacciones'?'active':''?>"><a href="?place=Transacciones"  id="Transacciones">Transacciones</a></li>
                    <li class="<?=$_GET['place']=='Transaccion_Contrato'?'active':''?>"><a href="?place=Transaccion_Contrato"  id="Transaccion_Contrato">Transacción Contrato</a></li>
                </ul>
            </div>
            <div class="col s10" id="contenido">
                <?php
                $place = !empty($_GET['place'])?$_GET['place']:'home';
                $file = !empty($_GET['file'])?'edit':'list';
                include_once '../componentes/'.$place.'/'.$file.'.php';
                ?>
            </div>
        </div>
    </body>
    </html>
    <?php
}