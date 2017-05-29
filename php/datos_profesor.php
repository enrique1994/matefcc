<?php
	
	require_once 'conexion.php';

	if($_POST)
	{
		$id = $_POST['id'];
		
		$profesor->getDatos($id);
	    //if($propietario->register($email,$newpassword,$nombre,$apellidop,$apellidom,$direccion,$cp)){
        //   echo "bien";
        //}else
          //  echo "error query";
	}else
        echo "sin post";

?>