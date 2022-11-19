<?php
require __DIR__.'/../../function.php';
//INSERT INTO `Liquidaciones_ECT` (`id`, `id_cliente`, `company`) VALUES (1, 1, 1);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Liquidaciones ECT </h4>
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
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getadmin
                            $liquidaciones_ect = get_liquidaciones_ect();
                            //Recibimos un JSON con los datos de las admin
                            $liquidaciones_ect = json_decode(remove_utf8_bom($liquidaciones_ect));
                            foreach ($liquidaciones_ect as $liquidacion_ect) {?>
                                <tr>
                                <td><?=$liquidacion_ect->id?></td>
                                <td><?=$liquidacion_ect->id_cliente?></td>
                                <td><?=$liquidacion_ect->company?></td>
                                <td>
                                    <a href="javascript:;" class="btn btn-success">Editar</a>
                                    <a href="javascript:;" class="btn btn-danger">Borrar</a>
                                </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed-action-btn">
  <a href="?place=Liquidaciones_ECT&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>