<?php
require __DIR__.'/../../function.php';
//INSERT INTO `Transacciones` (`id`, `id_factura`, `forma_pago`, `fecha_pago`, `importe`, `type`, `forma_cobro`, `fecha_cobro`, `forma_pc`) VALUES (1, 1, '1', '2022-11-17', 1000, 1, '1', '2022-11-17', '1');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Transacciones </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>id_factura</th>
                            <th>forma_pago</th>
                            <th>fecha_pago</th>
                            <th>importe</th>
                            <th>type</th>
                            <th>forma_cobro</th>
                            <th>fecha_cobro</th>
                            <th>forma_pc</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            $transacciones = get_transacciones();
                            $transacciones = json_decode(remove_utf8_bom($transacciones));
                            foreach ($transacciones as $transaccioness) {?>
                                <tr>
                                <td><?=$transaccioness->id?></td>
                                <td><?=$transaccioness->id_factura?></td>
                                <td><?=$transaccioness->forma_pago?></td>
                                <td><?=$transaccioness->fecha_pago?></td>
                                <td><?=$transaccioness->importe?></td>
                                <td><?=$transaccioness->type?></td>
                                <td><?=$transaccioness->forma_cobro?></td>
                                <td><?=$transaccioness->fecha_cobro?></td>
                                <td><?=$transaccioness->forma_pc?></td>
                                <td>
                                    <a href="edit.php?id=<?=$transaccioness->id?>" class="btn btn-primary">Editar</a>
                                    <a href="delete.php?id=<?=$transaccioness->id?>" class="btn btn-danger">Eliminar</a>
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
  <a href="?place=Transacciones&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>