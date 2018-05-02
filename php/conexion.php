<?php

session_start();

$DB_host = "localhost";
$DB_user = "id5598318_root";
$DB_pass = "wrestlemania";
$DB_name = "id5598318_matecomp";

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