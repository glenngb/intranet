<?php 
function usuario_autenticado(){
    if(!revisar_usuario()){ //Si no se encuentra el usuario en SESSION.
        header('Location: index.php'); //Redirige al login
        echo "nada aca";
        exit();
}

}
function revisar_usuario(){

    return isset($_SESSION['usuario']); //Revisa que exista el usuario en SESSION.
}



//session_start();
usuario_autenticado();
?>