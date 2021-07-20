<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<style>
    body{
        background: url(IMG/Walpaper.jpg) no-repeat 50% 50% fixed;
        background-size: cover;
        padding: 0%;
        margin: 0%;
        font-family: Arial;
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;        
    }

    .Contenedor{
        width: 38vw;
        height: 80vh;
        background: #175da6;
        border-radius: 10px;
        padding: 2%;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        border: 22px solid #0e2347;
        box-shadow: 1em 2px 5px black;
        margin-left: 3.2em;        
    }


 

    .resultado{
        width: 92%;
        margin: auto;
        height: 30%;
        background: #08adff;
        border-radius: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        align-items: center;
    }
    
    .Contenedor_teclas{
        width: 92%;
        margin: auto;
        height: 50vh;       
    }
    .Primeras_teclas{
        display: flex;
    }
    .Teclas_numericas{
        width: 75%;
        height: 50vh;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }
    .Teclas{
        width: 28%;
        height: 20%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #08adff;
        border: 2px solid #08adff;
        border-radius: 10px;
        cursor: pointer;   
        color: black;
        outline: none;
        text-align: center;     
    }

    .Operacionesnb{
        width: 100%;
        height: 16%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: red;
        color: white;
        border: 2px solid red;
        outline: none;
        border: none;
        cursor: pointer;
        border-radius: 10px;

    }

    .Numero {
        background: transparent;
        width: 30%;
        height: 50%;
        text-align: center;
        outline: none;
        border: none;
    }
    .Operacion{
        width: 10vh;
        height: 10vh;
        text-align: center;
        background: transparent;
        border: none;
        outline: none;
    }

    .Respuesta {
        width: 40%;
        text-align: center;
        margin-bottom: 2%;
        background: transparent;
        outline: none;
        border: none;

    }

    .Teclas_Operaciones{
        width: 20%;
        margin-left: 4%;
        margin-top: 1.9%;
        height: 47vh;
        display: flex;
        align-items: flex-end;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-end;


    }
    .Reset{
        position: absolute;
        background: #e20110;
        color: white;
        padding: 1%;
        width: 40vw;
        border-radius: 15px;
        cursor: pointer;
        outline: none;
        border: 2px solid red;
        top: 4%;
        left: 54vw;
    }

    .Descripcion{
        width: 38vw;
        height: 27vw;
        left: 54vw;
        padding: 1vw;
        position: absolute;
        background: rgba(0, 0, 0, 0.5);
        display: flex; 
        justify-content: space-evenly;
        align-content: center;
        color: white;
        text-align: center;
        flex-direction: column;
    }
    .Descripcion>p {
        text-align: justify;
        width: 80%;
        margin: auto;
    }

    .Ultimo_Numeros{
        width: 100%;
        height: 5vh;
        background: black;
    }

    .scn{
        background: black;
        color: white;
        border: 2px solid black;
    }

</style>
<body>
    <button class="Reset" id="Reset">RESETEAR</button>
    <div class="Descripcion">
        <h2>Hola te presento mi proyecto "Calculadora", espero te guste</h2>
        <p>Esta calculadora funciona de la siguiente manera, tendras que digitar tu
            primer numero y cuando este se encuentre listo, preseiona el simbolo de 
            la operacion que deseas hacer y digita el ultimo numero, para despues darle
            al "=" y obtendras el resultado a tu problema, en caso quieres volver a hacer
            otra operacion, necesitaras hacer un click sobre el boton "RESETEAR", para
            volver a empezar.
        </p>
    </div>
    <?php
        $Numero_1 = "";
        $Operacion = "";
        $Numero_2 = "";

        if(isset($_POST["Resultado"]) ){
            $Numero_1 = $_POST["Resultado"];
            $Operacion = $_POST["QueHacer"];
            $Numero_2 = $_POST["Resultado2"];
        }
        ?>


    <form action="" method="POST">
    <div class="Contenedor">

        <div class="resultado" >
        <input type="text" class="Numero" readonly id="Resultado" name="Resultado" value="<?php echo $Numero_1 ?>">
        <input type="text" class="Operacion" id="QueHacer" name="QueHacer" readonly  value="<?php echo $Operacion ?>">
        <input type="text" class="Numero" id="Resultado2" name="Resultado2" readonly value="<?php echo $Numero_2 ?>">
        <?php
        include("Ejecutar.php");
        ?>
        <input value="<?php Calcular() ?>" class="Respuesta" id="Respuesta" readonly>
        </div>
    

        <div class="Contenedor_teclas">
            <div class="Primeras_teclas">
                <div class="Teclas_numericas">
                <?php               
                for($i = 1; $i < 10; $i++){
                    echo "<input type='button' class='Teclas' id='Boton$i' value = '$i'>";
                    
                } 
                echo "<input type='button' class='Teclas scn' id='Boton0' value= '0'>";
                $Teclas_secundarios = array( "^", "√");
                for($i = 0; $i < count($Teclas_secundarios); $i++){
                    echo "<input type='button' class='Teclas scn' id='$Teclas_secundarios[$i]' value='$Teclas_secundarios[$i]'>";
                }
                                        
                ?>
                </div>
                <div class="Teclas_Operaciones">
                    <?php
                    $Operaciones = array("+", "-", "*", "/");
                    for($i = 0; $i < count($Operaciones); $i++){
                        echo "<input type='button' class='Operacionesnb' value='$Operaciones[$i]' id='$Operaciones[$i]'>";
                    }   
                    ?>
                    <input type="submit" class="Operacionesnb" value="=" id="=">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    <script>
        
        for(i = 0; i < 10; i++){
            const Boton_clickqueable = document.getElementById("Boton"+i)      
            Boton_clickqueable.onclick = function(){
                if((document.getElementById("QueHacer").value != "") && (document.getElementById("QueHacer").value != "√")  ){
                document.getElementById("Resultado2").value += Boton_clickqueable.value                                         
                }else{
                    document.getElementById("Resultado").value += Boton_clickqueable.value
                }
            }

        }

        function Revisar_Num(){
        if(document.getElementById("Resultado").value != ""){
            Operaciones = ["+", "-", "*", "/", "^", "√" ]
            for(i = 0; i < Operaciones.length; i++){
                const Operacion = document.getElementById(Operaciones[i])
                Operacion.onclick = function(){
                    if(document.getElementById("Resultado").value != ""){
                    document.getElementById("QueHacer").value = Operacion.value
                    }
                    if(document.getElementById("QueHacer").value == "√"){
                        document.getElementById("Resultado2").value = 2                                          
                    }
                }
            }        
        }
    }
    setInterval(Revisar_Num, 1)




    document.getElementById("Reset").onclick = function(){
        document.getElementById("Resultado2").value = ""
        document.getElementById("Resultado").value = ""
        document.getElementById("QueHacer").value = ""
        document.getElementById("Respuesta").value = ""
        
    }

    </script>
</html>