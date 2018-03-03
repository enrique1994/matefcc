<?php
include_once '../php/conexion.php';
if(!$alumno->is_loggedin())
{
 $alumno->redirect('../index.html');
}
$user_id = $_SESSION['user_session'];
$cuenta=0;
//echo $hola[24];

$calif=$_POST['calif'];
$min=localtime()[1];
$stmt2 = $DB_con->prepare("SELECT * FROM evaluacion where id=:id and $min<=hora+20");
$stmt2->execute();
$cc=$stmt2->rowCount();
if ($cc>0) {
$stmt1 = $DB_con->prepare("UPDATE evaluacion set calif=$calif/maximo_ejer*10, num_ejer=:calif, hora=0 WHERE id=:id");
$stmt1->bindParam(":calif",$_POST['calif']);
$stmt1->bindParam(":id",$_POST['id']);



        if($stmt1->execute())
        {
echo '<script language="javascript">alert("Calificacion subida correctamente")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/ver_cursos.php" ;</script>'; 
        }
        else
        {
          echo "No se puede ejecutar !";
        }
	#
}else
{
echo '<script language="javascript">alert("Limite de tiempo sobrepasado")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/ver_cursos.php" ;</script>'; 

}



?>