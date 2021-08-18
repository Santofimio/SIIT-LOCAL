<?php
    foreach ($tipo_pqrsf as $tp) {

        echo "<td>" . $tp['pqr_tip_nombre'] . "</td>";
        echo "<td><a href='" . getUrl("PqrsfTipo", "PqrsfTipo", "getEditar", array("id" => $tp['pqr_tip_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
        echo "<td><button type='button' onclick='pasarPk(`PqrsfTipo`," . $tp['pqr_tip_id'] . ",`" . $tp['pqr_tip_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
        echo "</tr>";
    }
?>