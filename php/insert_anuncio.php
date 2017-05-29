<?php
include_once 'conexion.php';
$data = json_decode(file_get_contents("php://input"));
date_default_timezone_set('America/Mexico_City');
$fecha = date('Y-m-d H:i:s', time());
//$fecha = new DateTime($data->fecha_final);
//$fecha = $fecha->format('Y-m-d');
$sql = "INSERT into anuncio(id_curso, descripcion,destino,fecha_final)
values ('$data->id_curso', '$data->descripcion', 0, '$fecha')";
$DB_con->exec($sql);
echo true;
?>