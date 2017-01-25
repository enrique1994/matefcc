<?php

session_start();

$DB_host = "us-cdbr-azure-southcentral-f.cloudapp.net";
$DB_user = "b9a859ae739783";
$DB_pass = "903a2e5b";
$DB_name = "matefcc";

try
{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}


include_once 'alumno.php';
$alumno= new alumno($DB_con);