<?php
if(!isset($_POST['perfil'])){
    echo "<h2 style='font-size: 1.3em'>Hola bienvenido al panel de tareas selecciona uno de los perfiles para comenzar.</h2>";
}else if (!isset($_POST['Pregutar_Delete'])){
    session_start();
    $Id_user = $_SESSION['ID'];
    include_once 'Plantailla_Tareas.php'; 
}else{
    echo "<h2 style='font-size: 1.3em'>Hola bienvenido al panel de tareas selecciona uno de los perfiles para comenzar.</h2>";
}
