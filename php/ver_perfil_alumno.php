<?php
$mat=$_POST['matricula'];
$nombre=$_POST['nombre'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$email=$_POST['email'];
$pass=$_POST['password'];
$prog=$_POST['prog_edu'];

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

$sql = "UPDATE alumno set nombre='$nombre', paterno='$paterno', materno='$materno',email='$email',password='$pass', prog_edu='$prog' WHERE matricula=$mat";
$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    $con=$con+1;
}


if ($con ==1) {
 echo '<script language="javascript">alert("Valores editados correctamente")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/home_alumno.php" ;</script>'; 
}else{
echo '<script language="javascript">alert("Valores no editados");</script>'; 
echo '<script language="javascript">window.location.href="/vistas/home_alumno.php" ;</script>'; 

}
//header("Location:home.php");

?>