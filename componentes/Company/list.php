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
                                <tr class="emp">
                                <td><?=$compa->id?></td>
                                <td><?=$compa->name?></td>
                                <td><?=$compa->type==1?'Servicios':'combustible'?></td>
                                <td>
                                    <a href="#editCompany" data-type="<?=$compa->type?>" data-name="<?=$compa->name?>" data-id="<?=$compa->id?>" class="modal-trigger btn btn-success editCompany"><i class="material-icons">create</i></a>
                                    <a href="javascript:;" class="btn btn-danger red deleteCompany"><i class="material-icons">delete</i></a>
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
    <a href="#addCompany" class="modal-trigger btn-floating btn-large red ">
        <i class="large material-icons">add</i>
    </a>
</div>

<div id="addCompany" class="modal">
    <div class="modal-content">
        <h4>Añadir Empresa</h4>
        <div class="row">
            <div class="col s6 form-input">
                <label for="name">Nombre</label>
                <input type="text" name="add_name" id="add_name">
            </div>
            <div class="col s6 form-input">
                <label for="type">Tipo</label>
                <select name="add_type" id="add_type" class="browser-default">
                    <option value="1">Servicios</option>
                    <option value="2">Combustible</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat insertEmpresa">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="editCompany" class="modal">
    <div class="modal-content">
        <h4>Editar Empresa</h4>
        <div class="row">
            <div class="col s6 form-input">
                <label for="name">Nombre</label>
                <input type="text" name="edit_name" id="edit_name">
            </div>
            <div class="col s6 form-input">
                <label for="type">Tipo</label>
                <select name="edit_type" id="edit_type" class="browser-default">
                    <option value="1">Servicios</option>
                    <option value="2">Combustible</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat updateEmpresa" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".emp").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $('.insertEmpresa').click(function(){
            var name = $('#add_name').val();
            var type = $('#add_type').val();
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {option: 'addCompany', name: name, type: type},
                success: function(data){
                    location.reload();
                }
            })
        });
        $('.editCompany').click(function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var type = $(this).data('type');
            $('#edit_name').val(name);
            $('#edit_type').val(type);
            $('.updateEmpresa').attr('data-id', id);
        });
        $('.updateEmpresa').click(function(){
            var id = $(this).data('id');
            var name = $('#edit_name').val();
            var type = $('#edit_type').val();
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: {option: 'updateCompany', id: id, name: name, type: type},
                success: function(data){
                    location.reload();
                }
            })
        });
        $('.deleteCompany').click(function(){
            var id = $(this).parent().parent().find('td').eq(0).text();
            if(confirm('¿Estas seguro de eliminar esta empresa?')){
                $.ajax({
                    url: 'https://www.agenciapentabrand.com/gestion/api.php',
                    type: 'POST',
                    data: {option: 'deleteCompany', id: id},
                    success: function(data){
                        location.reload();
                    }
                })
            }
        });
    });
</script>