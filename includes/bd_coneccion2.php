<?php 
	$coneccion = new mysqli('localhost','root','Root.1234-','intranet');
if($coneccion->connect_error){
        echo $error -> $coneccion->connect_error;
    }

?>