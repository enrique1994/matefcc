<?php
	
	require_once 'conexion.php';

	if($_POST)
	{	$id = $_POST['id'];
		$nrc = $_POST['nrc'];
		//echo $nrc;
		$materia = $_POST['materia'];
		//echo $materia;
		$seccion = $_POST['seccion'];
		//echo $seccion;
		$dias = $_POST['dias'];
		$dias=explode("-",$dias);
		//echo $dias[0];
		$dia1=$_POST['dia1'];
		//echo $dia1;
		$dia2=$_POST['dia2'];
		//echo $dia2;
		$dia3=$_POST['dia3'];
		//echo $dia3;	
		$hora=$_POST['hora'];	
		//echo $hora;
		$periodo=$_POST['periodo'];
		$per=explode("-",$periodo);
		//echo $per[1];
		$fecha=$_POST['fecha'];
		//echo $fecha;
		$fecha2=$_POST['fecha2'];
		//echo $fecha2;

		//$newpassword = md5($password);
		$profesor->registrar_curso($id,$nrc,$materia,$seccion,$dias,$hora,$periodo,$fecha,$fecha2,$dia1,$dia2,$dia3);
	    //if($propietario->register($email,$newpassword,$nombre,$apellidop,$apellidom,$direccion,$cp)){
        //   echo "bien";
        //}else
          //  echo "error query";
	}else
        echo "sin post";

?>