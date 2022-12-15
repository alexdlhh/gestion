<?php
require __DIR__.'/../../function.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Entidades </h4>
            </div>
            <div class="card-subheader">
                <p>Empresa: ANA,SURGEST,AGS,HCP,PMA</p>
                <p>Tipo Entidaes: EMPRESA,AGENTES,CLIENTES,COMPAÑÍA 1,COMPAÑÍA 2,PROVEEDORES,..</p>
                <p>Tipo: SERVICIOS,COMBUSTIBLE</p>
            </div>
            <div class="card-body">
                <div class="filters">
                    <div class="row rowfix">
                        <div class="col s4">
                            <div class="form-group">
                                <label>Empresa</label>
                                <select class=" browser-default form-control" id="empresa" name="empresa">
                                    <option value="0">Seleccione</option>
                                    <?php
                                    $empresas = get_empresas();
                                    $empresas = json_decode(remove_utf8_bom($empresas));
                                    foreach ($empresas as $empresa) {
                                        echo '<option value="'.$empresa->id.'">'.$empresa->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>          
                        <div class="col s4">
                            <div class="form-group">
                                <label>Entidades</label>
                                <select class=" browser-default form-control" id="tipo_entidad" name="tipo_entidad">
                                    <option value="0">Seleccione</option>
                                    <?php
                                    $entidades = get_tipos_entidades();
                                    $entidades = json_decode(remove_utf8_bom($entidades));
                                    foreach ($entidades as $entidad) {
                                        echo '<option value="'.$entidad->id.'">'.$entidad->Nombre.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>                  
                        <div class="col s4">
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class=" browser-default form-control" id="tipo" name="tipo">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Servicios</option>
                                    <option value="2">Combustible</option>
                                </select>
                            </div>
                        </div>
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
                            <th>NOMBRE</th>
                            <th>CIF/NIF</th>
                            <th>F. NAC.</th>
                            <th>DIRECCION FISCAL</th>
                            <th>DIRECCION </th>
                            <th>POBLACION</th>
                            <th>C. POSTAL</th>
                            <th>PROVINCIA</th>
                            <th>P. CONTACTO</th>
                            <th>MOVIL</th>
                            <th>TELF.</th>
                            <th>EMAIL</th>
                            <th>D. BANCARIOS</th>
                            <th>OBSERVACIONES</th> 
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getFacturas
                            $entidades = get_entidades();
                            //Recibimos un JSON con los datos de las Facturas
                            $entidades = json_decode(remove_utf8_bom($entidades));
                            foreach ($entidades as $entidad) {?>
                                <tr class="entidad type<?=$entidad->type?> entidad<?=$entidad->tipo_entidad?> emp<?=$entidad->company?>">
                                <td><?=$entidad->id?></td>
                                <td><?=$entidad->name?></td>
                                <td><?=$entidad->nif?></td>
                                <td><?=$entidad->date?></td>
                                <td><?=$entidad->b_address?></td>
                                <td><?=$entidad->address?></td>
                                <td><?=$entidad->poblacion?></td>
                                <td><?=$entidad->cp?></td>
                                <td><?=$entidad->provincia?></td>
                                <td><?=$entidad->contact?></td>
                                <td><?=$entidad->phone?></td>
                                <td><?=$entidad->phone2?></td>
                                <td><?=$entidad->email?></td>
                                <td><?=$entidad->bank?></td>
                                <td><?=$entidad->observaciones?></td>
                                <td>
                                    <a href="#edit_entidad" data-json='<?=json_encode($entidades);?>' class="btn btn-success modal-trigger edit_entidad"><i class="material-icons">create</i></a>
                                    <a href="javascript:;" class="btn btn-danger red delete_entidad" data-id="<?=$entidad->id?>"><i class="material-icons">delete</i></a>
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
  <a href="#add_entidad" class="btn-floating btn-large red modal-trigger">
    <i class="large material-icons">add</i>
  </a>
</div>
<!-- Modal Structure -->
<div id="add_entidad" class="modal">
    <div class="modal-content">
        <h4>Añadir Entidad</h4>
        <div class="row">
            <div class="col s4 form-field">
                <label>Nombre</label>
                <input type="text" class="form-control" id="add_nombre" name="nombre">
            </div>
            <div class="col s4 form-field">
                <label>CIF/NIF</label>
                <input type="text" class="form-control" id="add_cif" name="cif">
            </div>
            <div class="col s4 form-field">
                <label>Email</label>
                <input type="text" class="form-control" id="add_email" name="email">
            </div>
            <div class="col s4 form-field">
                <label>Fecha Nacimiento</label>
                <input type="date" class="form-control" id="add_fecha" name="fecha">
            </div>
            <div class="col s4 form-field">
                <label>Dirección Fiscal</label>
                <input type="text" class="form-control" id="add_direccion_fiscal" name="direccion_fiscal">
            </div>
            <div class="col s4 form-field">
                <label>Dirección</label>
                <input type="text" class="form-control" id="add_direccion" name="direccion">
            </div>
            <div class="col s4 form-field">
                <label>Población</label>
                <input type="text" class="form-control" id="add_poblacion" name="poblacion">
            </div>
            <div class="col s4 form-field">
                <label>Código Postal</label>
                <input type="text" class="form-control" id="add_cp" name="cp">
            </div>
            <div class="col s4 form-field">
                <label>Provincia</label>
                <input type="text" class="form-control" id="add_provincia" name="provincia">
            </div>
            <div class="col s4 form-field">
                <label>Persona de Contacto</label>
                <input type="text" class="form-control" id="add_contacto" name="contacto">
            </div>
            <div class="col s4 form-field">
                <label>Móvil</label>
                <input type="text" class="form-control" id="add_movil" name="movil">
            </div>
            <div class="col s4 form-field">
                <label>Teléfono</label>
                <input type="text" class="form-control" id="add_telefono" name="telefono">
            </div>            
            <div class="col s6 form-field">
                <label>Banco</label>
                <input type="text" class="form-control" id="add_banco" name="banco">
            </div>
            <div class="col s6 form-field">
                <label>Observaciones</label>
                <input type="text" class="form-control" id="add_observaciones" name="observaciones">
            </div>
            <div class="col s4">
                <div class="form-group">
                    <label>Empresa</label>
                    <select class=" browser-default form-control" id="add_empresa" name="add_empresa">
                        <option value="0">Seleccione</option>
                        <?php
                        $empresas = get_empresas();
                        $empresas = json_decode(remove_utf8_bom($empresas));
                        foreach ($empresas as $empresa) {
                            echo '<option value="'.$empresa->id.'">'.$empresa->name.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>          
            <div class="col s4">
                <div class="form-group">
                    <label>Entidades</label>
                    <select class=" browser-default form-control" id="add_tipo_entidad" name="add_tipo_entidad">
                        <option value="0">Seleccione</option>
                        <?php
                        $entidades = get_tipos_entidades();
                        $entidades = json_decode(remove_utf8_bom($entidades));
                        foreach ($entidades as $entidad) {
                            echo '<option value="'.$entidad->id.'">'.$entidad->Nombre.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>                  
            <div class="col s4">
                <div class="form-group">
                    <label>Tipo</label>
                    <select class=" browser-default form-control" id="add_tipo" name="add_tipo">
                        <option value="0">Seleccione</option>
                        <option value="1">Servicios</option>
                        <option value="2">Combustible</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat save_entidad">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="edit_entidad" class="modal">
    <div class="modal-content">
        <h4>Editar Entidad</h4>
        <div class="row">
            <div class="col s4 form-field">
                <label>Nombre</label>
                <input type="text" class="form-control" id="edit_nombre" name="nombre">
            </div>
            <div class="col s4 form-field">
                <label>CIF/NIF</label>
                <input type="text" class="form-control" id="edit_cif" name="cif">
            </div>
            <div class="col s4 form-field">
                <label>Email</label>
                <input type="text" class="form-control" id="edit_email" name="email">
            </div>
            <div class="col s4 form-field">
                <label>Fecha Nacimiento</label>
                <input type="date" class="form-control" id="edit_fecha" name="fecha">
            </div>
            <div class="col s4 form-field">
                <label>Dirección Fiscal</label>
                <input type="text" class="form-control" id="edit_direccion_fiscal" name="direccion_fiscal">
            </div>
            <div class="col s4 form-field">
                <label>Dirección</label>
                <input type="text" class="form-control" id="edit_direccion" name="direccion">
            </div>
            <div class="col s4 form-field">
                <label>Población</label>
                <input type="text" class="form-control" id="edit_poblacion" name="poblacion">
            </div>
            <div class="col s4 form-field">
                <label>Código Postal</label>
                <input type="text" class="form-control" id="edit_cp" name="cp">
            </div>
            <div class="col s4 form-field">
                <label>Provincia</label>
                <input type="text" class="form-control" id="edit_provincia" name="provincia">
            </div>
            <div class="col s4 form-field">
                <label>Persona de Contacto</label>
                <input type="text" class="form-control" id="edit_contacto" name="contacto">
            </div>
            <div class="col s4 form-field">
                <label>Móvil</label>
                <input type="text" class="form-control" id="edit_movil" name="movil">
            </div>
            <div class="col s4 form-field">
                <label>Teléfono</label>
                <input type="text" class="form-control" id="edit_telefono" name="telefono">
            </div>            
            <div class="col s6 form-field">
                <label>Banco</label>
                <input type="text" class="form-control" id="edit_banco" name="banco">
            </div>
            <div class="col s6 form-field">
                <label>Observaciones</label>
                <input type="text" class="form-control" id="edit_observaciones" name="observaciones">
            </div>
            <div class="col s4">
                <div class="form-group">
                    <label>Empresa</label>
                    <select class=" browser-default form-control" id="edit_empresa" name="add_empresa">
                        <option value="0">Seleccione</option>
                        <?php
                        $empresas = get_empresas();
                        $empresas = json_decode(remove_utf8_bom($empresas));
                        foreach ($empresas as $empresa) {
                            echo '<option value="'.$empresa->id.'">'.$empresa->name.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>          
            <div class="col s4">
                <div class="form-group">
                    <label>Entidades</label>
                    <select class=" browser-default form-control" id="edit_tipo_entidad" name="add_tipo_entidad">
                        <option value="0">Seleccione</option>
                        <?php
                        $entidades = get_tipos_entidades();
                        $entidades = json_decode(remove_utf8_bom($entidades));
                        foreach ($entidades as $entidad) {
                            echo '<option value="'.$entidad->id.'">'.$entidad->Nombre.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>                  
            <div class="col s4">
                <div class="form-group">
                    <label>Tipo</label>
                    <select class=" browser-default form-control" id="edit_tipo" name="add_tipo">
                        <option value="0">Seleccione</option>
                        <option value="1">Servicios</option>
                        <option value="2">Combustible</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat update_entidad" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" data-id="">Cancelar</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.modal').modal();
        //FILTROS SELECTORES CONECTADOS ENTRE SI
        $('#empresa').change(function(){
            var id = $(this).val();
            var tipo_entidad=$('#tipo_entidad').val();
            var tipo=$('#tipo').val();
            $('.entidad').hide();
            $.each($('.entidad'),function(i,element){
                if(tipo_entidad!=0 && tipo!=0){
                    if($(element).hasClass('emp'+id) && $(element).hasClass('entidad'+tipo_entidad) && $(element).hasClass('type'+tipo)){
                        $(element).show();
                    }
                }else if(tipo_entidad!=0 && tipo==0){
                    if($(element).hasClass('emp'+id) && $(element).hasClass('entidad'+tipo_entidad)){
                        $(element).show();
                    }
                }else if(tipo_entidad==0 && tipo!=0){
                    if($(element).hasClass('emp'+id) && $(element).hasClass('type'+tipo)){
                        $(element).show();
                    }
                }else if(tipo_entidad==0 && tipo==0){
                    if($(element).hasClass('emp'+id)){
                        $(element).show();
                    }
                }
            })
        })
        $('#tipo_entidad').change(function(){
            var id = $(this).val();
            var tipo=$('#tipo').val();
            var empresa=$('#empresa').val();
            $('.entidad').hide();
            $.each($('.entidad'),function(){
                if(tipo!=0 && empresa!=0){
                    if($(this).hasClass('entidad'+id) && $(this).hasClass('type'+tipo) && $(this).hasClass('emp'+empresa)){
                        $(this).show();
                    }
                }else if(tipo!=0 && empresa==0){
                    if($(this).hasClass('entidad'+id) && $(this).hasClass('type'+tipo)){
                        $(this).show();
                    }
                }else if(tipo==0 && empresa!=0){
                    if($(this).hasClass('entidad'+id) && $(this).hasClass('emp'+empresa)){
                        $(this).show();
                    }
                }else if(tipo==0 && empresa==0){
                    if($(this).hasClass('entidad'+id)){
                        $(this).show();
                    }
                }
            })
        })
        $('#tipo').change(function(){
            var id = $(this).val();
            var tipo_entidad=$('#tipo_entidad').val();
            var empresa=$('#empresa').val();
            $('.entidad').hide();
            $.each($('.entidad'),function(){
                if(tipo_entidad!=0 && empresa!=0){
                    if($(this).hasClass('type'+id) && $(this).hasClass('entidad'+tipo_entidad) && $(this).hasClass('emp'+empresa)){
                        $(this).show();
                    }
                }else if(tipo_entidad!=0 && empresa==0){
                    if($(this).hasClass('type'+id) && $(this).hasClass('entidad'+tipo_entidad)){
                        $(this).show();
                    }
                }else if(tipo_entidad==0 && empresa!=0){
                    if($(this).hasClass('type'+id) && $(this).hasClass('emp'+empresa)){
                        $(this).show();
                    }
                }else if(tipo_entidad==0 && empresa==0){
                    if($(this).hasClass('type'+id)){
                        $(this).show();
                    }
                }
            })
        })
        //Filtramos los tr de la tabla de entidades mostrados por el criterio de busqueda de #search
        $('#search').keyup(function(){
            var search = $(this).val();
            $.each($('.entidad'),function(){
                if($(this).text().toLowerCase().indexOf(search.toLowerCase())==-1 || $(this).css('display')=='none'){
                    $(this).hide();
                }else{
                    $(this).show();
                }
            })
        })
        //montamos el modal de editar edit_entidad
        $('.edit_entidad').click(function(){
            var json = $(this).attr('data-json');
            var entidad = JSON.parse(json)[0];
            $('#edit_nombre').val(entidad.name);
            $('#edit_cif').val(entidad.nif);
            $('#edit_email').val(entidad.email);
            $('#edit_fecha').val(entidad.date);
            $('#edit_direccion_fiscal').val(entidad.b_address);
            $('#edit_direccion').val(entidad.address);
            $('#edit_poblacion').val(entidad.poblacion);
            $('#edit_cp').val(entidad.cp);
            $('#edit_provincia').val(entidad.provincia);
            $('#edit_contacto').val(entidad.contact);
            $('#edit_movil').val(entidad.phone);
            $('#edit_telefono').val(entidad.phone2);
            $('#edit_banco').val(entidad.bank);
            $('#edit_observaciones').val(entidad.observaciones);
            $('#edit_empresa').val(entidad.company);
            $('#edit_tipo_entidad').val(entidad.tipo_entidad);
            $('#edit_tipo').val(entidad.type);
            $('.update_entidad').attr('data-id',entidad.id);
        })
        //guardamos una nueva entidad
        $('.save_entidad').click(function(){
            var nombre = $('#add_nombre').val();
            var cif = $('#add_cif').val();
            var email = $('#add_email').val();
            var fecha = $('#add_fecha').val();
            var direccion_fiscal = $('#add_direccion_fiscal').val();
            var direccion = $('#add_direccion').val();
            var poblacion = $('#add_poblacion').val();
            var cp = $('#add_cp').val();
            var provincia = $('#add_provincia').val();
            var contacto = $('#add_contacto').val();
            var movil = $('#add_movil').val();
            var telefono = $('#add_telefono').val();
            var banco = $('#add_banco').val();
            var observaciones = $('#add_observaciones').val();
            var empresa = $('#add_empresa').val();
            var tipo_entidad = $('#add_tipo_entidad').val();
            var tipo = $('#add_tipo').val();
            var data = {
                'name':nombre,
                'nif':cif,
                'email':email,
                'date':fecha,
                'b_address':direccion_fiscal,
                'address':direccion,
                'poblacion':poblacion,
                'cp':cp,
                'provincia':provincia,
                'contact':contacto,
                'phone':movil,
                'phone2':telefono,
                'bank':banco,
                'observaciones':observaciones,
                'company':empresa,
                'tipo_entidad':tipo_entidad,
                'type':tipo,
                'season':<?=date('Y')?>,
                'option':'insertEntity'
            }
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: data,
                success: function(response){
                    location.reload();
                }
            })
        })
        //actualizamos una entidad
        $('.update_entidad').click(function(){
            var id = $(this).attr('data-id');
            var nombre = $('#edit_nombre').val();
            var cif = $('#edit_cif').val();
            var email = $('#edit_email').val();
            var fecha = $('#edit_fecha').val();
            var direccion_fiscal = $('#edit_direccion_fiscal').val();
            var direccion = $('#edit_direccion').val();
            var poblacion = $('#edit_poblacion').val();
            var cp = $('#edit_cp').val();
            var provincia = $('#edit_provincia').val();
            var contacto = $('#edit_contacto').val();
            var movil = $('#edit_movil').val();
            var telefono = $('#edit_telefono').val();
            var banco = $('#edit_banco').val();
            var observaciones = $('#edit_observaciones').val();
            var empresa = $('#edit_empresa').val();
            var tipo_entidad = $('#edit_tipo_entidad').val();
            var tipo = $('#edit_tipo').val();
            var data = {
                'id':id,
                'name':nombre,
                'nif':cif,
                'email':email,
                'date':fecha,
                'b_address':direccion_fiscal,
                'address':direccion,
                'poblacion':poblacion,
                'cp':cp,
                'provincia':provincia,
                'contact':contacto,
                'phone':movil,
                'phone2':telefono,
                'bank':banco,
                'observaciones':observaciones,
                'company':empresa,
                'tipo_entidad':tipo_entidad,
                'type':tipo,
                'season':<?=date('Y')?>,
                'option':'updateEntity'
            }
            $.ajax({
                url: 'https://www.agenciapentabrand.com/gestion/api.php',
                type: 'POST',
                data: data,
                success: function(response){
                    console.log(response);
                    location.reload();
                }
            })
        })
        //borramos una entidad
        $('.delete_entidad').click(function(){
            var id = $(this).attr('data-id');
            var data = {
                'id':id,
                'option':'deleteEntity'
            }
            if(confirm('¿Estás seguro de que quieres borrar esta entidad?')){
                $.ajax({
                    url: 'https://www.agenciapentabrand.com/gestion/api.php',
                    type: 'POST',
                    data: data,
                    success: function(response){
                        location.reload();
                    }
                })
            }
        })
    });
</script>