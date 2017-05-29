<?php
include_once 'conexion.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$sql = "SELECT inscripcion.*,profesor.*,materia.nombre as materia, periodo.* FROM inscripcion
		inner join curso on inscripcion.id_curso = curso.nrc
		inner join profesor on curso.id_profesor = profesor.id
		inner join materia on curso.id_materia = materia.id
		inner join periodo on curso.periodo = periodo.id
		where inscripcion.id_alumno = :matricula";
$query = $DB_con->prepare($sql);
$query->bindParam(':matricula', $_GET["matricula"], PDO::PARAM_STR);
$query->execute();
$arr = array();
while($res = $query->fetch(PDO::FETCH_ASSOC)){
	$arr[] = $res;
}
$salida = json_encode($arr);
$salida = '{"records":'.$salida.'}';
echo $salida;
?>