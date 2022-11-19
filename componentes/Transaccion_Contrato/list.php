<?php
require __DIR__.'/../../function.php';
//INSERT INTO `Transaccion_Contrato` (`id`, `concepto`, `importe`, `fecha`, `company`, `id_contrato`) VALUES (1, 'fhgjh', 1000, '2022-11-17', 1, 1);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Transaccion Contrato </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>concepto</th>
                            <th>importe</th>
                            <th>fecha</th>
                            <th>company</th>
                            <th>id_contrato</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            $transaccion_contratos = get_transaccion_contratos();
                            $transaccion_contratos = json_decode(remove_utf8_bom($transaccion_contratos));
                            foreach ($transaccion_contratos as $transaccion_contratoss) {?>
                                <tr>
                                <td><?=$transaccion_contratoss->id?></td>
                                <td><?=$transaccion_contratoss->concepto?></td>
                                <td><?=$transaccion_contratoss->importe?></td>
                                <td><?=$transaccion_contratoss->fecha?></td>
                                <td><?=$transaccion_contratoss->company?></td>
                                <td><?=$transaccion_contratoss->id_contrato?></td>
                                <td>
                                    <a href="edit.php?id=<?=$transaccion_contratoss->id?>" class="btn btn-primary">Editar</a>
                                    <a href="delete.php?id=<?=$transaccion_contratoss->id?>" class="btn btn-danger">Eliminar</a>
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
  <a href="?place=Transaccion_Contrato&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>