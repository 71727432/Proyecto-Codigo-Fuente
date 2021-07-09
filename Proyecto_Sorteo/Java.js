document.getElementById("SORTEO").addEventListener('click', Validar_Sorteo)
function Validar_Sorteo(){
var Input_01 = (parseInt(document.getElementById("Input_01").value))
var Input_02 = (parseInt(document.getElementById("Input_02").value))


if((Input_01 != "")||(Input_01<=0)||(Input_01 < Input_02)){
    document.getElementById("Resultados").innerHTML = "<br><i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;Lo lamento pero debe<br> colocar un numero valido "
    document.getElementById("Resultados").style.color = "red"}
    else{document.getElementById("Resultados").innerHTML = "<br><i class='fas fa-check-circle'></i></i>&nbsp;Los datos registrados<br> son correctos"
    document.getElementById("Resultados").style.color = "green"}

if((Input_02 != "")||(Input_02<=0)||(Input_01  <  Input_02)){
    document.getElementById("Resultados2").innerHTML = "<br><i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;Lo lamento pero debe <br> colocar un numero valido "
    document.getElementById("Resultados2").style.color = "red"}

    else{document.getElementById("Resultados2").innerHTML = "<br><i class='fas fa-check-circle'></i></i>&nbsp;Los datos registrados<br> son correctos"
    document.getElementById("Resultados2").style.color = "green"}


if((Input_01 != "") && (Input_02 != "") && (Input_01 > 0) && (Input_02 > 0) && (Input_01 >=  Input_02)  ){
document.getElementById("Requisitos").style.display = "none"
document.getElementById("Requisitos2").style.display = "none"
document.getElementById("Titulo_Form").style.display = "none"

document.getElementById("Bloque_2").style.display = "flex"
document.getElementById("Bloque_2").style.justifyContent = "center"
document.getElementById("Bloque_2").style.alignItems = "center"
document.getElementById("Bloque_2").style.flexDirection = "column"

document.getElementById("Digitar").style.height = "auto"
document.getElementById("SORTEO").style.display = "none" 

}

}


document.getElementById("NUMBERONE").addEventListener('click', Cambiar_Color01 )
Activador = 1
function Cambiar_Color01(){
if(Activador == 1){
    document.getElementById("NUMBERONE").style.border = "2px solid green"
    document.getElementById("NUMBERONE").style.background = "rgba(172, 255, 47, 0.534)"

    document.getElementById("NUMBERTOWN").style.border = "2px solid black"
    document.getElementById("NUMBERTOWN").style.background = "transparent"
}


}



document.getElementById("NUMBERTOWN").addEventListener('click', Cambiar_Color02 )
Activador_02 = 1
function Cambiar_Color02(){
if(Activador_02 == 1){
    document.getElementById("NUMBERTOWN").style.border = "2px solid green"
    document.getElementById("NUMBERTOWN").style.background = "rgba(172, 255, 47, 0.534)"

    document.getElementById("NUMBERONE").style.border = "2px solid black"
    document.getElementById("NUMBERONE").style.background = "transparent"
    }


}



document.getElementById("Arrancar").addEventListener('click', Arrancar_Validacion)

var Iniciar = "Si"

function Arrancar_Validacion(){
for(var i = 0; i< document.Tipo_de_Sorteo.Opciones_sorteo.length; i++){
    if(document.Tipo_de_Sorteo.Opciones_sorteo [i].checked){
        if(document.Tipo_de_Sorteo.Opciones_sorteo[i].value == 1){
            document.getElementById("Borrar_Opciones").style.display = "none"
            document.getElementById("Titular_2FRM").style.display = "none"
            document.getElementById("Arrancar").style.display = "none"
            document.getElementById("Inicio_SEC_NUM").style.display = "flex"
            Conteo = 4
            function Iniciar_Conteo(){
                Conteo--;
                document.getElementById("Conteo").innerHTML = Conteo
                if(Conteo == -1){
                    document.getElementById("Conteo").style.display = "none"
                }
            }
            setTimeout(Iniciar_Conteo, 1)
            setInterval(Iniciar_Conteo, 1000)
            function Ganador_Numero(){
                var Participantes =  document.getElementById("Input_01").value
                var Ganadores =  document.getElementById("Input_02").value
                var Generar = []; 
                    while(Generar.length < Ganadores){
                        Random = Math.round(Math.random() * (Participantes - 1) + 1)
                        Repetido = false
                        for(i = 0; i < Generar.length; i++){
                            if(Generar[i] == Random){
                                Repetido = true
                                break;
                            }
                        }
                        if(Repetido == false){
                            Generar[Generar.length] = Random
                        }
                    }

                    for(i = 0; i < Generar.length; i++){
                        document.getElementById("Ganadores_Numeros").innerHTML += "El Numero : " + Generar[i] + "<br>" + "<br>"
                    }
                

            }
            setTimeout(Ganador_Numero, 4000)

        }

        if(document.Tipo_de_Sorteo.Opciones_sorteo[i].value == 2){
            document.getElementById("Titular_2FRM").style.display = "none"
            document.getElementById("NUMBERONE").style.display = "none"
            document.getElementById("NUMBERTOWN").style.display = "none"
            document.getElementById("Arrancar").style.display = "none"
            document.getElementById("Por_Nombres_Titulo").style.display = "block" 
            document.getElementById("Boton_Ganador_Nombre").style.display = "block"
            for(i = 0; i < document.getElementById("Input_01").value; i++){
                document.getElementById("Por_Nombre").innerHTML += "<input type='text' placeholder='ingrese el nombre de su participante' class='Resgistre_sus_datos'>" + "<br>"
            }
            document.getElementById("Boton_Ganador_Nombre").addEventListener('click', VerGanadores_Nombres)
            function VerGanadores_Nombres(){

            var Resultado_Nombre_Sorteo = document.getElementsByClassName("Resgistre_sus_datos")
            var Nombre = []
            for(var q = 0; q < Resultado_Nombre_Sorteo.length; q++){
                Nombre[q] = Resultado_Nombre_Sorteo[q].value
            }
            for(l = 0; l<Nombre.length; l++){
                var Llenados = 1
                if(Nombre[l] == ""){
                    Llenados++
                }
            }

            if(Llenados == 2){
                alert("Porfavor llene el formulario completo para continuar")
            }
            if(Llenados == 1){
                document.getElementById("Por_Nombre").style.display = "none"
                document.getElementById("Titulo_Nombres").style.display = "none"
                document.getElementById("Boton_Ganador_Nombre").style.display = "none"
                document.getElementById("GANADOR_NOMBRE").style.display = "block"
                Conteo_Nombre_Ganador = 4
                function Conteo_Nombre(){
                    Conteo_Nombre_Ganador--;
                    document.getElementById("Conteo_Nombre").innerHTML = Conteo_Nombre_Ganador
                    if (Conteo_Nombre_Ganador == -1){
                        document.getElementById("Conteo_Nombre").style.display = "none"
                       
                    }
                }
                setTimeout(Conteo_Nombre, 1)
                setInterval(Conteo_Nombre, 1000)
                var Posibles_Ganadores_NB = []
                while(Posibles_Ganadores_NB.length < document.getElementById("Input_02").value){
                    Nombre_Random = Math.round(Math.random()* (Nombre.length - 1))
                    Repetidos = false
                    for(x = 0; x < Posibles_Ganadores_NB.length; x++){
                        if(Posibles_Ganadores_NB[x] == Nombre_Random){
                            Repetidos = true
                            break;
                        }
                    }
                    if(Repetidos == false){
                        Posibles_Ganadores_NB[Posibles_Ganadores_NB.length] = Nombre_Random

                    }                
                }
                function Anunciar_Ganadores(){
                for(var z = 0; z < Posibles_Ganadores_NB.length; z++){
                    Posicion_del_ganador = Posibles_Ganadores_NB[z]
                    document.getElementById("GANDORESSSS").innerHTML += "La persona con el nombre:" +  Nombre[Posicion_del_ganador] + "<br>" + "<br>"
                }
            }
            setTimeout(Anunciar_Ganadores, 4000)
            }

            }
                
        }
        Iniciar = "NOP"
    }
}
if(Iniciar == "Si"){
    alert("Usted no selecciono ninguna de las opciones, para continuar le pedimos que elija alguna de estas")
}

}