<?php
if(!isset($_SESSION)){
session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Letras-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>Login - WebClear</title>
</head>
<style>
    body{
        padding-top: 10vh;
        margin: 0%;
        background: #6a11cb;  
        display: flex;
        align-items: center;      
    }
    .Lema{
        width: 60%;
        height: 100vh;
        position: relative;
        overflow: hidden;
        background: url(IMG/Figuras.jpg) no-repeat 50% 50% fixed;
        background-size: cover;
        overflow: hidden;
    }
    .Ola{
        position: absolute;
        right: -10%;
        top: 0%;
        width: 80%;
        transform: rotate(180deg);
    }
    .Letras{
        width: 74%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .Letras>h2{
        color: rgb(91, 197, 246);
        text-shadow: -7px 0px black;
        margin: 0px 0px 0px;
        padding: 2%;
        font-family: 'Secular One', sans-serif;
        font-size: 5em; 
        text-align: center;
    }

    .Login{
        width: 19vw ;
        padding-left: 4%;
        padding-right: 4%;
        padding-bottom: 2%;
        height: auto;
        background: transparent;
        border: 2px solid white;
        border-radius: 10px;
        display: flex;
        justify-content: space-evenly;
        flex-direction: column;
        color: white;
    }

    .Formulario{
        padding: 1%;
        width: 100%;
        background: transparent;
        outline: none;
        border: none;
        border-bottom: 2px solid white;
        color: white;
        padding-bottom: 3%;
    }
    
    .Enviar{
        margin-top: 0%;
        background: #3a0772;
        color: white;
        padding: 4%;
        cursor: pointer;
        border-radius: 15px;
        border: none;
    }

    a{
        color: white;
    }

    ::placeholder{
        color: white;
    }

    h4{
        font-family: 'Raleway', sans-serif;
        font-weight: 400;
    }

    .User_msj{
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
        font-size: 11px;
        color: red;
    }

</style>
<body>
<?php include_once 'Menu.php'  ?>

<div class="Lema">
<div class="Letras">
<h2>Es hora de tener un mejor hogar</h2>
</div>
<div style="height: 100%; overflow: hidden;" class="Ola" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M208.08,0.00 C152.69,67.09 262.02,75.98 200.80,150.00 L0.00,150.00 L0.00,0.00 Z" style="stroke: none; fill: #6a11cb;"></path></svg></div>
</div>
<div class="Login">
    <h2 style="font-family: 'Secular One', sans-serif; text-align: center;">
    LOGUEATE</h2>
    <div style="margin-top: 0%;">
    <form action="User_index.php" method="POST">
        <?php

        if(isset($Error_log)){
            echo $Error_log;
        }

        ?>
    <h4>Ingrese su usuario:</h4>
    <input type="text" class="Formulario" id="Formulario_01" name="Usuario"  placeholder="User_01">

    </div>
    <div style="margin-top: 10%;">
        <h4>Ingrese su contraseña:</h4>        
    <input type="password" class="Formulario" id="Formulario_02" name="Contraseña" placeholder="*********">

    </div>
    <div style="padding-top: 6%; padding-bottom: 6%;">
        <h5 style="font-family: 'Raleway', sans-serif; font-weight: 300;">
        En caso no cuentes con una <a href="Registrate.php">cuenta</a> , te la puedes crear
        ahora mismo. </h5>
    </div>
    <input type="submit" value="Ingresar"  class="Enviar">
    </form>
</div>
</body>
</html>