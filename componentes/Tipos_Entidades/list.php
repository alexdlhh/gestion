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
                    <div class="row rowfix">
                        <div class="col s12">
                            <div class="form-group">
                                <label>Búsqueda</label>
                                <input type="search" class="form-control" id="search" name="valor">
                            </div>
                        </div>
                    </div>
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
                                <tr class="te">
                                <td><?=$tipos_entidad->id?></td>
                                <td><?=$tipos_entidad->Nombre?></td>
                                <td>
                                    <a href="#editTipoEntidades" 
                                    data-name="<?=$tipos_entidad->Nombre?>" 
                                    data-id="<?=$tipos_entidad->id?>" 
                                    class="btn modal-trigger btn-primary editTipoEntidades"><i class="material-icons">create</i></a>
                                    <a href="javascript:;" data-id="<?=$tipos_entidad->id?>" class="btn btn-danger red deleteTipoEntidades"><i class="material-icons">delete</i></a>
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
  <a href="#addTipoEntidades" class="btn-floating btn-large red modal-trigger">
    <i class="large material-icons">add</i>
  </a>
</div>
<div id="addTipoEntidades" class="modal">
    <div class="modal-content">
        <h4>Añadir Tipo Entidades</h4>
        <div class="row">
            <div class="col s12 form-input">
                <label for="name">Nombre</label>
                <input type="text" name="add_name" id="add_name">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat insertTipoEntidades">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="editTipoEntidades" class="modal">
    <div class="modal-content">
        <h4>Editar Tipo Entidades</h4>
        <div class="row">
            <div class="col s12 form-input">
                <label for="name">Nombre</label>
                <input type="text" name="edit_name" id="edit_name">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat updateTipoEntidades" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.modal').modal();
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".te").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('.insertTipoEntidades').click(function(){
            var name = $('#add_name').val();
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {
                    option: 'insertTipos_Entidades',
                    name: name
                },
                success: function(data){
                    location.reload();                        
                }
            });
        });
        $('.editTipoEntidades').click(function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#edit_name').val(name);
            $('.updateTipoEntidades').attr('data-id', id);
        });
        $('.updateTipoEntidades').click(function(){
            var id = $(this).data('id');
            var name = $('#edit_name').val();
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {
                    option: 'updateTipos_Entidades',
                    id: id,
                    name: name
                },
                success: function(data){
                    location.reload();                        
                }
            });
        });
        $('.deleteTipoEntidades').click(function(){
            var id = $(this).attr('data-id');
            if(confirm('¿Estás seguro de que quieres eliminar este tipo de entidad?')){
                $.ajax({
                    url: 'https://www.agenciapentabrand.com/gestion/api.php',
                    type: 'POST',
                    data: {
                        option: 'deleteTipos_Entidades',
                        id: id
                    },
                    success: function(data){
                        location.reload();                        
                    }
                });
            }
        });
    })
</script>