<?php
require __DIR__.'/../../function.php';
//INSERT INTO `Precio_Litros` (`id`, `id_factura`, `company`, `litros`, `type`, `precio`, `base`) VALUES (1, 1, 1, 10, 1, 1000, 1000);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Precio Litros </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>id_factura</th>
                            <th>company</th>
                            <th>litros</th>
                            <th>type</th>
                            <th>precio</th>
                            <th>base</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getadmin
                            $precio_litros = get_precio_litros();
                            //Recibimos un JSON con los datos de las admin
                            $precio_litros = json_decode(remove_utf8_bom($precio_litros));
                            foreach ($precio_litros as $precio_litro) {?>
                                <tr>
                                <td><?=$precio_litro->id?></td>
                                <td><?=$precio_litro->id_factura?></td>
                                <td><?=$precio_litro->company?></td>
                                <td><?=$precio_litro->litros?></td>
                                <td><?=$precio_litro->type?></td>
                                <td><?=$precio_litro->precio?></td>
                                <td><?=$precio_litro->base?></td>
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
  <a href="?place=Precio_Litros&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>