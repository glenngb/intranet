
<?php

include_once ('includes/bd_coneccion.php');
//Código para eliminar un administradores
/*****************************************/
if($_POST['registro'] == "eliminar" ){ //Si existe.

    $id = (int) $_POST['id'];

    try {
        
        $stmt = $coneccion->prepare(' DELETE FROM administradores WHERE id = ? ');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if($stmt->affected_rows){

            $respuesta = array(
                'mensaje' => 'correcto',
                'id_eliminado' => $id
            );

        } else{

            $respuesta = array(
                'mensaje' => 'Hubo un error'
            );
        }

        $stmt->close();
        $coneccion->close();

    } catch(Exception $e){

        $respuesta = array(
            'mensaje' => $e->getMessage()
        );

    }

    die(json_encode($respuesta));
}





