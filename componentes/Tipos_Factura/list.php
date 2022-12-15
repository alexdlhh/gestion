<?php
require __DIR__.'/../../function.php';
//INSERT INTO `Tipos_Factura` (`id`, `name`) VALUES (1, 'FACTURAS PROVEEDORES');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Tipos Factura </h4>
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
                            $tipos_factura = get_tipos_factura();
                            $tipos_factura = json_decode(remove_utf8_bom($tipos_factura));
                            foreach ($tipos_factura as $tipos_facturas) {?>
                                <tr class="tf">
                                <td><?=$tipos_facturas->id?></td>
                                <td><?=$tipos_facturas->name?></td>
                                <td>
                                    <a href="#editTiposFactura" data-name="<?=$tipos_facturas->name?>" data-id="<?=$tipos_facturas->id?>" class="editTiposFactura btn btn-primary modal-trigger"><i class="material-icons">create</i></a>
                                    <a href="javascript:;" data-id="<?=$tipos_facturas->id?>" class="deleteTiposFactura btn btn-danger modal-trigger red"><i class="material-icons">delete</i></a>
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
  <a href="#addTipoFactura" class="btn-floating btn-large red modal-trigger">
    <i class="large material-icons">add</i>
  </a>
</div>
<div id="addTipoFactura" class="modal">
    <div class="modal-content">
        <h4>Agregar Tipo Factura</h4>
        <div class="row">
            <div class="input-field col s12">
                <input id="add_name" name="add_name" type="text">
                <label for="name">Nombre</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" id="insertTipoFactura">Guardar</a>
    </div>
</div>
<div id="editTiposFactura" class="modal">
    <div class="modal-content">
        <h4>Editar Tipo Factura</h4>
        <div class="row">
            <div class="input-field col s12">
                <input id="edit_name" name="edit_name" type="text">
                <label for="name">Nombre</label>
            </div>
        </div>            
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" data-id="" id="updateTiposFactura">Guardar</a>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.modal').modal();
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".tf").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('#insertTipoFactura').click(function(){
            var name = $('#add_name').val();
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {name:name, option:'insertTipos_Factura'},
                success: function(data){
                    location.reload();
                }
            });
        });
        $('.editTiposFactura').click(function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#edit_name').val(name);
            $('#updateTiposFactura').attr('data-id', id);
        })
        $('#updateTiposFactura').click(function(){
            var id = $(this).data('id');
            var name = $('#edit_name').val();
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {id:id, name:name, option:'updateTipos_Factura'},
                success: function(data){
                    location.reload();
                }
            });
        });
        $('.deleteTiposFactura').click(function(){
            var id = $(this).data('id');
            if(confirm('¿Estás seguro de eliminar este tipo de factura?')){
                $.ajax({
                    url: 'https://www.agenciapentabrand.com/gestion/api.php',
                    type: 'POST',
                    data: {id:id, option:'deleteTipos_Factura'},
                    success: function(data){
                        location.reload();
                    }
                });
            }
        });
    });
</script>