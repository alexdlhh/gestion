<?php
require __DIR__.'/../../function.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Facturas </h4>
            </div>
            <div class="card-body">
                <div class="filters">
                    <div class="row rowfix">
                        <div class="col s6">
                            <div class="form-group">
                                <label>Fecha Inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="form-group">
                                <label>Fecha Fin</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Estado</label>
                                <select class=" browser-default form-control" id="tipo_entidad" name="tipo_entidad">
                                    <option value="0">Seleccione</option>
                                    <option value="1">pendiente</option>
                                    <option value="2">pagado</option>
                                    <option value="3">cancelado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col s3">
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
                        <div class="col s3">
                            <div class="form-group">
                                <label>Tipo Facturas</label>
                                <select class=" browser-default form-control" id="tipo_entidad" name="tipo_entidad">
                                    <option value="0">Seleccione</option>
                                    <?php
                                    $entidades = get_tipos_factura();
                                    $entidades = json_decode(remove_utf8_bom($entidades));
                                    foreach ($entidades as $entidad) {
                                        echo '<option value="'.$entidad->id.'">'.$entidad->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Entidades</label>
                                <select class=" browser-default form-control" id="entidad" name="tipo_entidad">
                                    <option value="0">Seleccione</option>
                                    <?php
                                    $entidades = get_entidades();
                                    $entidades = json_decode(remove_utf8_bom($entidades));
                                    foreach ($entidades as $entidad) {
                                        if($entidad->type==1){
                                            echo '<option value="'.$entidad->id.'">'.$entidad->name.'</option>';
                                        }
                                    }
                                    ?>
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
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Nº FRA</th>
                            <th>Dirigido a</th>
                            <th>CIF</th>
                            <th>Base</th>
                            <th>IVA</th>
                            <th>IRPF</th>
                            <th>OTROS</th>
                            <th>Total</th>
                            <th>OBSERVACIONES</th>
                            <th>ASUNTO/MOTIVO</th>
                            <th>PTE. PAGO</th>
                            <th>Comisión</th>
                            <th>Impuestos</th>
                            <th>Autónomo</th>
                            <th>S.Sociales</th>
                            <th>Sueldos</th>
                            <th>vencimiento</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getFacturas
                            $facturas = get_facturas();
                            //Recibimos un JSON con los datos de las Facturas
                            $facturas = json_decode(remove_utf8_bom($facturas));
                            foreach ($facturas as $factura) {?>
                                <tr class="factura <?=$factura->ptepago>0?'yellow lighten-3':''?> <?=((strtotime($factura->vencimiento)<=strtotime(date('Y-m-d')))&&($factura->ptepago>0))?'deep-orange lighten-3':''?>">
                                <td><?=$factura->id?></td>
                                <td>
                                    <?=$factura->tipo[0]->name?>
                                </td>
                                <td><?=$factura->date?></td>
                                <td><?=$factura->num?></td>
                                <td>
                                    <a href="#edit_entidad" 
                                    data-json='<?=json_encode($factura->entidad);?>'
                                    class="btn btn-success modal-trigger edit_entidad edit_entidad_btn"><?=$factura->entidad[0]->name?></a>
                                </td>
                                <td><?=$factura->cif?></td>
                                <td>
                                    <a href="#see_conceptos" 
                                    data-json='<?=json_encode($factura->conceptos);?>'
                                    class="btn btn-success modal-trigger see_conceptos"><?=$factura->conceptos->base?>€</a>                                    
                                </td>
                                <td>
                                    <a href="#see_conceptos" 
                                    data-json='<?=json_encode($factura->conceptos);?>'
                                    class="btn btn-success modal-trigger see_conceptos"><?=$factura->conceptos->iva?>€</a>  
                                </td>
                                <td><?=$factura->irpf?></td>
                                <td><?=$factura->otros?></td>
                                <td><a href="#see_conceptos" 
                                    data-json='<?=json_encode($factura->conceptos);?>'
                                    class="btn btn-success modal-trigger see_conceptos"><?=$factura->conceptos->total?>€</a></td>
                                <td><?=$factura->observaciones?></td>
                                <td><?=$factura->asunto?></td>
                                <td><?=$factura->ptepago<=0?'al corriente':$factura->ptepago.'€'?></td>
                                <td><?=$factura->comision?></td>
                                <td><?=$factura->impuestos?></td>
                                <td><?=$factura->autonomo?></td>
                                <td><?=$factura->ssociales?></td>
                                <td><?=$factura->sueldos?></td> 
                                <td><?=$factura->vencimiento?></td>                               
                                <td>
                                    <a href="#editTransacciones"
                                    data-json='<?=json_encode($factura->transacciones);?>' 
                                    data-id="<?=$factura->id?>"
                                    class="btn btn-success modal-trigger editTransacciones orange"><i class="material-icons">euro_symbol</i></a>
                                    <a href="#addFactura" 
                                    data-json='<?=json_encode($factura);?>'
                                    class="btn btn-success modal-trigger editFactura"><i class="material-icons">edit</i></a>
                                    <a href="javascript:;" data-id="<?=$factura->id?>" class="btn btn-danger deleteFactura red"><i class="material-icons">delete</i></a>
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
  <a href="#addFactura" class="btn-floating btn-large modal-trigger red">
    <i class="large material-icons">add</i>
  </a>
</div>
<div id="see_conceptos" class="modal">
    <div class="modal-content">
        <h4>Conceptos</h4>
        <div class="row">
            <div class="col s12 form-field conceptos">
                <div class="">
                    <table id="conceptos2">
                        <tr>
                            <td><b>Concepto</b></td>
                            <td><b>Importe</b></td>
                            <td><b>IVA %</b></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>Base</td>
                            <td>IVA</td>
                            <td>Total</td>
                        </tr>
                        <tr>
                            <td id="_base2"></td>
                            <td id="_iva2"></td>
                            <td id="_total2"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
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
<div id="addFactura" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4>Añadir Factura</h4>
            <br>
            <!--EMPRESA-->
            <div class="col s4 form-field">
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
            <!--ENTIDAD-->
            <div class="col s4 form-field">
                <label>Dirigido a</label>
                <select class=" browser-default form-control" id="add_entidad2" name="add_entidad2">
                    <option value="0">Seleccione</option>
                    <?php
                    $entidades = get_entidades();
                    $entidades = json_decode(remove_utf8_bom($entidades));
                    foreach ($entidades as $entidad) {
                        if($entidad->type==1){
                            echo '<option value="'.$entidad->id.'">'.$entidad->name.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <!--TIPO-->
            <div class="col s4 form-field">
                <label>Tipo Facturas</label>
                <select class=" browser-default form-control" id="add_tipo_tipos_factura" name="add_tipo_tipos_factura">
                    <option value="0">Seleccione</option>
                    <?php
                    $tipos_factura = get_tipos_factura();
                    $tipos_factura = json_decode(remove_utf8_bom($tipos_factura));
                    foreach ($tipos_factura as $tipos_factura) {
                        echo '<option value="'.$tipos_factura->id.'">'.$tipos_factura->name.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div style="clear:both;"></div>            
            <div class="col s4 form-field">
                <label>Nº Factura</label>
                <input type="text" class="form-control" id="add_num" name="add_num">
            </div>
            <div class="col s4 form-field">
                <label>Fecha Factura</label>
                <input type="date" class="form-control" id="add_fecha" name="fecha">
            </div>            
            <div class="col s4 form-field">
                <label>DNI/CIF</label>
                <input type="text" class="form-control" id="add_cif" name="add_cif">
            </div>
            <div style="clear:both;"></div>                 
            <div class="col s6 form-field">
                <label>IRPF %</label>
                <input type="text" class="form-control" id="add_irpf" name="add_irpf">
            </div>
            <div class="col s6 form-field">
                <label>Fecha de vencimiento</label>
                <input type="date" class="form-control" id="add_fecha_vencimiento" name="add_fecha_vencimiento">
            </div>
            <br>
            <div class="col s12 form-field conceptos">
                <label>Conceptos</label>
                <div class="">
                    <table id="conceptos">
                        <tr>
                            <td><b>Concepto</b></td>
                            <td><b>Importe</b></td>
                            <td><b>IVA %</b></td>
                            <td><a href="#" class="btn btn-success _create"><i class="material-icons">add</i></a></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>Base</td>
                            <td>IVA</td>
                            <td>Total</td>
                        </tr>
                        <tr>
                            <td id="_base"></td>
                            <td id="_iva"></td>
                            <td id="_total"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="col s6 form-field">
                <label>Comisión</label>
                <input type="text" class="form-control" id="add_comision" name="add_comision">
            </div>
            <div class="col s6 form-field">
                <label>Impuestos</label>
                <input type="text" class="form-control" id="add_impuestos" name="add_impuestos">
            </div>
            <div class="col s6 form-field">
                <label>Autónomo</label>
                <input type="text" class="form-control" id="add_autonomo" name="add_autonomo">
            </div>
            <div class="col s6 form-field">
                <label>Servicios Sociales</label>
                <input type="text" class="form-control" id="add_ssociales" name="add_ssociales">
            </div>
            <div class="col s6 form-field">
                <label>Sueldos</label>
                <input type="text" class="form-control" id="add_sueldos" name="add_sueldos">
            </div>
            <div class="col s6 form-field">
                <label>Asunto</label>
                <input type="text" class="form-control" id="add_asunto" name="add_asunto">
            </div>
            <div class="col s12 form-field">
                <label>Observaciones</label>
                <input type="text" class="form-control" id="add_observaciones" name="add_observaciones">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat saveFactura" data-id="0">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="editTransacciones" class="modal">
    <div class="modal-content">
        <h4>Transacciones Relacionadas</h4>
        <div class="row">
            <div class="col s12 form-field transacciones">
                <div class="">
                    <table id="transacciones2">
                        <tr>
                            <td><b>Forma de Pago</b></td>
                            <td><b>Fecha de pago</b></td>
                            <td><b>Importe</b></td>
                            <td><a href="#" class="btn btn-success _create2"><i class="material-icons">add</i></a></td>
                        </tr>
                    </table>
                    <div>Total: <span id="total_transacciones"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat saveTransaccion" data-id="">Guardar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.modal').modal();
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
        //funcionalidad conceptos
        $('._create').click(function(){
            var new_elem = `<tr>
                <td><input type="text" class="form-control update_concepto add_concepto" id="" name="add_concepto"></td>
                <td><input type="text" class="form-control update_concepto add_importe" id="" name="add_importe"></td>
                <td><input type="text" class="form-control update_concepto add_iva" id="" name="add_iva"></td>
                <td><a href="javascript:;" class="btn btn-danger red _delete" onclick="$(this).parent().parent().remove()"><i class="material-icons">delete</i></a></td>
            </tr>`;
            $('#conceptos').append(new_elem);
            $('.update_concepto').on('change',function(){
                var base = 0;
                var last_base=0;
                var iva = 0;
                var total = 0;
                $.each($('.update_concepto'),function(){
                    var value = $(this).val();
                    if($(this).hasClass('add_importe')){
                        base += parseFloat(value);
                        last_base = parseFloat(value);
                    }
                    if($(this).hasClass('add_iva')){
                        iva += last_base * parseFloat(value)/100;
                    }            
                })
                total = base + iva;
                $('#_base').html(base);
                $('#_iva').html(iva);
                $('#_total').html(total);
            })
        })
        //montar modal de editar factura
        $('.editFactura').click(function(){
            var json = $(this).attr('data-json');
            json = JSON.parse(json);
            $('#add_empresa').val(json.company[0].id);
            $('#add_entidad2').val(json.entidad[0].id);
            $('#add_tipo_tipos_factura').val(json.tipo[0].id);
            $('#add_num').val(json.num);
            $('#add_fecha').val(json.date);
            $('#add_cif').val(json.cif);
            $('#add_irpf').val(json.irpf);
            $('#add_fecha_vencimiento').val(json.date_vencimiento);
            var conceptos = json.conceptos;
            $.each(conceptos,function(i,v){
                console.log(v);
                if(v.importe != undefined){
                    var new_elem = `<tr>
                        <td><input type="text" class="form-control update_concepto add_concepto" id="" name="add_concepto" value="`+v.nombre+`"></td>
                        <td><input type="text" class="form-control update_concepto add_importe" id="" name="add_importe" value="`+v.importe+`"></td>
                        <td><input type="text" class="form-control update_concepto add_iva" id="" name="add_iva" value="`+v.iva+`"></td>
                        <td><a href="javascript:;" class="btn btn-danger red _delete" onclick="$(this).parent().parent().remove()"><i class="material-icons">delete</i></a></td>
                    </tr>`;
                    $('#conceptos').append(new_elem);
                    $('.update_concepto').on('change',function(){
                        var base = 0;
                        var last_base=0;
                        var iva = 0;
                        var total = 0;
                        $.each($('.update_concepto'),function(){
                            var value = $(this).val();
                            if($(this).hasClass('add_importe')){
                                base += parseFloat(value);
                                last_base = parseFloat(value);
                            }
                            if($(this).hasClass('add_iva')){
                                iva += last_base * parseFloat(value)/100;
                            }            
                        })
                        total = base + iva;
                        $('#_base').html(base);
                        $('#_iva').html(iva);
                        $('#_total').html(total);
                    })
                }
            })
            var base = 0;
            var last_base=0;
            var iva = 0;
            var total = 0;
            $.each($('.update_concepto'),function(){
                var value = $(this).val();
                if($(this).hasClass('add_importe')){
                    base += parseFloat(value);
                    last_base = parseFloat(value);
                }
                if($(this).hasClass('add_iva')){
                    iva += last_base * parseFloat(value)/100;
                }            
            })
            total = base + iva;
            $('#_base').html(base);
            $('#_iva').html(iva);
            $('#_total').html(total);
            $('#add_comision').val(json.comision);
            $('#add_impuestos').val(json.impuestos);
            $('#add_autonomo').val(json.autonomo);
            $('#add_ssociales').val(json.ssociales);
            $('#add_sueldos').val(json.sueldos);	
            $('#add_asunto').val(json.asunto);
            $('#add_observaciones').val(json.observaciones);
            $('.saveFactura').attr('data-id',json.id);
        })
        //guardar factura
        $('.saveFactura').click(function(){
            var id = $(this).attr('data-id');
            var data = {
                'option': id==0?'insertFactura':'updateFactura',
                'id': id,
                'empresa': $('#add_empresa').val(),
                'dirigido': $('#add_entidad2').val(),
                'tipo': $('#add_tipo_tipos_factura').val(),
                'num': $('#add_num').val(),
                'date': $('#add_fecha').val(),
                'cif': $('#add_cif').val(),
                'irpf': $('#add_irpf').val(),
                'fecha_vencimiento': $('#add_fecha_vencimiento').val(),
                'conceptos': [],
                'comision': $('#add_comision').val(),
                'impuestos': $('#add_impuestos').val(),
                'autonomo': $('#add_autonomo').val(),
                'ssociales': $('#add_ssociales').val(),
                'sueldos': $('#add_sueldos').val(),
                'asunto': $('#add_asunto').val(),
                'observaciones': $('#add_observaciones').val()
            }
            $.each($('.update_concepto'),function(){
                var value = $(this).val();
                if($(this).hasClass('add_concepto')){
                    data.conceptos.push({
                        'nombre': value
                    })
                }
                if($(this).hasClass('add_importe')){
                    data.conceptos[data.conceptos.length-1].importe = value;
                }
                if($(this).hasClass('add_iva')){
                    data.conceptos[data.conceptos.length-1].iva = value;
                }
            })
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
        //rellenamos el modal seeConceptos
        $('.see_conceptos').click(function(){
            var conceptos = $(this).attr('data-json');
            var conceptos = JSON.parse(conceptos);
            $.each(conceptos,function(i,v){
                console.log(v);
                if(v.importe != undefined){
                    var new_elem = `<tr>
                        <td><input type="text" class="form-control update_concepto2 add_concepto" id="" name="add_concepto" readonly value="`+v.nombre+`"></td>
                        <td><input type="text" class="form-control update_concepto2 add_importe" id="" name="add_importe" readonly value="`+v.importe+`"></td>
                        <td><input type="text" class="form-control update_concepto2 add_iva" id="" name="add_iva" readonly value="`+v.iva+`"></td>
                    </tr>`;
                    $('#conceptos2').append(new_elem);
                }
            })
            var base = 0;
            var last_base=0;
            var iva = 0;
            var total = 0;
            $.each($('.update_concepto2'),function(){
                var value = $(this).val();
                if($(this).hasClass('add_importe')){
                    base += parseFloat(value);
                    last_base = parseFloat(value);
                }
                if($(this).hasClass('add_iva')){
                    iva += last_base * parseFloat(value)/100;
                }            
            })
            total = base + iva;
            $('#_base2').html(base);
            $('#_iva2').html(iva);
            $('#_total2').html(total);
        })
         //funcionalidad transacciones
         $('._create2').click(function(){
            var formas_pago = '<?=get_formas_pago()?>'.replace(/^\uFEFF/gm, "");
            formas_pago = JSON.parse(formas_pago);
            formas_pago_options = '';
            $.each(formas_pago,function(i,v){
                formas_pago_options += `<option value="`+v.id+`">`+v.nombre+`</option>`;
            })
            var new_elem = `<tr>
                <td><input type="date" class="form-control update_transaccion _fecha_pagoTransaccion" id="" name="" value=""></td>
                <td><input type="text" class="form-control update_transaccion _importeTransaccion" id="" name="" value=""></td>
                <td>
                    <select id="" class="browser-default form-control">
                    `+formas_pago_options+`
                    </select>
                </td>
            </tr>`;
            $('#transacciones2').append(new_elem);
            $('.update_transaccion').on('change',function(){
                console.log('change')
                var total = 0;
                $.each($('.update_transaccion'),function(){
                    var value = $(this).val();
                    if($(this).hasClass('_importeTransaccion')){
                        total += parseFloat(value);
                    }                  
                })
                $('#total_transacciones').html(total);
            })            
        })
        //montar modal de transacciones
        $('.editTransacciones').click(function(){
            var transacciones = $(this).attr('data-json');
            var id_factura = $(this).attr('data-id');
            transacciones = JSON.parse(transacciones);
            var formas_pago = '<?=get_formas_pago()?>'.replace(/^\uFEFF/gm, "");;
            formas_pago = JSON.parse(formas_pago);
            formas_pago_options = '';
            $.each(formas_pago,function(i,v){
                formas_pago_options += `<option value="`+v.id+`">`+v.nombre+`</option>`;
            })
            $.each(transacciones,function(i,v){
                console.log(v);
                if(v.importe != undefined){
                    var new_elem = `<tr>
                        <td><input type="date" class="form-control update_transaccion _fecha_pagoTransaccion" id="" name="" value="`+v.fecha_pago+`"></td>
                        <td><input type="text" class="form-control update_transaccion _importeTransaccion" id="" name="" value="`+v.importe+`"></td>
                        <td>
                            <select id="_forma_pago_`+i+`" class="browser-default form-control">
                            `+formas_pago_options+`
                            </select>
                        </td>
                    </tr>`;
                    $('#transacciones2').append(new_elem);
                    $('#_forma_pago_'+i).val(v.forma_pago);
                    $('.update_transaccion').on('change',function(){
                        var total = 0;
                        $.each($('.update_transaccion'),function(){
                            var value = $(this).val();
                            if($(this).hasClass('_importeTransaccion')){
                                total += parseFloat(value);
                            }        
                        })
                        total = base + iva;
                        $('#total_transacciones').html(total);
                    })
                }
            })
            var total = 0;
            $.each($('.update_transaccion'),function(){
                var value = $(this).val();
                if($(this).hasClass('_importeTransaccion')){
                    total += parseFloat(value);
                }
            })
            $('#total_transacciones').html(total);
            $('.saveTransaccion').attr('data-id',id_factura);
        })
        //guardar transacciones
        $('.saveTransaccion').click(function(){
            var id_factura = $(this).attr('data-id');
            var transacciones = [];
            $.each($('.update_transaccion'),function(){
                var fecha_pago = $(this).parent().parent().find('._fecha_pagoTransaccion').val();
                var importe = $(this).parent().parent().find('._importeTransaccion').val();
                var forma_pago = $(this).parent().parent().find('select').val();
                transacciones.push({
                    fecha_pago:fecha_pago,
                    importe:importe,
                    forma_pago:forma_pago
                })
            })
            console.log({
                    id_factura:id_factura,
                    transacciones: transacciones
                });
            $.ajax({
                url:'https://www.agenciapentabrand.com/gestion/api.php',
                type:'POST',
                data:{
                    id_factura:id_factura,
                    transacciones: transacciones,
                    option: 'updateTransacciones'
                },
                success:function(data){
                    console.log(data);
                    $('#modalTransacciones').modal('hide');
                    location.reload();
                }
            })
        })
        //filtros de factras
    })
</script>
<?//get_facturas();?>