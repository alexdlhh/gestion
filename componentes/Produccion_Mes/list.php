<?php
require __DIR__.'/../../function.php';
//escribimos una tabla cuya cabecera serán los campos del siguiente insert INSERT INTO `Produccion_Mes` (`id`, `id_cliente`, `company`, `mes_vto`, `fecha_emision`, `cliente`, `refer_cliente`, `cif`, `direccion`, `telefono`, `servicios`, `company1`, `agente`, `company2`, `poliza`, `identifier`, `descripcion`, `contratado`, `pneta`, `hsp`, `total`, `status`, `cobro`, `importe`, `fecha`, `contidad_pte`) VALUES (1, 1, 1, 1, '2022-11-17', 1, '1', '65789', 'tcfvgbhkl', '56789', 'tyvgbhk', 'tfghj', 1, 'jhbkjn', '567689', '546576', 'hfjvgkbl', '1', 1, '1', 1000, 1, 1, 10, '2022-11-17', 1);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Produccion Mes </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>id_cliente</th>
                            <th>company</th>
                            <th>mes_vto</th>
                            <th>fecha_emision</th>
                            <th>cliente</th>
                            <th>refer_cliente</th>
                            <th>cif</th>
                            <th>direccion</th>
                            <th>telefono</th>
                            <th>servicios</th>
                            <th>company1</th>
                            <th>agente</th>
                            <th>company2</th>
                            <th>poliza</th>
                            <th>identifier</th>
                            <th>descripcion</th>
                            <th>contratado</th>
                            <th>pneta</th>
                            <th>hsp</th>
                            <th>total</th>
                            <th>status</th>
                            <th>cobro</th>
                            <th>importe</th>
                            <th>fecha</th>
                            <th>contidad_pte</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getadmin
                            $produccion_meses = get_produccion_meses();
                            //Recibimos un JSON con los datos de las admin
                            $produccion_meses = json_decode(remove_utf8_bom($produccion_meses));
                            foreach ($produccion_meses as $produccion_mes) {?>
                                <tr>
                                <td><?=$produccion_mes->id?></td>
                                <td><?=$produccion_mes->id_cliente?></td>
                                <td><?=$produccion_mes->company?></td>
                                <td><?=$produccion_mes->mes_vto?></td>
                                <td><?=$produccion_mes->fecha_emision?></td>
                                <td><?=$produccion_mes->cliente?></td>
                                <td><?=$produccion_mes->refer_cliente?></td>
                                <td><?=$produccion_mes->cif?></td>
                                <td><?=$produccion_mes->direccion?></td>
                                <td><?=$produccion_mes->telefono?></td>
                                <td><?=$produccion_mes->servicios?></td>
                                <td><?=$produccion_mes->company1?></td>
                                <td><?=$produccion_mes->agente?></td>
                                <td><?=$produccion_mes->company2?></td>
                                <td><?=$produccion_mes->poliza?></td>
                                <td><?=$produccion_mes->identifier?></td>
                                <td><?=$produccion_mes->descripcion?></td>
                                <td><?=$produccion_mes->contratado?></td>
                                <td><?=$produccion_mes->pneta?></td>
                                <td><?=$produccion_mes->hsp?></td>
                                <td><?=$produccion_mes->total?></td>
                                <td><?=$produccion_mes->status?></td>
                                <td><?=$produccion_mes->cobro?></td>
                                <td><?=$produccion_mes->importe?></td>
                                <td><?=$produccion_mes->fecha?></td>
                                <td><?=$produccion_mes->contidad_pte?></td>
                                <td>
                                    <a href="edit.php?id=<?=$produccion_mes->id?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="delete.php?id=<?=$produccion_mes->id?>" class="btn btn-danger btn-sm">Eliminar</a>
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
  <a href="?place=Produccion_Mes&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>