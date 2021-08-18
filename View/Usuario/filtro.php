<?php
foreach ($usuario as $usu) {

    echo "<td>" . $usu['usu_nombres'] . "</td>";
    echo "<td>" . $usu['usu_apellidos'] . "</td>";
    echo "<td>" . $usu['usu_correo'] . "</td>";
    echo "<td>" . $usu['usu_num_doc'] . "</td>";
    echo "<td>" . $usu['tip_doc_nombre'] . "</td>";
    echo "<td>" . $usu['rol_nombre'] . "</td>";
    echo "<td>" . $usu['est_nombre'] . "</td>";
    echo "<td><a href='" . getUrl("Usuario", "Usuario", "getEditar", array("id" => $usu['usu_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
    echo "<td><button type='button' onclick='pasarPk(`Usuario`," . $usu['usu_id'] . ",`" . $usu['usu_nombres'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
    echo "</tr>";
}
?>