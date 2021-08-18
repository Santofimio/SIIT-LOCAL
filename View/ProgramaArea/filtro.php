<?php
                        foreach ($programa_area as $pa) {

                            echo "<td>" . $pa['pro_area_nombre'] . "</td>";
                            echo "<td>" . $pa['lin_tec_nombre'] . "</td>";
                            echo "<td><a href='" . getUrl("ProgramaArea", "ProgramaArea", "getEditar", array("id" => $pa['pro_area_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`ProgramaArea`," . $pa['pro_area_id'] . ",`" . $pa['pro_area_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>