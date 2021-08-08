<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--LETRAS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar a base de datos</title>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>    
</head>
<style>

    .Registrar_tarea{
        background: transparent;
        border: 2px solid rgb(214, 208, 208); 
        width: 95%;
        height: 90vh;
        padding-bottom: 4vh;
        overflow-y: scroll;  
        margin: auto;
        margin-top: 2%;     
    }

    .Registrar_tarea::-webkit-scrollbar-track
    {

	border-radius: 10px;
	background-color: transparent;
    }

    .Registrar_tarea::-webkit-scrollbar
    {
	width: 12px;
	background-color: transparent;
    }

    .Registrar_tarea::-webkit-scrollbar-thumb
    {
	border-radius: 10px;
	
	background-color: rgba(196,196,196,255);
    }

    .FORMULARIO{
        display: flex;
        flex-direction: column;
        background: rgba(196,196,196,255);
        width: 100%;

    }

    .Añadir{
        display: flex;
        margin: auto;
        width: 90%;
        padding: 5%;
        padding-bottom: 3%;
        justify-content: space-between;
    }


    .Ingresar_tarea{
        width: 85%;
        padding: 2%;
        outline: none;
        border: 2px solid rgb(200, 193, 193);
    }

    .Enviar{
        padding: 2%;
        background: rgb(35, 109, 228);
        color: white;
        outline: none;
        border: none;
        cursor: pointer;
    }

    .Registrar_msj{
        width: 90%;
        margin: auto;
        display: flex;
        align-items: flex-start;
        padding-bottom: 3%;
        font-family: 'Raleway', sans-serif;
        font-size: 15px;
    }

    .Mostrar_tarea{
        display: flex;
        align-items: center;
        font-family: 'Raleway', sans-serif;
        font-size: 15px;
    }

    .Formulario_Mostrar{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 1.9%;
        padding-top: 5%;
        border-bottom: 2px solid rgba(196,196,196,255) ;
        margin: auto;
        width: 90%;
    }

    .Eliminar{
        background: rgba(196,196,196,255);
        padding: 0.5%;
        padding-left: 1%;
        padding-right: 1%;
        color: black;
        font-weight: 100;
        border: 2px solid rgba(196,196,196,255);
        cursor: pointer;        
    }

    .Input_delete{
        display: none;
    }

    .Filtro_Mostrar{
        width: 90%;
        margin-left: 5%;
        display: flex;
    }
    .Filtro_Mostrar>form{
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-top: 8%;
        padding-bottom: 5%;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
    }
    .Filtro_Mostrar>form>div{
        display: flex;
        align-items: center;
        justify-content: center;    
    }

    .Enviar_filtro{
        padding: 1%;
        background: red;
        color: white;
        border: none;
        padding-left: 2%;
        padding-right: 2%;
        cursor: pointer;
    }

    .select{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        margin: 0px 0px 0px 5px;
    }

    .Nt_select{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        margin: 0px 0px 0px 5px;
        color: #aaa;
    }

    .Felicitaciones{
        width: 82%;
        text-align: left;
        margin-left: 5%;
        margin-top: 5%;
        background: yellowgreen;
        border: 2px solid green;
        padding: 2%;
    }


    .Guarar{
        border: none;
        background: rgb(119, 119, 119) ;
        color: white;
        padding: 1%;
        cursor: pointer;
    }

    .Texto_resultado{
        width: 80%;
        margin: auto;
        margin-top: 3%;
        padding: 0.9%;
        background: rgb(156, 189, 243);
        border: 2px solid rgb(35, 109, 228)
    }

    .Saludo_tarea{
        font-weight: 200;
        font-size: 17px ;
    }

    .Mostrar_tr{
        padding-top: 5%;
        padding-right: 5%;
    }


    .TAREA_REGISTRADA{
        font-weight: 300;
        font-size: 20px;
        padding-left: 2%;
    }

    .Tarea_terminada {
        display: none;
    }

    .Contenedor_br{
        width: 80%;
        overflow: hidden;
        margin: auto;
        border-radius: 5px;
        border: 2px solid rgb(35, 109, 228);
    }

    .Texto_bar{
        margin: 0px 0px 0px 0px;
        font-size: 17px;
        padding-left: 10%;
        padding-bottom: 1%;
        font-weight: 400;
        font-family: 'Raleway', sans-serif;
    }

    #Elemento_a_enviae{
        display: none;
    }


</style>
<body>

<?php
    $Perfil = $_POST['perfil'];
    $Elemento  = str_replace("%", " ", $Perfil);
    $_SESSION['Perfil_actual']  = $Elemento;

    if(isset($_POST['perfil'])){
    include_once  'Modificacion_roles.php';
    $Obtener_info = new Actualizar_perfiles;
    $Tareas_actuales = $Obtener_info->Mostrar_tareas_perfiles($Id_user);

    $Escoger_valores = explode(" ", $Tareas_actuales); 
    
    if(strlen($Tareas_actuales) > 0 && strpos($Tareas_actuales, "Perfil_".$_POST['perfil'])){
        for($i = 0; $i < count($Escoger_valores); $i++){
        if($Escoger_valores[$i] == "Perfil_".$_POST['perfil']){
        $Tareas_pendientes = $Escoger_valores[$i + 2];
        $Tareas_concluidas = $Escoger_valores[$i + 4];
            }
        }
    }else{
        $Tareas_pendientes = "";
        $Tareas_concluidas = "";
    }
    
    echo "<input type='hidden' id='Tareas_pendientes' value='$Tareas_pendientes'>";
    echo "<input type='hidden' id='Tareas_concluidas' value='$Tareas_concluidas'>";
    
    }
?>




    <div class="Registrar_tarea">
        <div class="Añadir">
        <input type="text" name="Tarea" class="Ingresar_tarea" id="Tareas_ingresada" placeholder="Bienvenido <?php echo $_SESSION['Perfil_actual']; ?>, comienze registrando alguna tarea">
        <input type="button" value="Añadir tarea" class="Enviar" onclick="Crear_Tarea()">
        </div>

        <input type="hidden" value="<?php echo $_POST['perfil']; ?>" id="Perfil_entrante">
        <div id="Tareas_DB"></div>

        <h3 class="Texto_bar" id="Avanze_msj" style="color: rgb(35, 109, 228);">Avance actual: 0%</h3>
        <div class="progress progress-striped active Contenedor_br" style="background: rgb(156, 189, 243);">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" id="Barra_incrementar">

              <span class="sr-only">40% Complete</span>
            </div>
          </div>



    <div class="Texto_resultado" id="Mensaje_contenedor"><span id="Mensaje" style="color: rgb(12, 73, 170)"><?php echo $_SESSION['Perfil_actual'];?>, ahun no tienes ninguna tareas escrita</span></div>
  

        

            <div class="Filtro_Mostrar">
                
                    <div class="Mostrar_tr"><input type="radio" id="Todo"  name="Pendientes" value="Activo" onclick="Cambio_vista()" checked > <label for="Todo"> Mostrar las tareas pendientes </label></div>
                    <div class="Mostrar_tr"><input type="radio" id="Todo2"  name="Pendientes" value="Activo" onclick="Cambio_vista2()"> <label for="Todo2"> Mostrar las tareas terminadas</label></div>
            </div>


            <div id="Mostrar_tareas"></div>
              
                <div style="width: 90%; margin: auto; padding-top: 6%; display: flex; justify-content: space-between;" id="Cambios">

                <div style='padding-bottom: 4%;'></div>
 
    </div>




    <script>
        var Tareas_registrar = [];
        if(document.getElementById("Tareas_pendientes").value != ""){
            var Verficar_espacios = document.getElementById("Tareas_pendientes").value.replace(/-/g , " ")
            var Elemento_registrar = Verficar_espacios.replace(/,/g , ",")
            var Registrar = Elemento_registrar.split(",")
            for(var i = 0; i < Registrar.length; i++){
               Tareas_registrar.push(Registrar[i])
            }
        }
        var Tareas_delete = [];
        if(document.getElementById("Tareas_concluidas").value != ""){
            var Verificar_espacios_dlt = document.getElementById("Tareas_concluidas").value.replace(/-/g , " ")
            var Elmeneto_eliminado = Verificar_espacios_dlt.replace(/,/g , ", ")
            var Eliminado = Elmeneto_eliminado.split(",")
            for(var o = 0; o < Eliminado.length; o++){
                Tareas_delete.push(Eliminado[o]);
            }
        }

        Leer_tareas_registradas();


        
        function Leer_tareas_registradas(){
            var Mostrar_resultados = document.getElementById("Mostrar_tareas")
            var Mensaje = document.getElementById("Mensaje")
            var Contenedor_mensaje = document.getElementById("Mensaje_contenedor")


            Mensaje.style.color = "rgb(35, 109, 228)"
            Mensaje.innerHTML = `Su tarea se agrego con exito -> Cantidad total de tareas pendientes : ${Tareas_registrar.length} `

            Mostrar_resultados.innerHTML = "";
            for(var z = 0; z < Tareas_registrar.length; z++){
                if(Tareas_registrar[z] != undefined){              
                Mostrar_resultados.innerHTML += `
                <div class="Formulario_Mostrar"   id='${z}a'>

                <div class="Mostrar_tarea"><input type='checkbox' name="Completar" value="" id='${z} Tarea' onchange='Revizar_check(this)'  ><label for='${z} Tarea' class='TAREA_REGISTRADA' style='margin: 0px 0px 0px 0px; padding-left: 0.5vw;'>${Tareas_registrar[z]}</label></div>
      
                <input type="checkbox" id="${z} registrar" class="Input_delete" name="eliminar" onchange="Eliminar_array(this)">
                <label id="Eliminar" for="${z} registrar" class="Eliminar">Eliminar 🗑</label>

                </div>                
                `
            
                    }   

                }
                document.getElementById("Cambios").innerHTML = `<div></div><input type='radio' name='CAMBIO_LISTO' id='Elemento_a_enviae' > <label class="Guarar" onclick="Procesar_cambios()">Guardar Cambios</label> </div> `
        }


        function Leer_tareas_terminadas(){
            var Mostrar_resultados = document.getElementById("Mostrar_tareas")
            var Mensaje = document.getElementById("Mensaje") 
            var Contenedor_mensaje = document.getElementById("Mensaje_contenedor")

            Mensaje.style.color = "rgb(35, 109, 228)"
            Mensaje.innerHTML = `Su tarea se agrego con exito -> Cantidad total de tareas terminadas : ${Tareas_delete.length} `
            

            Mostrar_resultados.innerHTML = "";          
            for(var e = 0; e < Tareas_delete.length; e++){
                if(Tareas_delete[e] != undefined){              
                Mostrar_resultados.innerHTML += `
                <div class="Formulario_Mostrar"   id='${e}a'>

                <div class="Mostrar_tarea"><input type='checkbox' name="Completar" value="" id='${e} done' onchange='Revizar_check(this)' checked ><label for='${e} done' class='TAREA_REGISTRADA' style='margin: 0px 0px 0px 0px; padding-left: 0.5vw;'>${Tareas_delete[e]}</label></div>
      
                <input type="checkbox" id="${e} delete" class="Input_delete" name="eliminar" onchange="Eliminar_array(this)">
                <label id="Eliminar" for="${e} delete" class="Eliminar">Eliminar 🗑</label>

                </div>                
                `
            
                    }
                }
                document.getElementById("Cambios").innerHTML = `<div></div><input type='radio' name='CAMBIO_LISTO' id='Elemento_a_enviae' > <label class="Guarar" onclick="Procesar_cambios()">Guardar Cambios</label> </div> `
        }



        

        function Crear_Tarea(){
            var Mostrar_resultados = document.getElementById("Mostrar_tareas")
            var Texto_entrante = document.getElementById("Tareas_ingresada").value
            var Mensaje = document.getElementById("Mensaje")
            var Contenedor_mensaje = document.getElementById("Mensaje_contenedor")
            if(Texto_entrante.length == 0){
                Mensaje.innerHTML = `<?php echo $_POST['perfil']; ?>, la tarea insertada no tiene nada escrito`
                Mensaje.style.color = "red"
            }else{                
                Tareas_registrar.push(Texto_entrante);                
                
                var Pendiente = document.getElementById("Todo")
                var Terminadas = document.getElementById("Todo2")
                
                if(Pendiente.checked != false){        
                Leer_tareas_registradas();
                }
                if(Terminadas.checked != false){
                    Leer_tareas_terminadas();
                }




            }
        }




        function Cambio_vista(){
            var Mostrar_resultados = document.getElementById("Mostrar_tareas")
            Mostrar_resultados.innerHTML = "";
            Leer_tareas_registradas();
        }

        function Cambio_vista2(){
            var Mostrar_resultados = document.getElementById("Mostrar_tareas")
            Mostrar_resultados.innerHTML = "";
            Leer_tareas_terminadas();            
        }

    
        function Revizar_check(e){
            let elemento_seleccionado = e.id
            var elemento = document.getElementById(elemento_seleccionado)
            
            var id_elemento = elemento_seleccionado.split(' ')[0]
            var Origen = elemento_seleccionado.split(' ')[1]

            var Mostrar_resultados = document.getElementById("Mostrar_tareas")

            if(Origen == "Tarea"){            
            Tareas_delete.push(Tareas_registrar[id_elemento]);
            Tareas_registrar.splice(id_elemento, 1);
            if(elemento.checked != false){        
                Mostrar_resultados.innerHTML = "";
                Leer_tareas_registradas();
            }
            }else{
                Tareas_registrar.push(Tareas_delete [id_elemento]);
                Tareas_delete.splice(id_elemento, 1);
                if(elemento.checked == false){        
                Mostrar_resultados.innerHTML = "";
                Leer_tareas_terminadas();
                }
            }


        

        }



        function Barra_De_progrzo(){
            var Total_tareas = Tareas_registrar.length + Tareas_delete.length
            var calcular_porcentaje = (Tareas_delete.length * 100) / Total_tareas
            var Porcentaje_redondeado = Math.round(calcular_porcentaje * 100) / 100
            
            document.getElementById("Barra_incrementar").style.width = calcular_porcentaje + "%"
            if(Total_tareas != 0){
            document.getElementById("Avanze_msj").innerHTML = `Avance actual: ${Porcentaje_redondeado}%` 
            }
            if(Porcentaje_redondeado > 50){
                document.getElementById("Avanze_msj").innerHTML = `Vas por buen camino: ${Porcentaje_redondeado}%` 
            }
            if(Porcentaje_redondeado == 100){
                document.getElementById("Avanze_msj").innerHTML = `Felicitaciones completaste todas tus tareas, te mereces un buen descanzo por hoy` 
            }
        }

        setInterval(Barra_De_progrzo, 1)



        var Perfil_db = document.getElementById("Perfil_entrante").value

            //HACER QUE LEA ESTE ARRAY TODO JUNTO Y LO ENVIE DE ESA MANERA A LA DB




        function Procesar_cambios(){
            if(Tareas_registrar.length != 0 || Tareas_delete.length != 0){
            var pendientes =  Tareas_registrar.toString();        
            var Terminadas =  Tareas_delete.toString();
            var terminadas_enviar = Terminadas.replace(/ /g,"-")
            var pendientes_eviar =  pendientes.replace(/ /g,"-")
            var Leer_tareas = "// " + "Perfil_" + Perfil_db + " Pendientes: " + pendientes_eviar  + " Terminadas: " +  terminadas_enviar + " // "


            $.ajax({
                type: "POST",
                url: "Registrar_tareas.php",
                data: {"Tareas_pendientes" : Leer_tareas,},
                success: function (response) {
                $('#Tareas_DB').html(response);
                }
            });
        }else{
            alert("No tienes ninguna tarea registrada para guardar para guardar")
        }
        }


        function Eliminar_array(e){
             var Elemento_a_deletear = e.id
             primera = Elemento_a_deletear.split(' ')[1]
             indeice = Elemento_a_deletear.split(' ')[0]
             if(primera == "registrar"){
                Tareas_registrar.splice(indeice, 1)
                Leer_tareas_registradas()
             }if(primera == "delete"){
                 Tareas_delete.splice(indeice, 1)
                 Leer_tareas_terminadas()
             }
        }



        
    </script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>


