<?php
                        foreach ($oferta as $ofe) {

                            echo "<td>" . $ofe['ofe_descripcion'] . "</td>";
                            echo "<td>" . $ofe['ofe_fecha_ini'] . "</td>";
                            echo "<td>" . $ofe['ofe_fecha_fin'] . "</td>";
                            echo "<td><a href='" . getUrl("Oferta", "Oferta", "getEditar", array("id" => $ofe['ofe_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`Oferta`," . $ofe['ofe_id'] . ",`" . $ofe['ofe_descripcion'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
