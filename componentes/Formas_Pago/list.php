<?php
require __DIR__.'/../../function.php';
//INSERT INTO `Formas_pago` (`id`, `nombre`) VALUES (1, 'Transferencia');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Formas de Pago </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getadmin
                            $formas_pago = get_formas_pago();
                            //Recibimos un JSON con los datos de las admin
                            $formas_pago = json_decode(remove_utf8_bom($formas_pago));
                            foreach ($formas_pago as $forma_pago) {?>
                                <tr>
                                <td><?=$forma_pago->id?></td>
                                <td><?=$forma_pago->nombre?></td>
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
  <a href="?place=Formas_Pago&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>