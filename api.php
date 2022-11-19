<?php

include_once 'modeloDB.php';
$bd = new ModeloBD('');

$option = $_POST['option'];
/**LOGIN */
switch($option){
    case 'login':
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql="SELECT * FROM `Admin` WHERE `user` = '$username' AND `pass` = '$password'";
        if($bd->exist_some_row($sql)){
            $_COOKIE['login'] = true;
            echo true;
        }else{
            
        }   
        break;
    case 'logout':
        $_COOKIE['login'] = false;
        echo json_encode(array('status' => 'success'));
        break;
    default:
        
        break;
}

/**Company */
switch($option){
    case 'addCompany':
        $name = $_POST['data']['name'];
        $type = $_POST['data']['type'];
        $sql="INSERT INTO `Company` (`name`, `type`) VALUES
        ('{$name}', {$type});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        } 
        break;
    case 'updateCompany':
        $id = $_POST['data']['id'];
        $name = $_POST['data']['name'];
        $type = $_POST['data']['type'];
        $sql="UPDATE `Company` SET `name` = '{$name}', `type` = {$type} WHERE `Company`.`id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        } 
        break;
    case 'deleteCompany':
        $id = $_POST['id'];
        $sql="DELETE FROM `Company` WHERE `Company`.`id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }   
        break;
    case 'getCompany':
        if(!empty($_POST['where'])){
            $where = $_POST['where'];
            $value = $_POST['value'];
            $sql="SELECT * FROM `Company` WHERE `{$where}` LIKE '%{$value}%'";
        }
        $sql="SELECT * FROM `Company`";
        $bd->get_results_from_query($sql);
        $result = $bd->get_rows();
        if($result){
            echo json_encode($result);
        }else{
            
        }   
        break;
    default:
        
        break;
}

/**Conceptos Factura */
switch($option){
    case 'addConcept':
        $name = $_POST['name'];
        $price = $_POST['price'];
        $iva = $_POST['iva'];
        $otros = $_POST['otros'];
        $id_factura = $_POST['id_factura'];
        $company = $_POST['company'];
        $sql="INSERT INTO `Conceptos_Factura` (`nombre`, `importe`, `iva`, `otros`, `id_factura`, `company`) VALUES
        ('{$name}', {$price}, {$iva}, '{$otros}', {$id_factura}, {$company});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }   
        break;
    case 'updateConcept':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $iva = $_POST['iva'];
        $otros = $_POST['otros'];
        $id_factura = $_POST['id_factura'];
        $company = $_POST['company'];
        $sql="UPDATE `Conceptos_Factura` SET `nombre` = '{$name}', `importe` = {$price}, `iva` = {$iva}, `otros` = '{$otros}', `id_factura` = {$id_factura}, `company` = {$company} WHERE `Conceptos_Factura`.`id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }   
        break;
    case 'deleteConcept':
        $id = $_POST['id'];
        $sql="DELETE FROM `Conceptos_Factura` WHERE `Conceptos_Factura`.`id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }   
        break;
    case 'getConcept':
        if(!empty($_POST['where'])){
            $where = $_POST['where'];
            $value = $_POST['value'];
            $sql="SELECT * FROM `Conceptos_Factura` WHERE `{$where}` LIKE '%{$value}%'";
        }
        $sql="SELECT * FROM `Conceptos_Factura`";
        $result = $bd->execute_query($sql);
        if($result){
            echo json_encode($result);
        }else{
            
        }   
        break;
    default:
        
        break;
}

/** Contratos */
switch($option){
    case 'addContract':
        $id_cliente = $_POST['data']['id_cliente'];
        $company = $_POST['data']['company'];
        $mes_vto = $_POST['data']['mes_vto'];
        $fecha_emision = $_POST['data']['fecha_emision'];
        $cliente = $_POST['data']['cliente'];
        $refer_cliente = $_POST['data']['refer_cliente'];
        $cif = $_POST['data']['cif'];
        $direccion = $_POST['data']['direccion'];
        $telefono = $_POST['data']['telefono'];
        $servicios = $_POST['data']['servicios'];
        $company1 = $_POST['data']['company1'];
        $agente = $_POST['data']['agente'];
        $company2 = $_POST['data']['company2'];
        $poliza = $_POST['data']['poliza'];
        $identifier = $_POST['data']['identifier'];
        $descripcion = $_POST['data']['descripcion'];
        $contratado = $_POST['data']['contratado'];
        $pneta = $_POST['data']['pneta'];
        $hsp = $_POST['data']['hsp'];
        $total = $_POST['data']['total'];
        $status = $_POST['data']['status'];
        $cobro = $_POST['data']['cobro'];
        $importe = $_POST['data']['importe'];
        $fecha = $_POST['data']['fecha'];
        $contidad_pte = $_POST['data']['contidad_pte'];
        $sql="INSERT INTO `Contratos` (`id_cliente`, `company`, `mes_vto`, `fecha_emision`, `cliente`, `refer_cliente`, `cif`, `direccion`, `telefono`, `servicios`, `company1`, `agente`, `company2`, `poliza`, `identifier`, `descripcion`, `contratado`, `pneta`, `hsp`, `total`, `status`, `cobro`, `importe`, `fecha`, `contidad_pte`) VALUES
        ({$id_cliente}, {$company}, {$mes_vto}, '{$fecha_emision}', '{$cliente}', '{$refer_cliente}', '{$cif}', '{$direccion}', '{$telefono}', '{$servicios}', '{$company1}', {$agente}, '{$company2}', '{$poliza}', '{$identifier}', '{$descripcion}', '{$contratado}', '{$pneta}', '{$hsp}', '{$total}', '{$status}', '{$cobro}', '{$importe}', '{$fecha}', '{$contidad_pte}');";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }   
        break;
    case 'updateContract':
        $id = $_POST['data']['id'];
        $id_cliente = $_POST['data']['id_cliente'];
        $company = $_POST['data']['company'];
        $mes_vto = $_POST['data']['mes_vto'];
        $fecha_emision = $_POST['data']['fecha_emision'];
        $cliente = $_POST['data']['cliente'];
        $refer_cliente = $_POST['data']['refer_cliente'];
        $cif = $_POST['data']['cif'];
        $direccion = $_POST['data']['direccion'];
        $telefono = $_POST['data']['telefono'];
        $servicios = $_POST['data']['servicios'];
        $company1 = $_POST['data']['company1'];
        $agente = $_POST['data']['agente'];
        $company2 = $_POST['data']['company2'];
        $poliza = $_POST['data']['poliza'];
        $identifier = $_POST['data']['identifier'];
        $descripcion = $_POST['data']['descripcion'];
        $contratado = $_POST['data']['contratado'];
        $pneta = $_POST['data']['pneta'];
        $hsp = $_POST['data']['hsp'];
        $total = $_POST['data']['total'];
        $status = $_POST['data']['status'];
        $cobro = $_POST['data']['cobro'];
        $importe = $_POST['data']['importe'];
        $fecha = $_POST['data']['fecha'];
        $contidad_pte = $_POST['data']['contidad_pte'];
        $sql="UPDATE `Contratos` SET `id_cliente` = {$id_cliente}, `company` = {$company}, `mes_vto` = {$mes_vto}, `fecha_emision` = '{$fecha_emision}', `cliente` = '{$cliente}', `refer_cliente` = '{$refer_cliente}', `cif` = '{$cif}', `direccion` = '{$direccion}', `telefono` = '{$telefono}', `servicios` = '{$servicios}', `company1` = '{$company1}', `agente` = {$agente}, `company2` = '{$company2}', `poliza` = '{$poliza}', `identifier` = '{$identifier}', `descripcion` = '{$descripcion}', `contratado` = '{$contratado}', `pneta` = '{$pneta}', `hsp` = '{$hsp}', `total` = '{$total}', `status` = '{$status}', `cobro` = '{$cobro}', `importe` = '{$importe}', `fecha` = '{$fecha}', `contidad_pte` = '{$contidad_pte}' WHERE `Contratos`.`id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }   
        break;
    case 'deleteContract':
        $id = $_POST['id'];
        $sql="DELETE FROM `Contratos` WHERE `Contract`.`id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }   
        break;
    case 'getContract':
        if(!empty($_POST['where'])){
            $where = $_POST['where'];
            $value = $_POST['value'];
            $sql="SELECT * FROM `Contratos` WHERE `{$where}` LIKE '%{$value}%'";
        }
        $sql="SELECT * FROM `Contratos`";
        $bd->get_results_from_query($sql);
        $result = $bd->get_rows();
        if($result){
            echo json_encode($result);
        }
        break;
    default:
        
        break;
}

/** Entidades */
switch ($option) {
    case 'insertEntity':
        $type = $_POST['type'];
        $name = $_POST['name'];
        $nif = $_POST['nif'];
        $date = $_POST['date'];
        $b_address = $_POST['b_address'];
        $address = $_POST['address'];
        $poblacion = $_POST['poblacion'];
        $cp = $_POST['cp'];
        $provincia = $_POST['provincia'];
        $contact = $_POST['contact'];
        $phone = $_POST['phone'];
        $phone2 = $_POST['phone2'];
        $email = $_POST['email'];
        $bank = $_POST['bank'];
        $observaciones = $_POST['observaciones'];
        $season = $_POST['season'];
        $company = $_POST['company'];
        $alta_proveedor = $_POST['alta_proveedor'];
        $tipo_cliente = $_POST['tipo_cliente'];
        $sql="INSERT INTO `Entidades` (`type`, `name`, `nif`, `date`, `b_address`, `address`, `poblacion`, `cp`, `provincia`, `contact`, `phone`, `phone2`, `email`, `bank`, `observaciones`, `season`, `company`, `alta_proveedor`, `tipo_cliente`) VALUES ({$type}, '{$name}', '{$nif}', '{$date}', '{$b_address}', '{$address}', '{$poblacion}', {$cp}, '{$provincia}', '{$contact}', '{$phone}', '{$phone2}', '{$email}', '{$bank}', '{$observaciones}', {$season}, {$company}, '{$alta_proveedor}', {$tipo_cliente});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }   
        break;
    case 'updateEntity':
        $id = $_POST['id'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $nif = $_POST['nif'];
        $date = $_POST['date'];
        $b_address = $_POST['b_address'];
        $address = $_POST['address'];
        $poblacion = $_POST['poblacion'];
        $cp = $_POST['cp'];
        $provincia = $_POST['provincia'];
        $contact = $_POST['contact'];
        $phone = $_POST['phone'];
        $phone2 = $_POST['phone2'];
        $email = $_POST['email'];
        $bank = $_POST['bank'];
        $observaciones = $_POST['observaciones'];
        $season = $_POST['season'];
        $company = $_POST['company'];
        $alta_proveedor = $_POST['alta_proveedor'];
        $tipo_cliente = $_POST['tipo_cliente'];
        $sql="UPDATE `Entidades` SET `type` = {$type}, `name` = '{$name}', `nif` = '{$nif}', `date` = '{$date}', `b_address` = '{$b_address}', `address` = '{$address}', `poblacion` = '{$poblacion}', `cp` = {$cp}, `provincia` = '{$provincia}', `contact` = '{$contact}', `phone` = '{$phone}', `phone2` = '{$phone2}', `email` = '{$email}', `bank` = '{$bank}', `observaciones` = '{$observaciones}', `season` = {$season}, `company` = {$company}, `alta_proveedor` = '{$alta_proveedor}', `tipo_cliente` = {$tipo_cliente} WHERE `Entidades`.`id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteEntity':
        $id = $_POST['id'];
        $sql="DELETE FROM `Entidades` WHERE `Entidades`.`id` = {$id}";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getEntity':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Entidades` WHERE `Entidades`.`id` = {$id}";
        $result = $bd->execute_query($sql);
        if($result){
            echo json_encode($result);
        }else{
            
        }   
        break;
    case 'getEntities':
        $sql="SELECT * FROM `Entidades`";
        $result = $bd->execute_query($sql);
        if($result){
            echo json_encode($result);
        }else{
            
        }   
        break;
    default:
        
        break;
}

/** Facturas */
switch ($option) {
    case 'insertFactura':
        $date = $_POST['data']['date'];
        $num = $_POST['data']['num'];
        $dirigido = $_POST['data']['dirigido'];
        $cif = $_POST['data']['cif'];
        $base = $_POST['data']['base'];
        $iva = $_POST['data']['iva'];
        $otros = $_POST['data']['otros'];
        $irpf = $_POST['data']['irpf'];
        $total = $_POST['data']['total'];
        $type = $_POST['data']['type'];
        $prestado = $_POST['data']['prestado'];
        $asunto = $_POST['data']['asunto'];
        $motivo = $_POST['data']['motivo'];
        $company = $_POST['data']['company'];
        $sql="INSERT INTO `Facturas` (`date`, `num`, `dirigido`, `cif`, `base`, `iva`, `otros`, `irpf`, `total`, `type`, `prestado`, `asunto`, `motivo`, `company`) VALUES ('{$date}', {$num}, {$dirigido}, '{$cif}', {$base}, {$iva}, '{$otros}', {$irpf}, {$total}, {$type}, '{$prestado}', '{$asunto}', '{$motivo}', {$company});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }
        break;
    case 'updateFactura':
        $id = $_POST['id'];
        $date = $_POST['date'];
        $num = $_POST['num'];
        $dirigido = $_POST['dirigido'];
        $cif = $_POST['cif'];
        $base = $_POST['base'];
        $iva = $_POST['iva'];
        $otros = $_POST['otros'];
        $irpf = $_POST['irpf'];
        $total = $_POST['total'];
        $type = $_POST['type'];
        $prestado = $_POST['prestado'];
        $asunto = $_POST['asunto'];
        $motivo = $_POST['motivo'];
        $company = $_POST['company'];
        $sql="UPDATE `Facturas` SET `date` = '{$date}', `num` = {$num}, `dirigido` = {$dirigido}, `cif` = '{$cif}', `base` = {$base}, `iva` = {$iva}, `otros` = '{$otros}', `irpf` = {$irpf}, `total` = {$total}, `type` = {$type}, `prestado` = '{$prestado}', `asunto` = '{$asunto}', `motivo` = '{$motivo}', `company` = {$company} WHERE `Facturas`.`id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteFactura':
        $id = $_POST['id'];
        $sql="DELETE FROM `Facturas` WHERE `Facturas`.`id` = {$id}";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getFactura':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Facturas` WHERE `Facturas`.`id` = {$id}";
        $result = $bd->execute_query($sql);
        if($result){
            echo json_encode($result);
        }else{
            
        }   
        break;
    case 'getFacturas':
        $sql="SELECT * FROM `Facturas`";
        $bd->get_results_from_query($sql);
        $result = $bd->get_rows();
        if($result){
            echo json_encode($result);
        }else{
            
        }   
        break;
    default:
        break;
}

/** Facturas Combustible */
switch ($option) {
    case 'insertFacturaCombustible':
        $orden = $_POST['orden'];
        $fecha_albaran = $_POST['fecha_albaran'];
        $albaran = $_POST['albaran'];
        $cliente = $_POST['cliente'];
        $company = $_POST['company'];
        $type = $_POST['type'];
        $num_order = $_POST['num_order'];
        $factura = $_POST['factura'];
        $num_remesa = $_POST['num_remesa'];
        $fecha_dto = $_POST['fecha_dto'];
        $fecha_factura = $_POST['fecha_factura'];
        $fecha_remesa = $_POST['fecha_remesa'];
        $dias = $_POST['dias'];
        $num_factura = $_POST['num_factura'];
        $total = $_POST['total'];
        $dirigido = $_POST['dirigido'];
        $cif = $_POST['cif'];
        $cobrado = $_POST['cobrado'];
        $vto = $_POST['vto'];
        $otros = $_POST['otros'];
        $timbres = $_POST['timbres'];
        $interes = $_POST['interes'];
        $comision = $_POST['comision'];
        $base = $_POST['base'];
        $desglose = $_POST['desglose'];
        $gastos = $_POST['gastos'];
        $iva = $_POST['iva'];
        $fecha_pago = $_POST['fecha_pago'];
        $observaciones = $_POST['observaciones'];
        $autonomo = $_POST['autonomo'];
        $ssociales = $_POST['ssociales'];
        $sueldos = $_POST['sueldos'];
        $sql="INSERT INTO `Facturas_Combustible` (`orden`, `fecha_albaran`, `albaran`, `cliente`, `company`, `type`, `num_order`, `factura`, `num_remesa`, `fecha_dto`, `fecha_factura`, `fecha_remesa`, `dias`, `num_factura`, `total`, `dirigido`, `cif`, `cobrado`, `vto`, `otros`, `timbres`, `interes`, `comision`, `base`, `desglose`, `gastos`, `iva`, `fecha_pago`, `observaciones`, `autonomo`, `ssociales`, `sueldos`) VALUES ({$orden}, '{$fecha_albaran}', {$albaran}, {$cliente}, {$company}, {$type}, '{$num_order}', '{$factura}', '{$num_remesa}', '{$fecha_dto}', '{$fecha_factura}', '{$fecha_remesa}', {$dias}, '{$num_factura}', {$total}, '{$dirigido}', '{$cif}', {$cobrado}, '{$vto}', '{$otros}', '{$timbres}', '{$interes}', '{$comision}', {$base}, '{$desglose}', '{$gastos}', {$iva}, '{$fecha_pago}', '{$observaciones}', {$autonomo}, {$ssociales}, {$sueldos});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateFacturaCombustible':
        $id = $_POST['id'];
        $orden = $_POST['orden'];
        $fecha_albaran = $_POST['fecha_albaran'];
        $albaran = $_POST['albaran'];
        $cliente = $_POST['cliente'];
        $company = $_POST['company'];
        $type = $_POST['type'];
        $num_order = $_POST['num_order'];
        $factura = $_POST['factura'];
        $num_remesa = $_POST['num_remesa'];
        $fecha_dto = $_POST['fecha_dto'];
        $fecha_factura = $_POST['fecha_factura'];
        $fecha_remesa = $_POST['fecha_remesa'];
        $dias = $_POST['dias'];
        $num_factura = $_POST['num_factura'];
        $total = $_POST['total'];
        $dirigido = $_POST['dirigido'];
        $cif = $_POST['cif'];
        $cobrado = $_POST['cobrado'];
        $vto = $_POST['vto'];
        $otros = $_POST['otros'];
        $timbres = $_POST['timbres'];
        $interes = $_POST['interes'];
        $comision = $_POST['comision'];
        $base = $_POST['base'];
        $desglose = $_POST['desglose'];
        $gastos = $_POST['gastos'];
        $iva = $_POST['iva'];
        $fecha_pago = $_POST['fecha_pago'];
        $observaciones = $_POST['observaciones'];
        $autonomo = $_POST['autonomo'];
        $ssociales = $_POST['ssociales'];
        $sueldos = $_POST['sueldos'];
        $sql="UPDATE `Facturas_Combustible` SET `orden` = {$orden}, `fecha_albaran` = '{$fecha_albaran}', `albaran` = {$albaran}, `cliente` = {$cliente}, `company` = {$company}, `type` = {$type}, `num_order` = '{$num_order}', `factura` = '{$factura}', `num_remesa` = '{$num_remesa}', `fecha_dto` = '{$fecha_dto}', `fecha_factura` = '{$fecha_factura}', `fecha_remesa` = '{$fecha_remesa}', `dias` = {$dias}, `num_factura` = '{$num_factura}', `total` = {$total}, `dirigido` = '{$dirigido}', `cif` = '{$cif}', `cobrado` = {$cobrado}, `vto` = '{$vto}', `otros` = '{$otros}', `timbres` = '{$timbres}', `interes` = '{$interes}', `comision` = '{$comision}', `base` = {$base}, `desglose` = '{$desglose}', `gastos` = '{$gastos}', `iva` = {$iva}, `fecha_pago` = '{$fecha_pago}', `observaciones` = '{$observaciones}', `autonomo` = {$autonomo}, `ssociales` = {$ssociales}, `sueldos` = {$sueldos}' WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteFacturaCombustible':
        $id = $_POST['id'];
        $sql="DELETE FROM `Facturas_Combustible` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getFacturaCombustible':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Facturas_Combustible` WHERE `id` = {$id};";
        $result = $bd->execute_single_query($sql);
        if($result){
            $row = $result->fetch_assoc();
            echo json_encode(array('status' => 'success', 'data' => $row));
        }else{
            
        }
        break;
    case 'getFacturasCombustible':
        $sql="SELECT * FROM `Facturas_Combustible`;";
        $bd->get_results_from_query($sql);
        $result = $bd->get_rows();
        echo json_encode($result);
        break;
    default:
        
        break;
}
        
/** Produccion Mes */
switch($option){
    case 'addProduccionMes':
        $id_cliente = $_POST['id_cliente'];
        $company = $_POST['company'];
        $mes_vto = $_POST['mes_vto'];
        $fecha_emision = $_POST['fecha_emision'];
        $cliente = $_POST['cliente'];
        $refer_cliente = $_POST['refer_cliente'];
        $cif = $_POST['cif'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $servicios = $_POST['servicios'];
        $company1 = $_POST['company1'];
        $agente = $_POST['agente'];
        $company2 = $_POST['company2'];
        $poliza = $_POST['poliza'];
        $identifier = $_POST['identifier'];
        $descripcion = $_POST['descripcion'];
        $contratado = $_POST['contratado'];
        $pneta = $_POST['pneta'];
        $hsp = $_POST['hsp'];
        $total = $_POST['total'];
        $status = $_POST['status'];
        $cobro = $_POST['cobro'];
        $importe = $_POST['importe'];
        $fecha = $_POST['fecha'];
        $contidad_pte = $_POST['contidad_pte'];
        $sql="INSERT INTO `Produccion_Mes` (`id_cliente`, `company`, `mes_vto`, `fecha_emision`, `cliente`, `refer_cliente`, `cif`, `direccion`, `telefono`, `servicios`, `company1`, `agente`, `company2`, `poliza`, `identifier`, `descripcion`, `contratado`, `pneta`, `hsp`, `total`, `status`, `cobro`, `importe`, `fecha`, `contidad_pte`) VALUES ({$id_cliente}, {$company}, {$mes_vto}, '{$fecha_emision}', {$cliente}, '{$refer_cliente}', '{$cif}', '{$direccion}', '{$telefono}', '{$servicios}', '{$company1}', {$agente}, {$company2}, '{$poliza}', '{$identifier}', '{$descripcion}', '{$contratado}', {$pneta}, {$hsp}, {$total}, {$status}, {$cobro}, {$importe}, '{$fecha}', {$contidad_pte});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateProduccionMes':
        $id = $_POST['id'];
        $id_cliente = $_POST['id_cliente'];
        $company = $_POST['company'];
        $mes_vto = $_POST['mes_vto'];
        $fecha_emision = $_POST['fecha_emision'];
        $cliente = $_POST['cliente'];
        $refer_cliente = $_POST['refer_cliente'];
        $cif = $_POST['cif'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $servicios = $_POST['servicios'];
        $company1 = $_POST['company1'];
        $agente = $_POST['agente'];
        $company2 = $_POST['company2'];
        $poliza = $_POST['poliza'];
        $identifier = $_POST['identifier'];
        $descripcion = $_POST['descripcion'];
        $contratado = $_POST['contratado'];
        $pneta = $_POST['pneta'];
        $hsp = $_POST['hsp'];
        $total = $_POST['total'];
        $status = $_POST['status'];
        $cobro = $_POST['cobro'];
        $importe = $_POST['importe'];
        $fecha = $_POST['fecha'];
        $contidad_pte = $_POST['contidad_pte'];
        $sql="UPDATE `Produccion_Mes` SET `id_cliente` = {$id_cliente}, `company` = {$company}, `mes_vto` = {$mes_vto}, `fecha_emision` = '{$fecha_emision}', `cliente` = {$cliente}, `refer_cliente` = '{$refer_cliente}', `cif` = '{$cif}', `direccion` = '{$direccion}', `telefono` = '{$telefono}', `servicios` = '{$servicios}', `company1` = '{$company1}', `agente` = {$agente}, `company2` = {$company2}, `poliza` = '{$poliza}', `identifier` = '{$identifier}', `descripcion` = '{$descripcion}', `contratado` = '{$contratado}', `pneta` = {$pneta}, `hsp` = {$hsp}, `total` = {$total}, `status` = {$status}, `cobro` = {$cobro}, `importe` = {$importe}, `fecha` = '{$fecha}', `contidad_pte` = {$contidad_pte} WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteProduccionMes':
        $id = $_POST['id'];
        $sql="DELETE FROM `Produccion_Mes` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getProduccionMes':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Produccion_Mes` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getProduccionMesAll':
        $sql="SELECT * FROM `Produccion_Mes`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Transaccion Contrato */
switch ($option) {
    case 'insertTransaccionContrato':
        $concepto = $_POST['concepto'];
        $importe = $_POST['importe'];
        $fecha = $_POST['fecha'];
        $company = $_POST['company'];
        $id_contrato = $_POST['id_contrato'];
        $sql="INSERT INTO `Transaccion_Contrato` (`concepto`, `importe`, `fecha`, `company`, `id_contrato`) VALUES ('{$concepto}', {$importe}, '{$fecha}', {$company}, {$id_contrato});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateTransaccionContrato':
        $id = $_POST['id'];
        $concepto = $_POST['concepto'];
        $importe = $_POST['importe'];
        $fecha = $_POST['fecha'];
        $company = $_POST['company'];
        $id_contrato = $_POST['id_contrato'];
        $sql="UPDATE `Transaccion_Contrato` SET `concepto` = '{$concepto}', `importe` = {$importe}, `fecha` = '{$fecha}', `company` = {$company}, `id_contrato` = {$id_contrato} WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteTransaccionContrato':
        $id = $_POST['id'];
        $sql="DELETE FROM `Transaccion_Contrato` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getTransaccionContrato':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Transaccion_Contrato` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getTransaccionContratoAll':
        $sql="SELECT * FROM `Transaccion_Contrato`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Transacciones */
switch ($option) {
    case 'insertTransacciones':
        $id_factura = $_POST['id_factura'];
        $forma_pago = $_POST['forma_pago'];
        $fecha_pago = $_POST['fecha_pago'];
        $importe = $_POST['importe'];
        $type = $_POST['type'];
        $forma_cobro = $_POST['forma_cobro'];
        $fecha_cobro = $_POST['fecha_cobro'];
        $forma_pc = $_POST['forma_pc'];
        $sql="INSERT INTO `Transacciones` (`id_factura`, `forma_pago`, `fecha_pago`, `importe`, `type`, `forma_cobro`, `fecha_cobro`, `forma_pc`) VALUES ({$id_factura}, '{$forma_pago}', '{$fecha_pago}', {$importe}, {$type}, '{$forma_cobro}', '{$fecha_cobro}', '{$forma_pc}');";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateTransacciones':
        $id = $_POST['id'];
        $id_factura = $_POST['id_factura'];
        $forma_pago = $_POST['forma_pago'];
        $fecha_pago = $_POST['fecha_pago'];
        $importe = $_POST['importe'];
        $type = $_POST['type'];
        $forma_cobro = $_POST['forma_cobro'];
        $fecha_cobro = $_POST['fecha_cobro'];
        $forma_pc = $_POST['forma_pc'];
        $sql="UPDATE `Transacciones` SET `id_factura` = {$id_factura}, `forma_pago` = '{$forma_pago}', `fecha_pago` = '{$fecha_pago}', `importe` = {$importe}, `type` = {$type}, `forma_cobro` = '{$forma_cobro}', `fecha_cobro` = '{$fecha_cobro}', `forma_pc` = '{$forma_pc}' WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteTransacciones':
        $id = $_POST['id'];
        $sql="DELETE FROM `Transacciones` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getTransacciones':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Transacciones` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getTransaccionesAll':
        $sql="SELECT * FROM `Transacciones`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        
        
        break;
}

/** Admin */
switch ($option) {
    case 'insertAdmin':
        $user = $_POST['data']['user'];
        $pass = $_POST['data']['pass'];
        $sql="INSERT INTO `Admin` (`user`, `pass`) VALUES ('{$user}', '{$pass}');";
        $bd->execute_single_query($sql);
        echo json_encode(array('status' => 'success'));
        break;
    case 'updateAdmin':
        $id = $_POST['data']['id'];
        $user = $_POST['data']['user'];
        $pass = $_POST['data']['pass'];
        $sql="UPDATE `Admin` SET `user` = '{$user}', `pass` = '{$pass}' WHERE `id` = {$id};";
        $bd->execute_single_query($sql);
        echo json_encode(array('status' => 'success'));
        break;
    case 'deleteAdmin':
        $id = $_POST['id'];
        $sql="DELETE FROM `Admin` WHERE `id` = {$id};";
        echo json_encode(array('status' => 'success'));
        break;
    case 'getAdmin':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Admin` WHERE `id` = {$id};";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    case 'getAdminAll':
        $sql="SELECT * FROM `Admin`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Clientes */
switch ($option) {
    case 'insertCliente':
        $company = $_POST['data']['company'];
        $sql="INSERT INTO `Cliente` (`company`) VALUES ({$company});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateCliente':
        $id = $_POST['id'];
        $company = $_POST['data']['company'];
        $sql="UPDATE `Cliente` SET `company` = {$company} WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteCliente':
        $id = $_POST['id'];
        $sql="DELETE FROM `Cliente` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getCliente':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Cliente` WHERE `id` = {$id};";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    case 'getClienteAll':
        $sql="SELECT * FROM `Cliente`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Formas de Pago */
switch ($option) {
    case 'insertFormas_pago':
        $nombre = $_POST['nombre'];
        $sql="INSERT INTO `Formas_pago` (`nombre`) VALUES ('{$nombre}');";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateFormas_pago':
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $sql="UPDATE `Formas_pago` SET `nombre` = '{$nombre}' WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteFormas_pago':
        $id = $_POST['id'];
        $sql="DELETE FROM `Formas_pago` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getFormas_pago':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Formas_pago` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getFormas_pagoAll':
        $sql="SELECT * FROM `Formas_pago`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Tipos Entidades */
switch ($option) {
    case 'insertTipos_Entidades':
        $name = $_POST['name'];
        $sql="INSERT INTO `Tipos_Entidades` (`name`) VALUES ('{$name}');";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateTipos_Entidades':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sql="UPDATE `Tipos_Entidades` SET `name` = '{$name}' WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteTipos_Entidades':
        $id = $_POST['id'];
        $sql="DELETE FROM `Tipos_Entidades` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }
        break;
    case 'getTipos_Entidades':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Tipos_Entidades` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getTipos_EntidadesAll':
        $sql="SELECT * FROM `Tipos_Entidades`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
    break;
}

/** Tipos Factura */
switch ($option) {
    case 'insertTipos_Factura':
        $name = $_POST['name'];
        $sql="INSERT INTO `Tipos_Factura` (`name`) VALUES ('{$name}');";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateTipos_Factura':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sql="UPDATE `Tipos_Factura` SET `name` = '{$name}' WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteTipos_Factura':
        $id = $_POST['id'];
        $sql="DELETE FROM `Tipos_Factura` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getTipos_Factura':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Tipos_Factura` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getTipos_FacturaAll':
        $sql="SELECT * FROM `Tipos_Factura`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Tipos Factura Combustible */
switch ($option) {
    case 'insertTipos_Factura_Combustible':
        $name = $_POST['name'];
        $sql="INSERT INTO `Tipos_Factura_Combustible` (`name`) VALUES ('{$name}');";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateTipos_Factura_Combustible':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sql="UPDATE `Tipos_Factura_Combustible` SET `name` = '{$name}' WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteTipos_Factura_Combustible':
        $id = $_POST['id'];
        $sql="DELETE FROM `Tipos_Factura_Combustible` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getTipos_Factura_Combustible':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Tipos_Factura_Combustible` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getTipos_Factura_CombustibleAll':
        $sql="SELECT * FROM `Tipos_Factura_Combustible`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Liquidaciones ECT */
switch ($option) {
    case 'insertLiquidaciones_ECT':
        $id_cliente = $_POST['id_cliente'];
        $company = $_POST['company'];
        $sql="INSERT INTO `Liquidaciones_ECT` (`id_cliente`, `company`) VALUES ({$id_cliente}, {$company});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updateLiquidaciones_ECT':
        $id = $_POST['id'];
        $id_cliente = $_POST['id_cliente'];
        $company = $_POST['company'];
        $sql="UPDATE `Liquidaciones_ECT` SET `id_cliente` = {$id_cliente}, `company` = {$company} WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deleteLiquidaciones_ECT':
        $id = $_POST['id'];
        $sql="DELETE FROM `Liquidaciones_ECT` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getLiquidaciones_ECT':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Liquidaciones_ECT` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getLiquidaciones_ECTAll':
        $sql="SELECT * FROM `Liquidaciones_ECT`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Precio Litros */
switch ($option) {
    case 'insertPrecio_Litros':
        $id_factura = $_POST['id_factura'];
        $company = $_POST['company'];
        $litros = $_POST['litros'];
        $type = $_POST['type'];
        $precio = $_POST['precio'];
        $base = $_POST['base'];
        $sql="INSERT INTO `Precio_Litros` (`id_factura`, `company`, `litros`, `type`, `precio`, `base`) VALUES ({$id_factura}, {$company}, {$litros}, {$type}, {$precio}, {$base});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updatePrecio_Litros':
        $id = $_POST['id'];
        $id_factura = $_POST['id_factura'];
        $company = $_POST['company'];
        $litros = $_POST['litros'];
        $type = $_POST['type'];
        $precio = $_POST['precio'];
        $base = $_POST['base'];
        $sql="UPDATE `Precio_Litros` SET `id_factura` = {$id_factura}, `company` = {$company}, `litros` = {$litros}, `type` = {$type}, `precio` = {$precio}, `base` = {$base} WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deletePrecio_Litros':
        $id = $_POST['id'];
        $sql="DELETE FROM `Precio_Litros` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getPrecio_Litros':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Precio_Litros` WHERE `id` = {$id};";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    case 'getPrecio_LitrosAll':
        $sql="SELECT * FROM `Precio_Litros`;";
        $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}

/** Presupuesto */
switch ($option) {
    case 'insertPresupuesto':
        $id_cliente = $_POST['id_cliente'];
        $company = $_POST['company'];
        $sql="INSERT INTO `Presupuesto` (`id_cliente`, `company`) VALUES ({$id_cliente}, {$company});";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'updatePresupuesto':
        $id = $_POST['id'];
        $id_cliente = $_POST['id_cliente'];
        $company = $_POST['company'];
        $sql="UPDATE `Presupuesto` SET `id_cliente` = {$id_cliente}, `company` = {$company} WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'deletePresupuesto':
        $id = $_POST['id'];
        $sql="DELETE FROM `Presupuesto` WHERE `id` = {$id};";
        if($bd->execute_single_query($sql)){
            echo json_encode(array('status' => 'success'));
        }else{
            
        }
        break;
    case 'getPresupuesto':
        $id = $_POST['id'];
        $sql="SELECT * FROM `Presupuesto` WHERE `id` = {$id};";
        $data = $bd->execute_single_query($sql);
        echo json_encode($data);
        break;
    case 'getPresupuestoAll':
        $sql="SELECT * FROM `Presupuesto`;";
        $data = $bd->get_results_from_query($sql);
        $data = $bd->get_rows();
        echo json_encode($data);
        break;
    default:
        
        break;
}