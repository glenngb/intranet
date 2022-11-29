<?php 
	$coneccion = new mysqli('192.168.1.253','root','Root.1234-','punto_venta_prueba');
if($coneccion->connect_error){
        echo $error -> $coneccion->connect_error;
    }

?>