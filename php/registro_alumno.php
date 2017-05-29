<?php
	
	require_once 'conexion.php';

	if($_POST)
	{
		$matricula = $_POST['matricula'];
		$nombre = $_POST['nombre'];
		$paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $celular = $_POST['celular'];
        $prog_edu = $_POST['prog_edu'];        
    
		
		//$newpassword = md5($password);
		$alumno->registrar($matricula,$nombre,$paterno,$materno,$email,$password,$celular,$prog_edu);
	    //if($propietario->register($email,$newpassword,$nombre,$apellidop,$apellidom,$direccion,$cp)){
        //   echo "bien";
        //}else
          //  echo "error query";
	}else
        echo "sin post";

?>