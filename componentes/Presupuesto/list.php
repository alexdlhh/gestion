<?php
require __DIR__.'/../../function.php';
//INSERT INTO `Presupuesto` (`id`, `id_cliente`, `company`) VALUES (1, 1, 1);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Presupuesto </h4>
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
                            $presupuestos = get_presupuestos();
                            //Recibimos un JSON con los datos de las admin
                            $presupuestos = json_decode(remove_utf8_bom($presupuestos));
                            foreach ($presupuestos as $presupuesto) {?>
                                <tr>
                                <td><?=$presupuesto->id?></td>
                                <td><?=$presupuesto->id_cliente?></td>
                                <td><?=$presupuesto->company?></td>
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
  <a href="?place=Presupuesto&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>