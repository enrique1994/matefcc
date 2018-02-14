<?php
$nrc=$_POST['nrc'];

$nrc2=$_POST['nrc2'];
//$codigo=$_POST['codigo'];
//$nombre=$_POST['nombre'];
$seccion=$_POST['seccion'];
$periodo=$_POST['periodo'];
$year=$_POST['year'];

$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = "b9a859ae739783";
$password = "903a2e5b";
$dbname = "matefcc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$con=0;
$sql = "SELECT * FROM curso WHERE nrc= $nrc";
$result = $conn->query($sql);
$row = $result->fetch_array();

$sql = "UPDATE curso set nrc=$nrc2 WHERE nrc=$nrc";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    $con=$con+1;
}


$sql = "UPDATE anuncio set id_curso=$nrc2 WHERE id_curso=$nrc";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    $con=$con+1;
}


$sql = "UPDATE inscripcion set id_curso=$nrc2 WHERE id_curso=$nrc";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    $con=$con+1;
}
$sql = "UPDATE seccion set secc=$seccion where id=$row[2]";
if (mysqli_query($conn, $sql)) {
    $con=$con+1;
} 
$sql = "UPDATE periodo set year=$year where id=$row[4]";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
$con=$con+1;
} 
$sql = "UPDATE periodo set ciclo='$periodo' where id=$row[4]";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    $con=$con+1;
} 


if ($con ==6) {
echo '<script language="javascript">alert("Valores editados correctamente")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
}else{
echo '<script language="javascript">alert("Valores no editados");</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 

}
//header("Location:home.php");

?>