<?php
require __DIR__.'/../../function.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Empresas </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Tipo</th> 
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getcompany
                            $company = get_company();
                            //Recibimos un JSON con los datos de las company
                            $company = json_decode(remove_utf8_bom($company));
                            foreach ($company as $compa) {?>
                                <tr>
                                <td><?=$compa->id?></td>
                                <td><?=$compa->name?></td>
                                <td><?=$compa->type?></td>
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
  <a href="?place=Company&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>