<?php
foreach ($noticia as $not) {
    echo "<td>" . $not['not_titulo'] . "</td>";
    echo "<td>" . $not['not_descripcion'] . "</td>";
    echo "<td>" . $not['not_fecha'] . "</td>";
    echo "<td>" . $not['not_tip_nombre'] . "</td>";
    echo "<td>" . $not['usu_nombres'] . "</td>";
    echo "<td>" . $not['est_nombre'] . "</td>";
    echo "<td><a href='" . getUrl("Noticia", "Noticia", "getEditar", array("id" => $not['not_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
    echo "<td><button type='button' onclick='pasarPk(`Noticia`," . $not['not_id'] . ",`" . $not['not_descripcion'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
    echo "</tr>";
}
