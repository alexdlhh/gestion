<?php
require __DIR__.'/../../function.php';
//escribimos una tabla cuya cabecera sean los capos del siguiente insert INSERT INTO `Tipos_Entidades` (`id`, `name`) VALUESz(1, 'EMPRESA');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Tipos Entidades </h4>
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
                            //Hacemos un CURL mediante POST a api.php, option = getadmin
                            $tipos_entidades = get_tipos_entidades();
                            //Recibimos un JSON con los datos de las admin
                            $tipos_entidades = json_decode(remove_utf8_bom($tipos_entidades));
                            foreach ($tipos_entidades as $tipos_entidad) {?>
                                <tr>
                                <td><?=$tipos_entidad->id?></td>
                                <td><?=$tipos_entidad->name?></td>
                                <td>
                                    <a href="edit.php?id=<?=$tipos_entidad->id?>" class="btn btn-primary">Editar</a>
                                    <a href="delete.php?id=<?=$tipos_entidad->id?>" class="btn btn-danger">Eliminar</a>
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
  <a href="?place=Tipos_Entidades&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>