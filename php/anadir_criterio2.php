<?php
include_once '../php/conexion.php';
if(!$profesor->is_loggedin())
{
 $profesor->redirect('../index.html');
}


      echo $_POST;
      $stmt3 = $DB_con->prepare("UPDATE  evaluacion SET maximo_ejer=:ej, titulo=:titulo where id=:id");
      $stmt3->bindParam(":id",$_POST['id']);
      $stmt3->bindParam(":titulo",$_POST['titulo']);
      $stmt3->bindParam(":ej",$_POST['porcentaje']);
        if($stmt3->execute())
        {
 echo '<script language="javascript">alert("Sub criterio de evaluacion actualizado")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
        }
        else
        {
          echo "No se puede ejecutar !";
        }




 ?>