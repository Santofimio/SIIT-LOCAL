<?php
    foreach ($TipoDoc as $tpd) {

        echo "<td>" . $tpd['tip_doc_nombre'] . "</td>";
        echo "<td>" . $tpd['tip_doc_sigla'] . "</td>";
        echo "<td><a href='" . getUrl("TipoDocumento", "TipoDocumento", "getEditar", array("id" => $tpd['tip_doc_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
        echo "<td><button type='button' onclick='pasarPk(`TipoDocumento`," . $tpd['tip_doc_id'] . ",`" . $tpd['tip_doc_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
        echo "</tr>";
    }
?>