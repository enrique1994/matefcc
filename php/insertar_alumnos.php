<?php

  $con=mysqli_connect("us-cdbr-azure-southcentral-f.cloudapp.net","b9a859ae739783","903a2e5b","matefcc");   
//	$con=mysqli_connect("localhost","root","","seguimiento_academico");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$nrc= $_POST['nrc'];
$sql = "SELECT * FROM curso where nrc=$nrc";
$result = mysqli_query($con, $sql);
$prof = mysqli_fetch_assoc($result);

	if(isset($_POST['matriculas'])) {
    $json = $_POST['matriculas'];
   // print_r($json);
   $error = false;

      foreach($json as $item) {


       if(!mysqli_query($con,"INSERT INTO inscripcion (id_curso, id_alumno) VALUES ($nrc,'".$item['matricula']."')")){
           $error = true; //error
       }
       for ($i=1; $i <=3 ; $i++) { 
         # code...
       if(!mysqli_query($con,"INSERT INTO parcial (id_curso_parcial,num_p,matricula) VALUES ($nrc,$i,'".$item['matricula']."')")){
           $error = true; //error
       }
       print $prof['id_profesor'];
      /* $crit="Examen";
       if(!mysqli_query($con,"INSERT INTO criterios_evaluacion (nrc_curso,id_profesor,descripcion,porcentaje,evaluado,id_parcial_cri)  VALUES  ($nrc,'201221663',$crit,'50','1','$i')")){
           $error = true; //error
       }
       else{
        echo "Si se pudo";
       }
       */
  /*     for ($j=0; $j <10 ; $j++) { 
         # code...
       $crit="Ejercicio";
       if(!mysqli_query($con,"INSERT INTO criterios_evaluacion (nrc_curso,id_profesor,descripcion,porcentaje,evaluado,id_parcial_cri)  VALUES  ($nrc,'".$prof['id_profesor']."',$crit,50,1,$i)")){
           $error = true; //error
       }

       }
*/
}

    }
    if($error){
        echo 0; //error
    }else echo 1;


mysqli_close($con);
  } else {
    echo "Error post";
  }

?>