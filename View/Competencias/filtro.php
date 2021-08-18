<?php
                        foreach ($competencias as $com) {

                            echo "<td>" . $com['com_descripcion'] . "</td>";
                            echo "<td><a href='" . getUrl("Competencias", "Competencias", "getEditar", array("id" => $com['com_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`Competencias`," . $com['com_id'] . ",`" . $com['com_descripcion'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>