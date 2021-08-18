<?php
                        foreach ($programa_nivel as $pn) {

                            echo "<td>" . $pn['pro_niv_nombre'] . "</td>";
                            echo "<td><a href='" . getUrl("ProgramaNivel", "ProgramaNivel", "getEditar", array("id" => $pn['pro_niv_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`ProgramaNivel`," . $pn['pro_niv_id'] . ",`" . $pn['pro_niv_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>