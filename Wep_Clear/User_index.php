<?php
include_once 'User.php';
include_once 'User_session.php';

$User_session = new UserSession();
$User = new User();


if(isset($_SESSION['user'])){
    $User->Usuario_registrado($User_session->getCurrectUser());
    include_once 'User_inicio.php';
    $Ingrezar = true;
}
else if(isset($_POST['Usuario']) && isset($_POST['Contraseña'])){
    
    $userForm = $_POST['Usuario'];
    $passForm = $_POST['Contraseña'];

    if($User->User_Exists($userForm, $passForm)){
        $User_session->setCurrentUser($userForm);   
        $User->Usuario_registrado($userForm);
        include_once 'User_inicio.php';
        $Ingrezar = true;
    }else{
        $Error_log = "Nombre de usuario y/o invalido";
        include_once 'Login.php';
        $Ingrezar = false;
    }

}else{
    header("Location: Login.php");
    $Ingrezar = false;
}
?>

<script>
    //Evita que se pueda reenviar una respuesta
    if(window.history.replaceState){
        console.log("Resupuesta registrada")
        window.history.replaceState(null, null, window.location.href)
    }
</script>