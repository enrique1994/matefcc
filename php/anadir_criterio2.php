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

echo $_POST['id'];
echo $_POST['titulo'];
echo $_POST['porcentaje'];
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

}


 ?>