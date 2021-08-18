<?php
                        foreach ($linea_tecnologica as $lt) {

                            echo "<td>" . $lt['lin_tec_nombre'] . "</td>";
                            echo "<td><a href='" . getUrl("LineaTecnologica", "LineaTecnologica", "getEditar", array("id" => $lt['lin_tec_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`LineaTecnologica`," . $lt['lin_tec_id'] . ",`" . $lt['lin_tec_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>