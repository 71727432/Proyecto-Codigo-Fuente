<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Letraas-->
    <link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>WepClear</title>
</head>
<style>
    body, html{
        margin: 0%;
        height: auto;
        scroll-behavior: smooth;
        font-family: 'Raleway', sans-serif;     
    }
    .svg-hero{
    position: absolute;
    bottom: -6%;
    width: 100%;
    
}

    .Hero{
        width: 100%;
        height: 560px;
        background-image: linear-gradient(135deg, #667eeaab 0%, #764ba2ab 100%), url(IMG/Liempieza.jpg);
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        top: 10vh;

    }

    h1{
        color: white;
        font-size: 80px;
        text-align: center;
        font-family: 'Raleway', sans-serif;

    }

    h3{
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
        color: white;
        line-height: 1.6em;
    }

    .Mensaje_central{
        width: 80vw;
        margin: auto;
        position: relative;
        top: 2%;
    }

    .Botones{
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        padding-top: 5%; 
    }

    .Botones>a {
        padding: 1%;
        font-size: 16px;
        padding-left: 2%;
        padding-right: 2%;
        background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
        border-radius: 15px;
        color: white;
        outline: none;
        font-family: 'Raleway', sans-serif;
        font-weight: 200;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }

    .Boton_01 {
        padding: 0.8vw;
        padding-left: 1.5vw;
        padding-right: 1.5vw;
        background: #6a11cb;
        border-radius: 15px;
        text-decoration: none;
        color: white;
    }

    .Primera_parte{
        width: 100%;
        height: auto;
        overflow: hidden;
        padding-bottom: 0%;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin-top: 7%;
    }

    .Seccion_02{
        width: 100%; height: 100vh;
        display: flex; align-items: center;
        align-items: center;
        padding-top: 10vh;
        padding-bottom: 10vh;
    }

    .Tutoriales:hover{
        transform: scale(1.1);
    }

    .Texto_Task{
        padding-left: 5%;
        padding-right: 5%;
        text-align: center;
        margin: 0px 0px 25px;
    }

    .Tutoriales{
        width: 24vw;
        height: 28vw;
        padding-bottom: 1%;
        border-radius: 10px;
        border: 2px solid #764ba2;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        transition: 0.7s;
    }

    .Ver_mas{
        padding: 2.5%;
        padding-left: 10%;
        padding-right: 10%;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
        border: none;
        background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .Img_resultados{
        width: 26%;
        height: 38%;
        background-color: white no-repeat 50% 50%;
        background-size: cover;
    }

    .Formulario{
        outline: none;
        border: 2px solid white;
        background: transparent;
        width: 40%;
        padding: 1.8%;
        color: white;
        padding-left: 4%;
    }

    ::placeholder {
        color: white;

    }

    .Enviar_msj{
        padding: 1%;
        width: 15%;
        margin-top: 4%;
        background: transparent;
        color: white;
        border: 2px solid white;
        outline: none;
        cursor: pointer;
        transition: 0.9s;
    }

    .Enviar_msj:hover{
        background: white;
        color: black;
    }

    .Opiniones{
        padding: 1.4%;
        padding-left: 2%;
        padding-right: 2%;
        border-radius: 5px;
        background: rgba(239,73,35,255);
        text-decoration: none;
        color: white;
        margin-top: 4%;
        border: none;
        cursor: pointer;
    }


    .Errores{
        background: tomato;
        border: 2px solid red;
        padding: 2%;
        margin-top: 2%;
    }

    .Errores>h3{
        color: red;
        font-weight: 500;
        margin: 0px 0px 10px 0px;
    }

    .Exito{
        background: yellowgreen;
        border: 2px solid green;        
    }

    .Exito>h3{
        color: green;
    }
    

</style>
<body>

<?php include_once 'Menu.php'  ?>

<header class="Hero">
    <div class="Mensaje_central">
    <h1>BIENVENIDO A WEBCLEAR</h1>

    <div style="width: 65vw; margin: auto;">
    <h3 style="text-align: center;">DISFURTA DE UN HOGAR CON MAYOR ORDEN,
    CON LAS HERRAMIENTAS QUE TE OFRECEMOS, QUE TE PERMITIRAN TENER UN MEJOR HOGAR.</h3>
    </div>

    <div class="Botones">
    <a href="#Sc_02"> ¿Como funciona?</a>
    <a href="#Sc_01">¿Quieres iniciar?</a>
    </div>
    </div>
    <div class="svg-hero" style=" width: 100vw; height: 150px; overflow: hidden; ">
    <div style="width: 100%;" id="Sc_01"></div>
    <svg viewBox="0 0 500 150" preserveAspectRatio="none"style="height: 100%; width: 100%;">
    <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
    style="stroke: none; fill: #fff;" ></path>
    </svg></div>
</header>

<section class="Primera_parte" style="background: white; padding-bottom: 10%;" >
    <img src="IMG/Limpieza_or.jpg" width="45%" style="padding-top:5%; padding-bottom: 2.5%;">

    <div style="width: 42%; display: flex; flex-direction: column; border: 2px solid white;
    padding-left: 2%; padding-right: 2%; border-radius: 15px;">
    <h2 style="font-weight: 400;">¿Cansada de siempre hacer las labores del hogar?</h2>
    <p style="font-weight: 300;">Pues te presento WebClear, una herramienta organizadora, que te permitira elaborar cronogramas
        para que tu y tus familiares puedan colaborar con la limpieza del hogar y de ese modo esta plataforma te permitira designar
        tareas especificas en los famliares que tengas y generar un menor peso en las actividades diarias, asi que, ¿Que esperas para comenzar?  
    </p>
    <div style="width: 70%; margin: auto; display: flex; justify-content: space-between; padding-top: 1.5vw; padding-bottom: 1.5vw;">
    <a href="User_inicio.php" class="Boton_01">Comenzar</a>
    <a href="" class="Boton_01">Iniciar sesion</a>
    </div>
    </div>
</section>


<section style="width: 100%; height: 40vh; background: #6a11cb;  " id="Sc_02">
    <div style="width: 90%; padding-top: 3%; padding-left: 5%;">
    <h2 style="color: white; text-align: left; font-weight: 400; padding-bottom: 1%;">¿Como funciona la contruccion de cronogramas?</h2>
    <h3 >Tendras a tu disposicion gran variedad de herramientas, que te permitiran crear configurar y manipular tareas de manera sencilla y rapida, a
    continuacion, explicare las herramientas a mas detalle.
    </h3>
    </div>
</section>


<section class="Seccion_02" style="background: white;">
    <main style="width: 100%; display: flex; justify-content: space-evenly;">
    <div class="Tutoriales"><i class="fas fa-tasks" style="font-size: 6vw;"></i>
    <h2>Elaboracion de tareas</h2>
    <p class="Texto_Task">Puedes crear tareas de manera rapida y sencilla en una interfaz facil de enteneder y que te garantizara tener un mayor control sobre lo que deseas realizar y una mejor progresion</p>
    <input type="button" class="Ver_mas" value="Ver mas..." onclick="Elaboracion_tareas()"></div>

    <div class="Tutoriales"><i class="fas fa-table" style="font-size: 6vw;"></i>
    <h2 style="text-align: center;">Elaboracion de cronogramas</h2>
    <p class="Texto_Task">Genera un mejor orden con tu dia, a travez de la creacion de tareas en los dias de la semana, para estar mas comprometido, con lo que quieras realizar a futuro.</p>
    <input type="button" class="Ver_mas" value="Ver mas..." onclick="Elaboracion_cronogramas()"></div>

    <div class="Tutoriales"><i class="far fa-clock" style="font-size: 6vw;"></i>
    <h2 style="text-align: center;">Tiempos para cada<br> tarea</h2>
    <p class="Texto_Task">Aplica un tiempo determinado para el desarrollo de tus tareas, generara un mayor interes y un mejor orden en tu dia, al invertir tu tiempo de manera correcta en una mejor rutina.</p>
    <input type="button" class="Ver_mas" value="Ver mas..." onclick="Tiempo_tareas()"></div>
    </main>
</section>


<section style="width: 100%; height: 150vh; display: flex; flex-direction: column; align-items: center; background: linear-gradient(to bottom, #D5DEE7 0%, #E8EBF2 50%, #E2E7ED 100%), linear-gradient(to bottom, rgba(0,0,0,0.02) 50%, rgba(255,255,255,0.02) 61%, rgba(0,0,0,0.02) 73%), linear-gradient(33deg, rgba(255,255,255,0.20) 0%, rgba(0,0,0,0.20) 100%); background-blend-mode: normal,color-burn; padding-bottom: 2%; ">
    <h2 style="padding-top: 8vh; padding-bottom: 8vh; font-size: 50px; font-weight: 300;">Resultado de nuestros usuarios:</h2>
    <main style="width: 85%; height: 100vh;  display: flex; align-items: center; justify-content: space-evenly; flex-wrap: wrap; padding-top: 0%; padding-bottom: 10%;">
    <div class="Img_resultados" style="background-image: url(IMG/Resultado_1.png);"></div>
    <div class="Img_resultados" style="background-image: url(IMG/Resultado_2jpg.jpg);"></div>
    <div class="Img_resultados" style="background-image: url(IMG/Resultado_03.jpg);"></div>
    <div class="Img_resultados" style="background-image: url(IMG/Resultado_04.jpg);"></div>
    <div class="Img_resultados" style="background-image: url(IMG/Resultado_05.jpg);"></div>
    <div class="Img_resultados" style="background-image: url(IMG/Resultado_06.jpg);"></div>
    </main>
</section>

<section style="width: 100%; height: 100vh; display: flex; justify-content: space-evenly; align-items: center">
    <img src="IMG/Beneficios.jpg">
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: space-evenly;
    width: 45%; padding-bottom: 4%; ">
        <h3 style="color: black; font-weight: 600;">¿Que beneficios tiene usar esta herramienta?</h3>
        <p style="font-weight: 350; font-size: 15px; text-align: center; width: 90%;">Pues el uso de WepClear en tu dia a dia, mejorara tu compromiso personal con las tareas y te hara ver de forma mas dinamica la inversion de tiempo que tienes, permitiendo
        una mejor gestion de este y a su vez tambien apoyara a la creacion de tareas para el hogar en donde puedes insertar lo que cada miembro de la familia debe hacer para obtener un mejor hogar</p>
        <div style="display: flex; width: 100%; justify-content: space-evenly;">
        <input type="button" class="Opiniones" value="Opiniones de terceros" onclick="Opiniones()">
        <input type="button" class="Opiniones" value="Nuestras redes" onclick="Opiniones()">
        </div>
    </div>
</section>


<section style="width: 100%; position: relative; display: flex; flex-direction: column;">
    <div style=" height: 150px; overflow: hidden;  " ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #6a11cb;"></path></svg></div>
    <div style="width: 100%; height: auto; background: #6a11cb;
    margin-top: 0%; padding-bottom: 3%;" id="Mensaje_enviar">

    <h2 style="padding-left: 4%; color: white; font-weight: 300; ">¿TIENES ALGUNA DUDA O CONSULTA?, PUES NO DUDES EN HACERLA :</h2>
    <form style="width: 92%; height: auto; margin: auto; display: flex; flex-wrap: wrap; flex-direction: column;" action="index.php" method="POST">
    <?php
    $Nombre = "";
    $Correo = "";
    $Mensaje = "";
    if(isset($_POST["Nombre"])){
        $Nombre = $_POST["Nombre"];
        $Correo = $_POST["Correo"];
        $Mensaje = $_POST["Mensaje"];
    }
    ?>
    <div style="width: 67%; padding-top: 4%; display: flex; justify-content: space-between;">
    <input type="text" class="Formulario" placeholder="Ingrese su nombre" name="Nombre" value="<?php echo $Nombre ?>">
    <input type="text" class="Formulario" placeholder="Ingrese su correo" name="Correo" value="<?php echo $Correo ?>">
    </div>
    <textarea name="Mensaje"  style="width: 96%; height: 30vh; margin-top: 4%;
    background: transparent; border: 2px solid white; color: white; outline: none; padding: 2%;" placeholder="Ingrese su mensaje"><?php echo $Mensaje ?></textarea>
    <input type="submit" value="Enviar mensaje" class="Enviar_msj">
    <?php
    if(isset($_POST["Nombre"])){
        $Errores = array();
        if($Nombre == ""){
            array_push($Errores, "Le falto colocar su nombre en el primer campo");
        }
        if($Correo == "" || strpos($Correo, "@") == 0){
            array_push($Errores, "Coloque su correo o coloque un @ en el segundo campo");
        }
        if($Mensaje == ""){
            array_push($Errores, "Coloque el mensaje para poder enviarlo");
        }

        if(count($Errores) > 0){
            echo "<div class='Errores'><h3>Errores:</h3>";
            for($i = 0; $i < count($Errores); $i++){
                echo "<li>$Errores[$i]</li>";
            }
            echo "</div>";
        }else{
            echo "<div class='Errores Exito'><h3>Felicidades:</h3> Su mensaje fue enviado de manera correcta, le responderemos a la brevedad.</div>";
        }
    }    

    ?>
    </form>

    </div>

</section>


</body>
<script>
    //Evita que se pueda reenviar una respuesta
    if(window.history.replaceState){
        console.log("Resupuesta registrada")
        window.history.replaceState(null, null, window.location.href)
    }

    function Elaboracion_tareas(){
        Swal.fire({
      title: 'Crea tus tareas de manera rapida y sencilla',
      html: '<video src="Videos/Tareas.mp4" width="90%" controls></video>',
      confirmButtonText: 'Cerrar tutorial',
      customClass: {
      confirmButton: 'swalBtnColor',
      }
    });
    }

    function Elaboracion_cronogramas(){
        Swal.fire({
      title: 'Diseña cronogramas dinamicos',
      html: '<video src="Videos/Cronogramas.mp4" width="90%" controls></video>',
      confirmButtonText: 'Cerrar tutorial',
      customClass: {
      confirmButton: 'swalBtnColor',
      }
    });
    }


    function Tiempo_tareas(){
        Swal.fire({
      title: 'Prepara tu dia en cada detalle',
      html: '<video src="Videos/Planifica_tu_dia.mp4" width="90%" controls></video>',
      confirmButtonText: 'Cerrar tutorial',
      customClass: {
      confirmButton: 'swalBtnColor',
      }
    });
    }

    function Opiniones(){
        Swal.fire({
      title: 'Ahun en contruccion',
      icon: 'error',
      text: 'En un futuro pienso implementar esta funcionalidad a la pagina pero por ahora no se encuentra habilitado',
      confirmButtonText: 'Cerrar seccion',
      customClass: {
      confirmButton: 'swalBtnColor',
      }
    });
      }


</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>