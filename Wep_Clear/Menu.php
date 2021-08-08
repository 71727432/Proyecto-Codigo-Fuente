<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
    <style>

        




        .ICONOS_MENU {
            padding-left: 0px !important;
        }

        ol, ul {
            margin-top: 0 !important;
            margin-bottom: 0px !important;
        }

        label{
            margin-bottom: 0px !important;
        }
        .menu{
            top: 0% !important;
            width: 100% !important;
            position: fixed !important;
            height: 10% !important;
            background: rgb(101, 40, 243) !important;
            z-index: 10 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            
        }

        a{
            text-decoration: none !important;
        }

        .Secc_menu{
            display: flex !important;
            list-style: none !important;
            width: 56% !important;
            height: 100% !important;
            cursor: pointer !important;
            padding-right: 0% !important;
            padding-bottom: 0% !important;
        }

        .Secc_menu>a{
            width: 25% !important;
            height: 100% !important;
            text-decoration: none !important;
        }

        .seccioones{
            font-family: 'Raleway', sans-serif !important;
            font-weight: 400 !important;
            width: 100% !important;
            height: 100% !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            color: white !important;
            transition: 0.9s !important;
        }

        .seccioones:hover{
            background: white !important;
            color: black !important;
        }

        .User_lg{
            color: white !important;
            padding-left: 2.6% !important;
            padding-right: 2.1% !important;
            height: 66% !important;
            border-radius: 3rem !important;
            display: flex !important;
            align-items: center !important;
            border: 1px solid white !important;
            cursor: pointer !important;
            margin-right: 2% !important;
            transition: 0.9s !important;
            position: relative !important;
        }

        .User_lg:hover{
            background: white !important;
            color: black !important;
        }

        .User_lg:hover .options{
            display: block !important;
        }
        
        .foto{
            border-radius: 50% !important;
            width: 2vw !important;
            height: 2vw !important;
            background: <?php if($_SESSION['Formato_foto'] != "No tiene"){
            echo "url(data:" .$_SESSION['Formato_foto'] . ";base64," . base64_encode($_SESSION['Foto']) .") 50% 50% no-repeat ";
            }else{
            echo  "url(Fotos/User_undefined.png) 50% 50% no-repeat";
            }?>;
            background-size: cover !important;
        }

        .Nombre_user{
            font-size: 1.1vw !important ;
            font-family: 'Raleway', sans-serif !important;
            cursor: pointer !important;
        }

        .options{
            overflow: hidden !important;
            position: absolute !important;
            top: 100% !important;
            padding: 0% !important;
            width: 79% !important;
            left: 10% !important;
            margin: 0px 0px 0px 0px !important;
            list-style: none !important;
            background: white !important;
            border-bottom-right-radius: 10px !important;
            border-bottom-left-radius: 10px !important;
            border: 2px solid #CCCECF !important;
            border-top: none !important;
            display: none !important;
        }



        .options>a>li{
            width: 100% !important;
            padding-top: 5% !important;
            padding-bottom: 5% !important;
            text-align: center !important;
            background: white !important;
            border-top: 2px solid #CCCECF !important;
            font-family: 'Raleway', sans-serif !important;
            font-size: 1vw !important;
        }
 
        .options>a{
            text-decoration: none !important;
            color: black !important;
            font-weight: 300 !important;
            margin-right: 0% !important;

        }

        .options>a>li:hover{
            background: #CCCECF !important;
        }

        .Session_inicia{
            color: white !important;
            transition: 0.9s !important;

        }


        .User_lg:hover .Session_inicia{
            color: black !important;
            transition: 0.9s !important;
        }


        .Logo_menu{
            height: 60% !important;
            padding-left: 1% !important;
        }



    </style>
<body>
    <div class="menu">
        <img src="IMG/Logo.png" class="Logo_menu">
        <ul class="Secc_menu">
           <a href="index.php"><li class="seccioones">Prinicipal&nbsp;&nbsp;<i class="fas fa-home ICONOS_MENU"></i></li></a>
           <a href="Login.php"><li class="seccioones">Login&nbsp;&nbsp;<i class="fas fa-user-alt ICONOS_MENU"></i></li></a>
           <a href="Registrate.php"><li class="seccioones">Registro&nbsp;&nbsp;<i class="fas fa-user-plus ICONOS_MENU"></i></li></a>
           <a href="User_index.php"><li class="seccioones">Panel&nbsp;&nbsp;<i class="fas fa-tasks ICONOS_MENU"></i></li></a>
        </ul>

    

    <div class="User_lg">
    <?php
    if(isset($_SESSION['user'])){
        echo "<label class='Nombre_user'>".$_SESSION['user']."</label>&nbsp;&nbsp;";
        echo "<div class='foto'></div>&nbsp;&nbsp;&nbsp;<i class='fas fa-caret-down'></i>";
        echo "<ul class='options'><a href='Cerrar_Seccion.php'><li>Cerrar session</li></a> <a href='Foto.php'><li>Cambiar foto</li></a> <a href='User_index.php'><li>Mas opcciones...</li></a> </ul>";
    }else{
        echo "<a href='Login.php' class='Session_inicia'>Inicia session</a>";
    }
    ?>
    </div>

</div>

</body>
</html>