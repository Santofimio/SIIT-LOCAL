<?php
                        foreach ($resultados_aprendizaje as $ra) {

                            echo "<td>" . $ra['res_apr_descripcion'] . "</td>";
                            echo "<td>" . $ra['com_descripcion'] . "</td>";
                            echo "<td><a href='" . getUrl("ResultadosAprendizaje", "ResultadosAprendizaje", "getEditar", array("id" => $ra['res_apr_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`ResultadosAprendizaje`," . $ra['res_apr_id'] . ",`" . $ra['res_apr_descripcion'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>