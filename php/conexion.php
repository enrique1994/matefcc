<?php

session_start();

$DB_host = "us-cdbr-azure-southcentral-f.cloudapp.net";
$DB_user = "b9a859ae739783";
$DB_pass = "903a2e5b";
$DB_name = "matefcc";

/*
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "seguimiento_academico";
*/try{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
     echo $e->getMessage();
}


include_once 'alumno.php';
include_once 'profesor.php';
include_once 'coordinador.php';
$alumno= new alumno($DB_con);
$profesor= new profesor($DB_con);
$coordinador= new coordinador($DB_con);