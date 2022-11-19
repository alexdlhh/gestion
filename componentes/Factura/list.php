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
                        <div class="col s3">
                            <div class="form-group">
                                <label>Fecha Inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Fecha Fin</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class=" browser-default form-control" id="cliente" name="cliente">
                                    <option value="0">Seleccione</option>
                                    <?php
                                    $clientes = get_clientes();
                                    $clientes = json_decode(remove_utf8_bom($clientes));
                                    foreach ($clientes as $cliente) {
                                        echo '<option value="'.$cliente->id.'">'.$cliente->nombre.'</option>';
                                    }
                                    ?>
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
                                        echo '<option value="'.$empresa->id.'">'.$empresa->nombre.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Forma de Pago</label>
                                <select class=" browser-default form-control" id="forma_pago" name="forma_pago">
                                    <option value="0">Seleccione</option>
                                    <?php
                                    $formas_pago = get_formas_pago();
                                    $formas_pago = json_decode(remove_utf8_bom($formas_pago));
                                    foreach ($formas_pago as $forma_pago) {
                                        echo '<option value="'.$forma_pago->id.'">'.$forma_pago->nombre.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Estado</label>
                                <select class=" browser-default form-control" id="estado" name="estado">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Pagado</option>
                                    <option value="0">Pendiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Factura</label>
                                <input type="text" class="form-control" id="factura" name="factura">
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Orden de Compra</label>
                                <input type="text" class="form-control" id="orden_compra" name="orden_compra">
                            </div>
                        </div>
                        <div class="col s3">
                            <div class="form-group">
                                <label>Valor</label>
                                <input type="text" class="form-control" id="valor" name="valor">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="sortable">
                        <thead class=" text-primary">
                            <th>id</th>
                            <th>Fecha</th>
                            <th>Nº Factura</th>
                            <th>Dirigido a</th>
                            <th>CIF</th>
                            <th>Base</th>
                            <th>IVA</th>
                            <th>Otros</th>
                            <th>IRPF</th>
                            <th>Total</th>
                            <th>Tipo</th>
                            <th>Prestado a</th>
                            <th>Asunto</th>
                            <th>Motivo</th>
                            <th>Empresa</th> 
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getFacturas
                            $facturas = get_facturas();
                            //Recibimos un JSON con los datos de las Facturas
                            $facturas = json_decode(remove_utf8_bom($facturas));
                            foreach ($facturas as $factura) {?>
                                <tr>
                                <td><?=$factura->id?></td>
                                <td><?=$factura->date?></td>
                                <td><?=$factura->num?></td>
                                <td><?=$factura->dirigido?></td>
                                <td><?=$factura->cif?></td>
                                <td><?=$factura->base?></td>
                                <td><?=$factura->iva?></td>
                                <td><?=$factura->otros?></td>
                                <td><?=$factura->irpf?></td>
                                <td><?=$factura->total?></td>
                                <td><?=$factura->type?></td>
                                <td><?=$factura->prestado?></td>
                                <td><?=$factura->asunto?></td>
                                <td><?=$factura->motivo?></td>
                                <td><?=$factura->company?></td>
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
  <a href="?place=Factura&file=edit&id=0" class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
</div>