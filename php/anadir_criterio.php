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
$id=$_GET['id'];


$stmt1 = $DB_con->prepare("SELECT * FROM criterios_evaluacion WHERE id=:id");
$stmt1->execute(array(":id"=>$id));
$cri=$stmt1->fetch(PDO::FETCH_ASSOC);

$curso=$cri['nrc_curso'];

$stmt2 = $DB_con->prepare("SELECT * FROM inscripcion WHERE id_curso=:id_curso");
$stmt2->execute(array(":id_curso"=>$curso));
while ($alu=$stmt2->fetch(PDO::FETCH_ASSOC)) {
	$est=$alu['id_alumno']."<br>";


      if ($cri['evaluado']==1) {
        $ej=$_POST['porcentaje'];
              $stmt3 = $DB_con->prepare("INSERT INTO evaluacion(nrc_curso,id_criterios,id_alumno,hora,maximo_ejer) VALUES(:nrc_curso,:id_criterios,:id_alumno,:hora,:ej)");
      $stmt3->bindParam(":nrc_curso",$curso);
      $stmt3->bindParam(":id_criterios",$id);
      $stmt3->bindParam(":id_alumno",$est);
      $stmt3->bindParam(":hora", localtime()[1]);
      $stmt3->bindParam(":ej",$ej);
        if($stmt3->execute())
        {
 echo '<script language="javascript">alert("Criterio de evaluacion insertado")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
        }
        else
        {
          echo "No se puede ejecutar !";
        }
      }else{
      $stmt3 = $DB_con->prepare("INSERT INTO evaluacion(nrc_curso,id_criterios,id_alumno,maximo_ejer) VALUES(:nrc_curso,:id_criterios,:id_alumno,10)");
      $stmt3->bindParam(":nrc_curso",$curso);
      $stmt3->bindParam(":id_criterios",$id);
      $stmt3->bindParam(":id_alumno",$est);
      
        if($stmt3->execute())
        {
 echo '<script language="javascript">alert("Criterio de evaluacion insertado")</script>'; 
echo '<script language="javascript">window.location.href="../vistas/cursos.php" ;</script>'; 
        }
        else
        {
          echo "No se puede ejecutar !";
        }
}
}


 ?>