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
$nrc=$_POST['nrc'];
//echo $nrc;
$descripcion=$_POST['descripcion'];
$porcentaje=$_POST['porcentaje'];

      $stmt = $DB_con->prepare("INSERT INTO criterios_evaluacion(nrc_curso,id_profesor,descripcion,porcentaje) VALUES(:nrc_curso,:id_profesor,:descripcion,:porcentaje)");
      $stmt->bindParam(":nrc_curso",$nrc);
      $stmt->bindParam("id_profesor",$user_id);
      $stmt->bindParam("descripcion",$descripcion);
      $stmt->bindParam("porcentaje",$porcentaje);
      
        if($stmt->execute())
        {
 echo '<script language="javascript">alert("Criterio insertado correctamente")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
        }
        else
        {
          echo "No se puede ejecutar !";
        }

?>