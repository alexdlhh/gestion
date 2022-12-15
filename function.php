<?php
function remove_utf8_bom($text){
    $bom = pack('H*','EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
}
function get_entidades(){
    $curl = curl_init();
    $entidades = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getEntities'),
    ));

    $entidades = curl_exec($curl);
    curl_close($curl);

    return $entidades;
}
function get_facturas(){
    $curl = curl_init();
    $facturas = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getFacturas'),
    ));

    $facturas = curl_exec($curl);
    curl_close($curl);

    return $facturas;
}
function get_clientes(){
    $curl = curl_init();
    $clientes = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getClienteAll'),
    ));
    
    $clientes = curl_exec($curl);
    curl_close($curl);

    return $clientes;
}
function get_empresas(){
    $curl = curl_init();
    $empresas = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getCompany'),
    ));
    
    $empresas = curl_exec($curl);
    curl_close($curl);

    return $empresas;
}
function get_admin(){
    $curl = curl_init();
    $admin = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getAdminAll'),
    ));
    
    $admin = curl_exec($curl);
    curl_close($curl);

    return $admin;
}
function get_contratos(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getContract'),
    ));

    $contratos = curl_exec($curl);
    curl_close($curl);

    return $contratos;
}
function get_company(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getCompany'),
    ));

    $company = curl_exec($curl);
    curl_close($curl);

    return $company;
}
function get_facturas_combustible(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getFacturasCombustible'),
    ));

    $facturas_combustible = curl_exec($curl);
    curl_close($curl);

    return $facturas_combustible;
}
function get_formas_pago(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getFormas_pagoAll'),
    ));

    $formas_pago = curl_exec($curl);
    curl_close($curl);

    return $formas_pago;
}
function get_liquidaciones_ect(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getLiquidaciones_ECTAll'),
    ));

    $liquidaciones_ect = curl_exec($curl);
    curl_close($curl);

    return $liquidaciones_ect;
}
function get_precio_litros(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getPrecio_LitrosAll'),
    ));

    $precio_litros = curl_exec($curl);
    curl_close($curl);

    return $precio_litros;
}
function get_presupuestos(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getPresupuestoAll'),
    ));

    $presupuestos = curl_exec($curl);
    curl_close($curl);

    return $presupuestos;
}
function get_produccion_meses(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getProduccionMesAll'),
    ));

    $produccion_meses = curl_exec($curl);
    curl_close($curl);

    return $produccion_meses;
}
function get_tipos_entidades(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getTipos_EntidadesAll'),
    ));

    $tipos_entidades = curl_exec($curl);
    curl_close($curl);

    return $tipos_entidades;
}
function get_tipos_factura(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getTipos_FacturaAll'),
    ));

    $tipos_factura = curl_exec($curl);
    curl_close($curl);

    return $tipos_factura;
}
function get_tipos_factura_combustible(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getTipos_Factura_CombustibleAll'),
    ));

    $tipos_factura_combustible = curl_exec($curl);
    curl_close($curl);

    return $tipos_factura_combustible;
}
function get_transacciones(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getTransaccionesAll'),
    ));

    $transacciones = curl_exec($curl);
    curl_close($curl);

    return $transacciones;
}
function get_transaccion_contratos(){
    $curl = curl_init();
    $contratos = [];
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.agenciapentabrand.com/gestion/api.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('option' => 'getTransaccionContratoAll'),
    ));

    $transaccion_contratos = curl_exec($curl);
    curl_close($curl);

    return $transaccion_contratos;
}
