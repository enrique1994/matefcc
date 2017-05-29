<?php
	
	require_once 'conexion.php';

	if($_POST)
	{
        $id_alumno = $_POST['id_alumno'];
		 
		
		$alumno->getAnuncios($id_alumno);
	
	}else
        echo "sin post";

?>