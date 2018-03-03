<?php
include_once '../php/conexion.php';
if(!$alumno->is_loggedin())
{
 $alumno->redirect('../index.html');
}
$user_id = $_SESSION['user_session'];
$cuenta=0;
//echo $hola[24];

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


if($cuenta>0)
{
echo '<script language="javascript">alert("Error al subir la calificacion ")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
}
else
{
echo '<script language="javascript">alert("Calificaciones subidas correctamente")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/ver_cursos.php" ;</script>'; 
}

?>