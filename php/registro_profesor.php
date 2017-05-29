<?php
	
	require_once 'conexion.php';

	if($_POST)
	{
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $num_cub = $_POST['num_cub'];
        $ext_tel = $_POST['ext_tel'];    
		
		//$newpassword = md5($password);
		$profesor->registrar($id,$nombre,$paterno,$materno,$correo,$password,$num_cub,$ext_tel);
	    //if($propietario->register($email,$newpassword,$nombre,$apellidop,$apellidom,$direccion,$cp)){
        //   echo "bien";
        //}else
          //  echo "error query";
	}else
        echo "sin post";

?>