<?php
	
	require_once 'conexion.php';

	if($_POST)
	{
		$id = $_POST['id'];

		$password2 = $_POST['password2'];
  
		
		//$newpassword = md5($password);
		$coordinador->registrar($id,$password2);
	    //if($propietario->register($email,$newpassword,$nombre,$apellidop,$apellidom,$direccion,$cp)){
        //   echo "bien";
        //}else
          //  echo "error query";
	}else
        echo "sin post";

?>