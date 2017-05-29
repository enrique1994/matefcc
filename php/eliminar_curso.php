<?php
include_once '../php/conexion.php';
if(!$profesor->is_loggedin())
{
 $profesor->redirect('../index.html');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM profesor WHERE id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$v1=$_GET['a'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seguimiento_academico";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM curso WHERE nrc= $v1";
$result = $conn->query($sql);
$row = $result->fetch_array();




$sql = "DELETE FROM periodo WHERE id= $row[4]";
$result = $conn->query($sql);


$sql = "DELETE FROM seccion WHERE id= $row[2]";
$result = $conn->query($sql);

$sql = "DELETE FROM horarios WHERE nrc_curso= $v1";
$result = $conn->query($sql);

$sql = "DELETE FROM inscrpcion WHERE id_curso= $v1";
$result = $conn->query($sql);

$sql = "DELETE FROM curso WHERE nrc= $v1";
$result = $conn->query($sql);

header("Location:../vistas/cursos.php");

?>

