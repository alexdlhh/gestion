<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Facturas </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                id
                            </th>
                            <th>
                                date
                            </th>
                            <th>
                                num
                            </th>
                            <th>
                                dirigido
                            </th>
                            <th>
                                cif
                            </th>
                            <th>
                                base
                            </th>
                            <th>
                                iva
                            </th>
                            <th>
                                otros
                            </th>
                            <th>
                                irpf
                            </th>
                            <th>
                                total
                            </th>
                            <th>
                                type
                            </th>
                            <th>
                                prestado
                            </th>
                            <th>
                                asunto
                            </th>
                            <th>
                                motivo
                            </th>
                            <th>
                                company
                            </th>
                        </thead>
                        <tbody>
                            <?php
                            //Hacemos un CURL mediante POST a api.php, option = getFacturas
                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                            CURLOPT_URL => 'http://localhost:1314/api.php',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('option' => 'getFacturas'),
                            ));

                            $facturas = curl_exec($curl);
                            echo $facturas;
                            if (curl_errno($curl)) {
                                $error_msg = curl_error($curl);
                            }
                            
                            if (isset($error_msg)) {
                                // TODO - Handle cURL error accordingly
                            }
                            curl_close($curl);
                            

                            //Recibimos un JSON con los datos de las Facturas
                            $facturas = json_decode($facturas);

                            foreach ($facturas as $factura) {
                                echo "<tr>";
                                echo "<td>" . $factura->id . "</td>";
                                echo "<td>" . $factura->date . "</td>";
                                echo "<td>" . $factura->num . "</td>";
                                echo "<td>" . $factura->dirigido . "</td>";
                                echo "<td>" . $factura->cif . "</td>";
                                echo "<td>" . $factura->base . "</td>";
                                echo "<td>" . $factura->iva . "</td>";
                                echo "<td>" . $factura->otros . "</td>";
                                echo "<td>" . $factura->irpf . "</td>";
                                echo "<td>" . $factura->total . "</td>";
                                echo "<td>" . $factura->type . "</td>";
                                echo "<td>" . $factura->prestado . "</td>";
                                echo "<td>" . $factura->asunto . "</td>";
                                echo "<td>" . $factura->motivo . "</td>";
                                echo "<td>" . $factura->company . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>