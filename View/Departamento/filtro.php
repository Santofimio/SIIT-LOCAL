<?php
    foreach ($departamento as $dep) {

        echo "<td>" . $dep['dep_nombre'] . "</td>";
        echo "<td><a href='" . getUrl("Departamento", "Departamento", "getEditar", array("id" => $dep['dep_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
        echo "<td><button type='button' onclick='pasarPk(`Departamento`," . $dep['dep_id'] . ",`" . $dep['dep_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
        echo "</tr>";
    }
?>