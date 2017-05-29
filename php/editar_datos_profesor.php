<?php
	
	require_once 'conexion.php';

	if($_POST)
	{   
        $id = $_POST['id'];
		$nombre = $_POST['nombre'];
        $paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $num_cub = $_POST['num_cub'];
        $ext_tel = $_POST['ext_tel'];
		
		 $profesor->editarProfesor($id,$nombre,$paterno,$materno,$email,$password,$num_cub,$ext_tel);
        // echo $direccion;
	   // if($casa->editarCasa($idcasa,$direccion,$nhab,$nhue,$nest,$pets)){
         //  echo "bien";
        //}else
        //  echo " error query";
	}else
        echo "sin post";

?>