<?php
	foreach ($pqrsf as $pq) {

	   	echo "<td>".$pq['pqr_tip_nombre']."</td>";
		echo "<td>".$pq['pqr_fecha']."</td>";
		echo "<td>".$pq['pqr_email']."</td>";
		echo "<td>".$pq['pqr_apellidos']."</td>";
		echo "<td>".$pq['rol_nombre']."</td>";
		echo "<td>".$pq['est_nombre']."</td>";

		echo "<td><a href='".getUrl("Pqrsf","Pqrsf","getResponder", array("id"=>$pq['pqr_id']))."'><button type='button' class='btn btn-primary'>Visualizar</button></a></td>";

		echo "<td><a href='".getUrl("Pqrsf", "Pqrsf", "Responder", array("id"=>$pq['pqr_id']))."'><button type='button' class='btn btn-warning'>Responder</button></a></td>";
	}
?>