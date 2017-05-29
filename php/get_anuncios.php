<?php
include_once 'conexion.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$sql = "SELECT * FROM anuncio
		 where id_curso = :id";
$query = $DB_con->prepare($sql);
$query->bindParam(':id', $_GET["id_curso"], PDO::PARAM_STR);
$query->execute();
$arr = array();
while($res = $query->fetch(PDO::FETCH_ASSOC)){
	$arr[] = $res;
}
$salida = json_encode($arr);
$salida = '{"records":'.$salida.'}';
echo $salida;
?>