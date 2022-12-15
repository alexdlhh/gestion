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
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            $tipos_factura_combustible = get_tipos_factura_combustible();
                            $tipos_factura_combustible = json_decode(remove_utf8_bom($tipos_factura_combustible));
                            foreach ($tipos_factura_combustible as $tipos_factura_combustibles) {?>
                                <tr class="tfc">
                                <td><?=$tipos_factura_combustibles->id?></td>
                                <td><?=$tipos_factura_combustibles->name?></td>
                                <td>
                                    <a href="#editTiposFacturaCombustibles" 
                                    data-id="<?=$tipos_factura_combustibles->id?>" 
                                    data-name="<?=$tipos_factura_combustibles->name?>" 
                                    class="btn btn-primary modal-trigger editTiposFacturaCombustibles"><i class="material-icons">create</i></a>
                                    <a href="javascript:;" data-id="<?=$tipos_factura_combustibles->id?>" class="btn btn-danger modal-trigger red deleteTiposFacturaCombustibles"><i class="material-icons">delete</i></a>
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
  <a href="#createTiposFacturaCombustibles" class="btn-floating btn-large red modal-trigger">
    <i class="large material-icons">add</i>
  </a>
</div>
<div id="createTiposFacturaCombustibles" class="modal">
    <div class="modal-content">
        <h4>Agregar Tipo Factura Combustible</h4>
        <div class="row">
            <div class="input-field col s12">
                <input id="add_name" name="add_name" type="text">
                <label for="name">Nombre</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" id="insertTipoFacturaCombustible">Guardar</a>
    </div>
</div>
<div id="editTiposFacturaCombustibles" class="modal">
    <div class="modal-content">
        <h4>Editar Tipo Factura Combustible</h4>
        <div class="row">
            <div class="input-field col s12">
                <input id="edit_name" name="edit_name" type="text">
                <label for="name">Nombre</label>
            </div>
        </div>            
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" data-id="" id="updateTiposFacturaCombustible">Guardar</a>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.modal').modal();
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".tfc").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('#insertTipoFacturaCombustible').click(function(){
            var name = $('#add_name').val();
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {name: name, option:'insertTipos_Factura_Combustible'},
                success: function(data){
                    location.reload();
                }
            });
        });
        $('.editTiposFacturaCombustibles').click(function(){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            $('#edit_name').val(name);
            $('#updateTiposFacturaCombustible').attr('data-id', id);
        });
        $('#updateTiposFacturaCombustible').click(function(){
            var id = $(this).data('id');
            var name = $('#edit_name').val();
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {id: id, name: name, option:'updateTipos_Factura_Combustible'},
                success: function(data){
                    location.reload();
                }
            });
        });
        $('.deleteTiposFacturaCombustibles').click(function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {id: id},
                success: function(data){
                    location.reload();
                }
            });
        });
    });
</script>