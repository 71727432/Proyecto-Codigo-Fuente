<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Texos-->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">

    <title>Registrate - WepClear</title>
</head>
    <style>
        body{
            background: url(IMG/Fondo_Geometrico.png) no-repeat 50% 50% fixed;
            background-size: cover;
            margin: 0%;
            display: flex;
            justify-content: space-between;
            padding-top: 10vh;
        }
        .Titular{
            height: 100vh;
            width: 30%;
            background: #6a11cb;
            position: relative;
            right: 0%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .ola{
            position: absolute;
            right: 100%;
            height: 100%;
            width: 30%;
        }

        .Lema{
            font-size: 5vw;
            font-family: 'Secular One', sans-serif;    
            padding-left: 4%;
            padding-right: 4%;
        }
        .Registro{
            background: rgba(56,6,121,255);
            width: 30%;
            border: 5px solid #6a11cb;
            height: 40%;
            margin-left: 10%;
            padding-left: 4%;
            padding-right: 4%;
            margin-top: 5%;
            color: white;
            border-radius: 30px;
            padding-bottom: 3%;
            padding-top: 2%;
        }
        .Conentenedor_1{
            display: flex;
            justify-content: space-between;
        }
        .Formulario{
            display: flex;
            width: 43%;
            justify-content: center;
            flex-direction: column;
        }
        .Formulario>h3{
            margin: 20px 0px 0px 0px;
        }
        .Formulario>input{
            background: transparent;
            outline: none;
            border: 1px solid white;
            padding: 2%;
            padding-top: 3%;
            padding-bottom: 3%;
            margin-bottom: 5%;
            color: white;
            width: 94%;
            margin-top: 8%;
        }

        .Conentenedor_2>input{
            width: 96%;
            background: transparent;
            border: none;
            outline: none;
            border: 1px solid white;
            padding: 1%;
            color: white;
        }

        .Enviar{
            width: 100%;
            margin-top: 8%;
            padding-top: 2%;
            padding-bottom: 2%;
            cursor: pointer;
            background: #6a11cb;
            color: white;
            border: none;
        }

        h3{
            font-family: 'Raleway', sans-serif;
            font-weight: 400;
            font-size: 0.9em;
        }

        .Texto_plt{
            text-align: justify;
            font-size: 0.78em;
            margin-top: 5%;
            font-family: 'Raleway', sans-serif;

        }

        .Error_rg{
            background: tomato;
            border: 2px solid red;
            color: black;
            padding: 2%; 
            margin-top: 5%;
        }

        .Exito_rg{
            background: yellowgreen;
            border: 2px solid green;
            color: black;
            padding: 2%;
            margin-top: 5%;
        }

    </style>
<body>
<?php include_once 'Menu.php'  ?>

<div class="Registro">
<h2 style="margin: 0px 0px 0px; font-family: 'Secular One', sans-serif;">REGISTRO</h2>
<hr style="border: 1.3px solid white; border-radius: 15px;">
    <form style="flex-direction: column;" action="Registrate.php" method="POST">
    <?php
    $Nombre = "";
    $Apellido = "";
    $Usuario = "";
    $Contraseña = "";
    $Correo = "";
    $Acepto = array();
    if(isset($_POST["Nombre"])){
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $Usuario = $_POST["Usuario"];
        $Contraseña = $_POST["Contraseña"];
        $Correo = $_POST["Correo"];

        if(isset($_POST["Acepto"])){
            $Acepto = $_POST["Acepto"];
        }else{$Acepto = [];}
    
        $Errores = array();
        if($Nombre == ""){
            array_push($Errores, "El campo nombre se encuentra vacio");
        }
        if($Apellido == ""){
            array_push($Errores, "El campo apellido se encuentra vacio");
        }
        if($Usuario == ""){
            array_push($Errores, "El campo usuario se encuentra vacio");
        }
        if($Contraseña == "" || strlen($Contraseña) < 6){
            array_push($Errores, "La contraseña se encuentra vacia o es muy corta");
        }
        if($Correo == ""  || strpos($Correo, "@") == 0){
            array_push($Errores, "Le falta un @ o el campo correo se encuentra vacio");
        }
        if(count($Acepto) == 0){
            array_push($Errores, "Debe aceptar las condiciones para continuar");
        }
        if(count($Errores) > 0){
            echo "<div class='Error_rg'>ERRORES:<br><br>";
            for($i = 0; $i < count($Errores); $i++){
                echo "<li>$Errores[$i]</li>";
            }
            echo "</div>";
        }else{

            include_once 'User.php';
            $Usuer = new User();

            if($Usuer->Registro_repetido($Usuario, $Contraseña)){
                $Usuer->registrar_user_db($Nombre, $Apellido, $Usuario, $Contraseña, $Correo);
                echo "Felicidade su cuenta fue creada ahora puedes <a href='Login.php'> loguearte </a>";
            }else{
                echo "Su usuario y/o contraseña ya existen";
            }


        }
    }
    ?>
        <main class="Conentenedor_1">
            <div class="Formulario">
                <h3>Ingrese su nombre:</h3>
                <input type="text" type="text" name="Nombre" value="<?php echo $Nombre ?>">
            </div>
            <div class="Formulario">
                <h3>Ingrese su apellido:</h3>
                <input type="text" type="text" name="Apellido" value="<?php echo $Apellido ?>">
            </div>
        </main>

        <main class="Conentenedor_1">
            <div class="Formulario">
                <h3>Ingrese un usuario:</h3>
                <input type="text" type="text" name="Usuario" value="<?php echo $Usuario ?>">
            </div>
            <div class="Formulario">
                <h3>Ingrese una contraseña:</h3>
                <input type="password" name="Contraseña" value="<?php echo $Contraseña ?>">
            </div>
        </main>

        <main class="Conentenedor_2">
            <h3>Ingrese su correo: </h3>
            <input type="email" name="Correo" value="<?php echo $Correo ?>">
        </main>

        <div class="Texto_plt"><input type="checkbox" name="Acepto[]" value="Cnd_si" <?php if(in_array("Cnd_si", $Acepto)) echo "checked"?>>Aceptas que solo utlizaremos tus datos para proporcionar
        una mejor calidad en el uso de esta herramienta</div>

        <input type="submit" value="Crear una cuenta" class="Enviar">
    </form>
</div>

<div class="Titular">
<div style="width: 100%; height: 100vh; display: flex; align-items: center; justify-content: center; word-break: break-all; text-align: center;">
<h1 class="Lema">¡ES HORA <br> DE<br> COMENZAR!</h1>
</div>
<div style="overflow: hidden;" class="ola" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M213.19,0.00 C152.69,70.06 570.03,70.06 202.98,150.00 L500.00,150.00 L500.00,0.00 Z" style="stroke: none; fill: #6a11cb;"></path></svg></div>
</div>

</body>
</html>