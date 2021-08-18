<?php
                        foreach ($ciudad as $ciu) {

                            echo "<td>" . $ciu['ciu_nombre'] . "</td>";
                            echo "<td>" . $ciu['dep_nombre'] . "</td>";
                            echo "<td><a href='" . getUrl("Ciudad", "Ciudad", "getEditar", array("id" => $ciu['ciu_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`Ciudad`," . $ciu['ciu_id'] . ",`" . $ciu['ciu_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>