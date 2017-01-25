<?php
	
	require_once 'conexion.php';

	if($_POST)
	{
		$matricula = $_POST['matricula'];
		$nombre = $_POST['nombre'];
		$paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
    
		
		//$newpassword = md5($password);
		$alumno->registrar($matricula,$nombre,$paterno,$materno,$correo,$password);
	    //if($propietario->register($email,$newpassword,$nombre,$apellidop,$apellidom,$direccion,$cp)){
        //   echo "bien";
        //}else
          //  echo "error query";
	}else
        echo "sin post";

?>