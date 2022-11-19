<?php
require __DIR__.'/../../function.php';
//escribimos un table con los datos del siguiente insert INSERT INTO `Contratos` (`id`, `id_cliente`, `company`, `mes_vto`, `fecha_emision`, `cliente`, `refer_cliente`, `cif`, `direccion`, `telefono`, `servicios`, `company1`, `agente`, `company2`, `poliza`, `identifier`, `descripcion`, `contratado`, `pneta`, `hsp`, `total`, `status`, `cobro`, `importe`, `fecha`, `contidad_pte`) VALUES (1, 1, 1, 1, '2022-11-17', 1, '1', '34567', 'gfhjbhk', '54678', 'gfhvjbhklm', 'yvgjbh', 1, 'gfhgvjbhk', '6578', '65678', 'tfchvgjbh', 'yvgjbk', 1, '1', 1000, 1, 1, 1000, '2022-11-17', 1);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Contratos </h4>
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
                            //Hacemos un CURL mediante POST a api.php, option = getcontratos
                            $contratos = get_contratos();
                            //Recibimos un JSON con los datos de los contratos
                            $contratos = json_decode(remove_utf8_bom($contratos));
                            foreach ($contratos as $contrato) {?>
                                <tr>
                                <td><?=$contrato->id?></td>
                                <td><?=$contrato->id_cliente?></td>
                                <td><?=$contrato->company?></td>
                                <td><?=$contrato->mes_vto?></td>
                                <td><?=$contrato->fecha_emision?></td>
                                <td><?=$contrato->cliente?></td>
                                <td><?=$contrato->refer_cliente?></td>
                                <td><?=$contrato->cif?></td>
                                <td><?=$contrato->direccion?></td>
                                <td><?=$contrato->telefono?></td>
                                <td><?=$contrato->servicios?></td>
                                <td><?=$contrato->company1?></td>
                                <td><?=$contrato->agente?></td>
                                <td><?=$contrato->company2?></td>
                                <td><?=$contrato->poliza?></td>
                                <td><?=$contrato->identifier?></td>
                                <td><?=$contrato->descripcion?></td>
                                <td><?=$contrato->contratado?></td>
                                <td><?=$contrato->pneta?></td>
                                <td><?=$contrato->hsp?></td>
                                <td><?=$contrato->total?></td>
                                <td><?=$contrato->status?></td>
                                <td><?=$contrato->cobro?></td>
                                <td><?=$contrato->importe?></td>
                                <td><?=$contrato->fecha?></td>
                                <td><?=$contrato->contidad_pte?></td>
                                <td>
                                    <a href="index.php?view=edit&id=<?=$contrato->id?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="index.php?action=del&id=<?=$contrato->id?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
  <a href="?place=contact&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>