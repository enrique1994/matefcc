<?php
	
	require_once 'conexion.php';

	if($_POST)
	{
        $id = $_POST['id'];
		$nrc = $_POST['nrc'];  
		
		$profesor->getAVG($id,$nrc);
	
	}else
        echo "sin post";

?>