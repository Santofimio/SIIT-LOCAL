<?php
    foreach ($noticia_tipo as $nt) {

        echo "<td>" . $nt['not_tip_nombre'] . "</td>";
        echo "<td><a href='" . getUrl("NoticiaTipo", "NoticiaTipo", "getEditar", array("id" => $nt['not_tip_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
        echo "<td><button type='button' onclick='pasarPk(`NoticiaTipo`," . $nt['not_tip_id'] . ",`" . $nt['not_tip_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
        echo "</tr>";
    }
?>