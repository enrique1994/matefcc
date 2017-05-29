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

$stmt2 = $DB_con->prepare("SELECT * FROM evaluacion ");
$stmt2->execute();
$cc=$stmt2->rowCount();
$cuenta=0;
$hola=$_POST;
//echo $hola[24];

foreach ($hola as $i => $value) {
	echo $i."<br>";
if($value>=0 && $value<=10){
$stmt1 = $DB_con->prepare("UPDATE evaluacion set calif=:calif WHERE id=:id");
$stmt1->bindParam(":calif",$value);
$stmt1->bindParam(":id",$i);
$stmt1->execute();
}else{
	$cuenta+=1;

}


}
for ($i=1; $i<=$cc ; $i++) { 
/*$stmt1 = $DB_con->prepare("UPDATE evaluacion set calif=:calif WHERE id=:id");
$ind=(string)$_POST[$i];

if($ind<=10 && $ind>=0){
}else{
	$cuenta+=1;

}

*/
echo $i."<br>";
}

if($cuenta>0)
{
echo '<script language="javascript">alert("Algunas calificaciones no se subieron con exito por no estar dentro del rango de 0 a 10")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
}
else
{
echo '<script language="javascript">alert("Calificaciones subidas correctamente")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
}

?>