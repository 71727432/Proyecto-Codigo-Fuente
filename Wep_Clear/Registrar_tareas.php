<?php
//PROPIEDADES GLOBALES
session_start();
include_once 'Modificacion_roles.php';
$Mostrar_tr = new Actualizar_perfiles;

if(isset($_POST['Tareas_pendientes'])){
    if(!strpos($Mostrar_tr->Mostrar_tareas_perfiles($_SESSION['ID']), "Perfil_".$_SESSION['Perfil_actual']) && str_word_count($Mostrar_tr->Mostrar_tareas_perfiles($_SESSION['ID'])) > 4){
    $Tarea_integrada =   $Mostrar_tr->Mostrar_tareas_perfiles($_SESSION['ID']) . $_POST['Tareas_pendientes']; 
    $Mostrar_tr->Registro_perfil_adicional($Tarea_integrada, $_SESSION['ID']);
    }else{
    $Verificar = $Mostrar_tr->Mostrar_tareas_perfiles($_SESSION['ID']);
    $Leer_vrf = explode(" ", $Verificar);
    $Tareas_actualizadas = explode(" ", $_POST['Tareas_pendientes']);

    if(strpos($Verificar, "Perfil_".$_SESSION['Perfil_actual'])){
        for($i = 0; $i < count($Leer_vrf); $i++){
            if($Leer_vrf[$i] == "Perfil_".$_SESSION['Perfil_actual']){
                $Leer_vrf[$i + 2] = $Tareas_actualizadas[3];
                $Leer_vrf[$i + 4] = $Tareas_actualizadas[5];
            }
        }
        $Nuevo_string = implode(" ", $Leer_vrf);
    }else{
        $Nuevo_string = $_POST['Tareas_pendientes'];
    }
       
    $Mostrar_tr->Insertar_tarea_perfil($_SESSION['ID'], $Nuevo_string);

    }
}



if(isset($_POST['Nombre_uptd'])){
    $Mostrar_tr->Actualizar_nombre($_SESSION['ID'], $_POST['Nombre_uptd']);
}
if(isset($_POST['Correo_uptd'])){
    $Mostrar_tr->Actualizar_correo($_SESSION['ID'], $_POST['Correo_uptd']);
}
if(isset($_POST['Usuario_uptd'])){
    $Mostrar_tr->Actualizar_usuario($_SESSION['ID'], $_POST['Usuario_uptd']);
}
if(isset($_POST['Contraseña_uptd'])){
    $Mostrar_tr->Actualizar_contraseña($_SESSION['ID'], $_POST['Contraseña_uptd']);
}
?>