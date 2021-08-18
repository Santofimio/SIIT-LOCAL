<?php
                        foreach ($programa as $pro) {

                            echo "<td>" . $pro['pro_nombre'] . "</td>";
                            echo "<td>" . $pro['pro_area_nombre'] . "</td>";
                            echo "<td>" . $pro['pro_niv_nombre'] . "</td>";
                            echo "<td><a href='" . getUrl("Programa", "Programa", "getEditar", array("id" => $pro['pro_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`Programa`," . $pro['pro_id'] . ",`" . $pro['pro_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>