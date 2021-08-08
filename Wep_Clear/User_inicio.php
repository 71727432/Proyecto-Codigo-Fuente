<!DOCTYPE html>
<html lang="en">
    <?php
    include 'User_index.php';
    if($Ingrezar == false || !isset($Ingrezar)){
        header("Location: Login.php");
    }
    
    $_SESSION['ID'] = $User->Obtener_id();
    $_SESSION['Nombre'] = $User->Obtener_nombre();
    $_SESSION['Foto'] = $User->Mostrar_foto();
    $_SESSION['Formato_foto'] = $User->Tipo_De_foto();


    include_once 'Modificacion_roles.php';
    $Ejecutar_validacion = new Actualizar_perfiles;
    $Validacion = $Ejecutar_validacion->Ejecutar_cambios($_SESSION['ID']);
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <!--Letras-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap" rel="stylesheet">
<!--ICONOS-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Panel - WebClear</title>
    <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>
</head>
    <style>



    body{
        padding-top: 10vh;
    }
    
    h5{
    text-align: justify;
    }

    .inputs_changes{
    width: 88%;
    padding: 1%;
    margin: auto;
    font-size: 10px;
    outline: none;
    border: 2px solid rgb(209, 203, 193);
    font-size: 14px;
    padding-top: 1.4%;
    padding-bottom: 1.4%;

    }

    .Texto_change{
        text-align: left;
        padding-left: 7%;
        padding-top: 6%;
        padding-bottom: 2%;
        font-size: 16px;
        font-weight: 100;
    }

    #swal2-title{
        padding-top: 1.2em;
        font-size: 26px;
    }


    .Contenedor_changes{
        display: flex;
        flex-direction: column;
        padding-bottom: 5%;
    }


    .swal2-styled.swal2-confirm.swalBtnColor {
    font-size: 1.25em;
    padding-left: 4%;
    padding-right: 4%;
    margin-right: 2%;
    }

    .swal2-styled.swal2-cancel.Canlar_proceso{
        font-size: 1.25em;
        padding-left: 4%;
        padding-right: 4%;
        margin-left: 2%;
    } 





    </style>
<body>
<?php include_once 'Menu.php'  ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <div class="Cabezera">
     <div style="width: 50%; padding-top: 1%;">   
        <div class="Saludo" style="width: 100%; height: 40%; overflow: hidden; display: flex; justify-content: center; align-items: center; padding-left: 3%;" >
    <h2 style="font-size: 5.1vw; text-align: left; color: white; padding-left: 2%;"><?php echo $_SESSION['Nombre']?> Bienvenido, al panel de tareas:</h2></div>
        <div  style="width: 100%; padding-left: 5%; padding-right: 5%; padding-top: 11%; color: white; text-align: justify; font-style: italic; font-family: cursive; font-size: 1.4vw; height: 40%; display: flex; justify-content: center; align-items: center;"><p>
        En esta seccion pordras crear tareas y roles, que te permitiran tener un cronograma
        de tareas, para organizar el hogar, en base a ello podras ver tu progreso con tareas terminadas y
         faltante y las ya terminadas que te permitiran tener una un mayor panorama acerca de la organizacion 
         dentro de tu hogar y designar de manera igualitaria las tareas que creas conveniente. 

        </p></div>
    </div>

    <input type="hidden" value="<?php echo $Validacion?>" id="Procesar_vld">

    <?php



    if(isset($_POST['valor']) && strlen($_POST['valor']) != 0){
        $Perfil_ingresado = $_POST['valor'];
        $Id = $_SESSION['ID'];


        include_once 'Modificacion_roles.php';
        $Registrar_perfil = new Actualizar_perfiles();
        $Registrar_perfil->Ver_perfiles($Id, $Perfil_ingresado);
    }
    ?>
    <div id="Tareas_DB_2"></div>

    <div class="Formulario">
    <form class="Registrar_rol"  action="User_inicio.php" method="POST"><input type="text" style="    width: 83%; padding: 2%; outline: none; background: rgb(255, 255, 255); border: 3px solid rgb(202, 193, 193);" name="valor" placeholder="Hola <?php echo $_SESSION['Nombre']?>, comienza creando un perfil">
    <input type="submit" value="Crear rol"  class="Form_2"></form>
    </div>
    </div>

    <!--Cabezera_Horario-->
    <div class="Horrario">
    <h3 style="font-size: 1.2em;">Modifique su cuenta:</h3>
        <ul>
            <li class="Cnf_perfil" onclick="Modificarciones()">Nombre <i class="fas fa-id-card"></i></li>
            <li class="Cnf_perfil" onclick="Modificarciones()">Correo <i class="fas fa-envelope"></i></li>
            <li class="Cnf_perfil" onclick="Modificarciones()">Usuario <i class="fas fa-user"></i></li>
            <li class="Cnf_perfil" onclick="Modificarciones()">Contraseña <i class="fas fa-key"></i></li>
        </ul>
    </div>


    <!--Listado de tareas-->
    <header class="Contenedor">        
    <?php
    echo "<div class='Contenedor_roless'>";
    echo "<h3 style='font-size: 1.2em; padding-bottom: 1em'>Listado de perfiles actuales:</h3>";
     include_once 'Modificacion_roles.php';
     $Registrar_perfil = new Actualizar_perfiles();
     $Perfiles_user =  $Registrar_perfil->Mostrar_perfiles($_SESSION['ID']);
     $Mostrar_perfiles = explode(",", $Perfiles_user);
     $Perfiles_platilla = str_replace(" ", "%", $Mostrar_perfiles);

    if(strlen($Perfiles_user) == 0 || isset($$Existe_elementos)){
        echo "<h4>No tienes ningun perfil creado</h4>";
    }else if(!isset($_POST['Pregutar_Delete']) ){
        echo "<form  method='POST' id='Formulario' >";
        foreach($Mostrar_perfiles as $ID_ELEMT => $Nuevos_valores){
            echo "<div class = 'Lista_perfiles'>"  . "<input type='radio' class='Estilo_radio' name='perfil' onchange='Filtrar(this)' value='$Nuevos_valores' id='$Nuevos_valores'>" .  "<label for='$Nuevos_valores' class='Roles_texto' > "  . $Nuevos_valores . "</label>"   .            
            "<input type='radio' name='Pregutar_Delete' id='$Nuevos_valores . Delete' value='$ID_ELEMT'  onchange='Borrar_elemento(this)' class='Afirmar_eliminacion'>" ."<label for='$Nuevos_valores . Delete'><i class='fas fa-trash-alt' id='Icono_delete' ></i></label>" . "</div>";
            $_SESSION["Opcion" . $Nuevos_valores] = $Nuevos_valores; 
        }
        echo "</form>";
        
    }if (isset($_POST['Pregutar_Delete']) && isset($Mostrar_perfiles[$_POST['Pregutar_Delete']]) && count($Mostrar_perfiles) != 0){
        echo "<script>
            function Alerta(){
                Swal.fire({
                    imageUrl: 'https://image.flaticon.com/icons/png/512/50/50049.png',
                    imageWidth: 100,
                    imageHeight: 100,
                    title: 'PERFIL ELIMINADO',                
                    html: '<h5>El perfil <b>" .$Mostrar_perfiles[$_POST['Pregutar_Delete']]. "</b> fue eliminado correctamente, recuerde que puede crear y eliminar cuanto perfiles quiera y esperamos que la pagina sea de su agrado.</h5>',
                    confirmButtonText: 'Continuar',
                    width: '35%',
                    padding: '1.2rem',

                    })
            }
            setTimeout(Alerta, 1)
            </script>";
        $Delete = $_POST['Pregutar_Delete'];
        //TESTEO DELETE 
        include_once 'Modificacion_roles.php';
        $Registrar_perfil = new Actualizar_perfiles();
        $Obtener_tareas = $Registrar_perfil->Mostrar_tareas_perfiles($_SESSION['ID']);
        $Mostar_tareas = explode(" ", $Obtener_tareas);
        if(strpos($Obtener_tareas, "Perfil_".$Perfiles_platilla[$Delete])){
            for($o = 0; $o < count($Mostar_tareas); $o++){
                if("Perfil_".$Perfiles_platilla[$Delete] == $Mostar_tareas[$o]){
                    unset($Mostar_tareas[$o - 1]) ;
                    unset ($Mostar_tareas[$o]) ;
                    unset ($Mostar_tareas[$o+1]) ;
                    unset ($Mostar_tareas[$o+2]) ;
                    unset ($Mostar_tareas[$o+3]) ;
                    unset ($Mostar_tareas[$o+4]) ;
                    unset ($Mostar_tareas[$o+5]) ;
                }
            }
            $Datos_deleteados =  implode(" ",$Mostar_tareas);
            $Registrar_perfil->Insertar_tarea_perfil($_SESSION['ID'], $Datos_deleteados);
        }
    
        unset($Mostrar_perfiles[$Delete]);
        include_once 'Modificacion_roles.php';
        $Registrar_perfil = new Actualizar_perfiles();
        $Nueva_lista = implode(", ",$Mostrar_perfiles);


        if(strpos($Nueva_lista, ",") == 0){
            $Eliminar_coma = substr($Nueva_lista, 1);}
            
        $Registrar_perfil->Eliminar_rol($_SESSION['ID'], $Nueva_lista);
        
        
        echo "<form  method='POST' id='Formulario'>";
        foreach($Mostrar_perfiles as $ID_ELEMT => $Nuevos_valores){
            echo "<div class = 'Lista_perfiles'>"  . "<input type='radio' class='Estilo_radio' name='perfil' onchange='Filtrar(this)' value='$Nuevos_valores' id='$Nuevos_valores'>" .  "<label for='$Nuevos_valores' class='Roles_texto' > "  . $Nuevos_valores . "</label>"   .            
            "<input type='radio' name='Pregutar_Delete' id='$Nuevos_valores . Delete' value='$ID_ELEMT'  onchange='Borrar_elemento(this)' class='Afirmar_eliminacion'>" ."<label for='$Nuevos_valores . Delete'><i class='fas fa-trash-alt' id='Icono_delete' ></i></label>" . "</div>";
            $_SESSION["Opcion" . $Nuevos_valores] = $Nuevos_valores; 
        }
        echo "</form>";

    }if(count($Mostrar_perfiles) == 0){
        echo "<h4>No tienes ningun perfil creado</h4>";
    }

    echo "</div>";
    ?>
    <main class="Desarrollo_tareas" id="Tareas_mostrar">
    <?php



    include_once 'Procesar.php';
 


    ?>
    </main>
    </header>



    <script>
    function Filtrar(e){
        var id_elemento = e.id
        var Elemento_procesar = id_elemento.replace(/ /g , "%")
        var Formulario_flt = document.getElementById("Formulario")
        $.ajax({
            type: "POST",
            url: "Procesar.php",
            data: {"perfil" : Elemento_procesar},            
            success: function (response) {
                $('#Tareas_mostrar').html(response);
                console.log("Entro al ajax")
            }
        });
    }

    function Borrar_elemento(e){
        var Formulario_flt = document.getElementById("Formulario")
        var Elemento_borrado = true
        Formulario_flt.submit();
    }



        async function Modificarciones() {
  const {
    value: formAutenticar
  } = await Swal.fire({
    title: 'Modificar los datos de la cuenta',
    html: 
      '<div class="Contenedor_changes">'+   
      '<label class="Texto_change" for="UserName">Ingrese su contraseña actual:</label>' +
      '<input required="" class="inputs_changes" id="UserName" name="usuario" type="password" autofocus >' +
      '<label class="Texto_change" for="UserPass">Ingrese el cambio que desea hacer:</label>' +
      '<select required="" class="inputs_changes" id="UserPass" name="clave"> ' +
      '<option>Seleccione una de las opciones</option>'+
      '<option>Cambiar el nombre</option>'+
      '<option>Cambiar el correo</option>'+
      '<option>Cambiar el usuario</option>'+
      '<option>Cambiar el contraseña</option>'+
      '</div>',
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonText: 'Continuar',
    cancelButtonText: 'Cancelar',
    confirmButtonColor: '#40B340',
    cancelButtonColor: '#FF0000',
    showCloseButton: true,
    focusConfirm: true,
    focusCancel: false,
    width: "35%",
    footer: '<div class="Fotter_alert"></div>',
    customClass: {
        title: 'Titulo_change',
        confirmButton: 'swalBtnColor',
        cancelButton: 'Canlar_proceso',
        container: 'Contenedor_prnc'
    },
    preConfirm: () => {
      return [
        document.getElementById('UserName').value,
        document.getElementById('UserPass').value
      ]
    },
    onOpen: (modal) => {
      confirmOnEnter = (event) => {
        if (event.keyCode === 13) {
          event.preventDefault();
          modal.querySelector(".swal2-confirm").click();
        }
      };
      modal.querySelector("#UserName").addEventListener("keyup", confirmOnEnter);
      modal.querySelector("#UserPass").addEventListener("keyup", confirmOnEnter);
    }
  });
  if (formAutenticar && formAutenticar[0] == document.getElementById("Procesar_vld").value && formAutenticar[1] != 'Seleccione una de las opciones') {
    if(formAutenticar[1] == 'Cambiar el nombre'){
    Swal.fire({
      title: 'Los datos son correctos',
      icon: 'success',
      width: "35%",
      html: '<div class="Contenedor_changes"><label class="Texto_change">Ahora coloque su nuevo nombre:</label>'+
      '<input class="inputs_changes" id="Nombre_cambios"  type="text" placeholder="Nick_name"></div>',
      confirmButtonText: 'Realizar los cambios',
      customClass: {
      confirmButton: 'swalBtnColor',
      },
      preConfirm: () => { 
        $.ajax({
                type: "POST",
                url: "Registrar_tareas.php",
                data: {"Nombre_uptd" : document.getElementById("Nombre_cambios").value,},
                success: function (response) {
                $('#Tareas_DB_2').html(response);
                }
            });
       }
    });
    }if(formAutenticar[1] == 'Cambiar el correo'){
        Swal.fire({
      title: 'Los datos son correctos',
      icon: 'success',
      width: "35%",
      html: '<div class="Contenedor_changes"><label class="Texto_change">Ahora coloque su nuevo Correo:</label>'+
      '<input class="inputs_changes"  type="email" id="Correo_nuevo" placeholder="example@gmail.com"></div>',
      confirmButtonText: 'Realizar los cambios',
      customClass: {
      confirmButton: 'swalBtnColor',
      },
      preConfirm: () => { 
        $.ajax({
                type: "POST",
                url: "Registrar_tareas.php",
                data: {"Correo_uptd" : document.getElementById("Correo_nuevo").value,},
                success: function (response) {
                $('#Tareas_DB_2').html(response);
                }
            });
       }
    });  
    }if(formAutenticar[1] == 'Cambiar el usuario'){
        Swal.fire({
      title: 'Los datos son correctos',
      icon: 'success',
      width: "35%",
      html: '<div class="Contenedor_changes"><label class="Texto_change">Ahora coloque su nuevo usuario:</label>'+
      '<input class="inputs_changes" id="usuario_nuevo"  type="text" placeholder="Benito666"></div>',
      confirmButtonText: 'Realizar los cambios',
      customClass: {
      confirmButton: 'swalBtnColor',
      },
      preConfirm: () => { 
        $.ajax({
                type: "POST",
                url: "Registrar_tareas.php",
                data: {"Usuario_uptd" : document.getElementById("usuario_nuevo").value,},
                success: function (response) {
                $('#Tareas_DB_2').html(response);
                }
            });
       }
    });    
    }if(formAutenticar[1] == 'Cambiar el contraseña'){
        Swal.fire({
      title: 'Los datos son correctos',
      icon: 'success',
      width: "35%",
      html: '<div class="Contenedor_changes"><label class="Texto_change">Ahora coloque su nueva contraseña:</label>'+
      '<input class="inputs_changes" id="Nuevo_password"  type="password" placeholder="********"></div>',
      confirmButtonText: 'Realizar los cambios',
      customClass: {
      confirmButton: 'swalBtnColor',
      },
      preConfirm: () => { 
        $.ajax({
                type: "POST",
                url: "Registrar_tareas.php",
                data: {"Contraseña_uptd" : document.getElementById("Nuevo_password").value,},
                success: function (response) {
                $('#Tareas_DB_2').html(response);
                }
            });
       }
    }); 
    }
  } else {
    Swal.fire({
      title: 'Datos incorrectos',
      html: '<label class="Texto_change">Lo siento, pero los datos ingresados no son correctos o no selecciono ninguna opcion de modificacion</label>',
      icon: 'warning',
      confirmButtonText: 'Salir de la seccion',
      customClass: {
      confirmButton: 'swalBtnColor',
      }
    });
  }
}

    

    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>