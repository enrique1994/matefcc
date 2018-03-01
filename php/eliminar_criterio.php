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
$eva=$_GET['var'];


      $stmt = $DB_con->prepare("DELETE from evaluacion where id=:criterio");
      $stmt->bindParam(":criterio",$eva);

      
        if($stmt->execute())
        {
 echo '<script language="javascript">alert("Criterio eliminado correctamente")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
        }
        else
        {
          echo "No se puede ejecutar !";
        }

?>