<?php
include_once '../php/conexion.php';
if(!$profesor->is_loggedin())
{
 $profesor->redirect('../index.html');
}


$sub=$_GET['id'];
      $stmt3 = $DB_con->prepare("UPDATE  evaluacion SET hora=:hora where id=:id");
      $stmt3->bindParam(":id",$sub);
$stmt3->bindParam(":hora", localtime()[1]);
        if($stmt3->execute())
        {
 echo '<script language="javascript">alert("Sub criterio de evaluacion dado de alta")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
        }
        else
        {
          echo "No se puede ejecutar !";
        }



 ?>