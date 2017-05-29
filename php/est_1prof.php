<?php
	
	require_once 'conexion.php';

	if($_POST)
	{
		$id = $_POST['id'];
		$periodo= $_POST['periodo'];
		$year = $_POST['year'];   
		
		$profesor->getNRCPY($id,$periodo,$year);
	
	}else
        echo "sin post";

?>