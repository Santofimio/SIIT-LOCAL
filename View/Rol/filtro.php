<?php
    foreach ($Rol as $rl) {

        echo "<td>" . $rl['rol_nombre'] . "</td>";
        echo "<td><a href='" . getUrl("Rol", "Rol", "getEditar", array("id" => $rl['rol_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
        echo "<td><button type='button' onclick='pasarPk(`Rol`," . $rl['rol_id'] . ",`" . $rl['rol_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
        echo "</tr>";
    }
?>