<?php
require __DIR__.'/../../function.php';
/**
 * INSERT INTO `Facturas_Combustible` (`id`, `orden`, `fecha_albaran`, `albaran`, `cliente`, `company`, `type`, `num_order`, `factura`, `num_remesa`, `fecha_dto`, `fecha_factura`, `fecha_remesa`, `dias`, `num_factura`, `total`, `dirigido`, `cif`, `cobrado`, `vto`, `otros`, `timbres`, `interes`, `comision`, `base`, `desglose`, `gastos`, `iva`, `fecha_pago`, `observaciones`, `autonomo`, `ssociales`, `sueldos`) VALUES (1, 1, '2022-11-17', 1, 1, '1', 1, '1', '1', '1', '2022-11-17', '2022-11-17', '2022-11-17', 11, '1', 1210, '1', '5467898', 1, '1', 'K', '?', '1', '1', 1000, '{\"test\":1}', '1', 1, '2022-11-17', 'yugh', '1', '1', 1);
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Facturas de Combustible </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>Orden</th>
                            <th>Fecha Albaran</th>
                            <th>Albaran</th>
                            <th>Cliente</th>
                            <th>Company</th>
                            <th>Type</th>
                            <th>Num Order</th>
                            <th>Factura</th>
                            <th>Num Remesa</th>
                            <th>Fecha Dto</th>
                            <th>Fecha Factura</th>
                            <th>Fecha Remesa</th>
                            <th>Dias</th>
                            <th>Num Factura</th>
                            <th>Total</th>
                            <th>Dirigido</th>
                            <th>Cif</th>
                            <th>Cobrado</th>
                            <th>Vto</th>
                            <th>Otros</th>
                            <th>Timbres</th>
                            <th>Interes</th>
                            <th>Comision</th>
                            <th>Base</th>
                            <th>Desglose</th>
                            <th>Gastos</th>
                            <th>Iva</th>
                            <th>Fecha Pago</th>
                            <th>Observaciones</th>
                            <th>Autonomo</th>
                            <th>Ssociales</th>
                            <th>Sueldos</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getadmin
                            $facturas = get_facturas_combustible();
                            //Recibimos un JSON con los datos de las admin
                            $facturas = json_decode(remove_utf8_bom($facturas));
                            foreach ($facturas as $factura) {?>
                                <tr>
                                <td><?=$factura->id?></td>
                                <td><?=$factura->orden?></td>
                                <td><?=$factura->fecha_albaran?></td>
                                <td><?=$factura->albaran?></td>
                                <td><?=$factura->cliente?></td>
                                <td><?=$factura->company?></td>
                                <td><?=$factura->type?></td>
                                <td><?=$factura->num_order?></td>
                                <td><?=$factura->factura?></td>
                                <td><?=$factura->num_remesa?></td>
                                <td><?=$factura->fecha_dto?></td>
                                <td><?=$factura->fecha_factura?></td>
                                <td><?=$factura->fecha_remesa?></td>
                                <td><?=$factura->dias?></td>
                                <td><?=$factura->num_factura?></td>
                                <td><?=$factura->total?></td>
                                <td><?=$factura->dirigido?></td>
                                <td><?=$factura->cif?></td>
                                <td><?=$factura->cobrado?></td>
                                <td><?=$factura->vto?></td>
                                <td><?=$factura->otros?></td>
                                <td><?=$factura->timbres?></td>
                                <td><?=$factura->interes?></td>
                                <td><?=$factura->comision?></td>
                                <td><?=$factura->base?></td>
                                <td><?=$factura->desglose?></td>
                                <td><?=$factura->gastos?></td>
                                <td><?=$factura->iva?></td>
                                <td><?=$factura->fecha_pago?></td>
                                <td><?=$factura->observaciones?></td>
                                <td><?=$factura->autonomo?></td>
                                <td><?=$factura->ssociales?></td>
                                <td><?=$factura->sueldos?></td>
                                <td>
                                    <a href="facturas_combustible.php?edit=<?=$factura->id?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="facturas_combustible.php?delete=<?=$factura->id?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed-action-btn">
  <a href="?place=Factura_Combustible&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>