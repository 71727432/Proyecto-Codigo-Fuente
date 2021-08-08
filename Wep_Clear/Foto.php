<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap" rel="stylesheet">
    <title>WepClear-Foto</title>
</head>
    <?php


    ?>
    <style>
        body{
            margin: 0px;
            padding: 0px;
            padding-top: 10vh;
            background: url(IMG/Fondo_foto.png) 50% 50% no-repeat fixed;
            background-size: cover;
        }

        .saludo{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .saludo>h3{
            text-align: left;
            font-family: 'Raleway', sans-serif;     
            font-size: 1.3rem;
            font-weight: 400;
        }

        .Saludo_letra{
            font-family: 'Raleway', sans-serif;     
            font-size: 3.2rem;
        }

        .Contenido_principal{
            width: 100%;
            height: 65vh;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        

        .perfi_Anterior{
            width: 35%;
            height: 85%;
            background: rgb(200, 198, 206);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .cargar{
            width: 50%;
            height: 85%;
            background: rgb(200, 198, 206);
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .Foto_actual{
            width: 60%;
            height: 70%;
            background: <?php 
             if($_SESSION['Formato_foto'] != "No tiene"){
                echo "url(data:" .$_SESSION['Formato_foto'] . ";base64," . base64_encode($_SESSION['Foto']) .") 50% 50% no-repeat ";
                }else{
                echo  "url(Fotos/User_undefined.png) 50% 50% no-repeat";
                }
            ?>;
            background-size: cover;
            margin-bottom: 5%;
        }

        .Mensaje_foto{
            font-family: 'Raleway', sans-serif;     
            font-size: 1.4rem; 
            font-weight: 400;
        }

        .Boton_actualizar{
            padding: 2%;
            padding-left: 4%;
            padding-right: 4%;
            cursor: pointer;
            background: rgb(101, 40, 243) ;
            border: none;
            color: white;
        }

        .subir{
            margin: auto;
            width: 80%;
            height: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: rgb(216, 216, 216);
        }

        .subir>h3{
            font-family: 'Raleway', sans-serif;     
            font-size: 17px;
            font-weight: 400;
            width: 100%;
            height: 30%;
            margin-top: 0%;
            margin-bottom: 0%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 4%;
        }

        
        #Subir_foto{
            display: none;
        }

        form{
            width: 100%;
            height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 3%;
        }

        #Boton_foto{
            padding: 2%;
            cursor: pointer;
            color: white;
            background: rgb(101, 40, 243);
        }

        .Subir_Archivos{
            cursor: pointer;
            padding-top: 1%;
            padding-bottom: 1%;
            padding-left: 3%;
            padding-right: 3%;
            background: rgb(101, 40, 243);
            border: none;
            color: white;
            border-radius: 15px;
            margin-right: 0px;
        }

        .Contenedor_enviar{
            width: 80%;
            margin-bottom: 5%;
            display: flex;
            justify-content: space-between;
            font-family: 'Raleway', sans-serif;     
            font-size: 1.2vw;
        }

        .recordatorio{
            width: 50%;
        }

    </style>
<body>
    <?php include_once 'Menu.php'  ?>



    <div class="saludo">
        <h1 class="Saludo_letra">Hola <?php  echo $_SESSION['user']?>, </h1>&nbsp;&nbsp;
        <h3>puedes comenzar seleccionando<br> una nueva foto.</h3>
    </div>

    <div class="Contenido_principal"> 
        <div class="perfi_Anterior"><h2 class="Mensaje_foto">Previsualizacion de su foto:</h2><div class="Foto_actual" id="Contenedor_foto"></div></div>
        <div class="cargar"> <div class="subir"><h3>Coloque aqui su nueva foto:</h3><form action="Foto.php" method="POST"  enctype="multipart/form-data" id="Enviar_foto" > <input type="file" name="uploadedfile" id="Subir_foto" accept=".jpg,.png,.jpeg" required> <label for="Subir_foto" id="Boton_foto">Selecciona tu archivo <i class="fas fa-image"></i></label></form> </div>
    <div class="Contenedor_enviar">   
        <input type="button" value="Subir la foto seleccionada" class="Subir_Archivos" onclick="Enviar_form_foto()"> 
        <div class="recordatorio" id="recordatorio_2">

   

            <?php
            if(isset($_FILES['uploadedfile'])){
            print_r($_FILES['Fotos/User_undefined.png']);
            $Directorio = "Fotos/";
            $Nombre_archivo = basename($_FILES['uploadedfile']['name']);
            $Envio = $Directorio . $Nombre_archivo;                        
            $imagen_subida = fopen($_FILES['uploadedfile']['tmp_name'], 'r');
            $Tamaño_imagen = $_FILES['uploadedfile']['size'];
            $Formato_foto = $_FILES['uploadedfile']['type'];
            $Enviar_data_base = fread($imagen_subida, $Tamaño_imagen);
            
            if($Nombre_archivo == "Fotos/"){
                echo "No subiste ningun archivo, la operacion fue cancelada";
            }else{
                move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $Envio);
                include_once 'User.php';
                $Registro = new User;
                $Registro->Actualizar_Foto($_SESSION['ID'], $Enviar_data_base,$Formato_foto );
                echo "Su foto fue subida con exito, reinicie session para poder verla.";
            }
            }else{
               echo "Sube algun archivo para continuar con el cambio.";
            }
            ?>
        </div>
    </div>
    </div>
        </div>

</body>
    <script>
    document.getElementById("Subir_foto").onchange=function(e){
        let Leer_IMG = new FileReader(); //Objeto para almacenar la imagen
        Leer_IMG.readAsDataURL(e.target.files[0]);
        Leer_IMG.onload=function(){
            let visualizar = document.getElementById("Contenedor_foto");
            image=document.createElement('img')
            document.getElementById("Contenedor_foto").style.background = "url("+ Leer_IMG.result + ") 50% 50% no-repeat";
            document.getElementById("Contenedor_foto").style.backgroundSize = "Cover";

            visualizar.innerHTML = '';
            document.getElementById("recordatorio_2").innerHTML = "Su imagen se proceso con exito y esta lista para subirse"

            visualizar.append(image)
        }
    }

    function Enviar_form_foto() 
    { 
       var Formulario = document.getElementById("Enviar_foto")
       Formulario.submit();
     }


    </script>
</html>