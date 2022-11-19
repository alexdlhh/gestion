<?php
require __DIR__.'/../../function.php';
//INSERT INTO `Tipos_Factura_Combustible` (`id`, `name`) VALUES (1, 'test');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Tipos Factura Combustible </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>name</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            $tipos_factura_combustible = get_tipos_factura_combustible();
                            $tipos_factura_combustible = json_decode(remove_utf8_bom($tipos_factura_combustible));
                            foreach ($tipos_factura_combustible as $tipos_factura_combustibles) {?>
                                <tr>
                                <td><?=$tipos_factura_combustibles->id?></td>
                                <td><?=$tipos_factura_combustibles->name?></td>
                                <td>
                                    <a href="edit.php?id=<?=$tipos_factura_combustibles->id?>" class="btn btn-primary">Editar</a>
                                    <a href="delete.php?id=<?=$tipos_factura_combustibles->id?>" class="btn btn-danger">Eliminar</a>
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
  <a href="?place=Tipos_Factura_Combustible&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>