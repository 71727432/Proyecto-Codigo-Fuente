Tiempo = 26
Puntos = 0
conteo = 4

function JUGAR(){
    function Restar_Tiempo(){
        Tiempo--;
        document.getElementById("Tiempo").innerHTML = Tiempo

        if(Tiempo == 0){
            Tiempo = 26
            Puntos = 0
        //alert("Lo lamento se acabo el tiempo")
        }

    }

    Tiempo_Restar =  setInterval(Restar_Tiempo, 1000)

    document.getElementById("Tesoro").addEventListener('mouseover', Mover_Cofre)

    function Mover_Cofre(){
        Top = Math.round(Math.random()*390)
        Left = Math.round(Math.random()* 1100)

        document.getElementById("Sonido_Moneda").play()

        document.getElementById("Tesoro").style.top = Top + "px"
        document.getElementById("Tesoro").style.left = Left + "px"
    }


    document.getElementById("Tesoro").addEventListener('mouseover', Subir_Puntos)

    function Subir_Puntos(){
    Puntos++;
    document.getElementById("Puntos").innerHTML = Puntos + " / 44"
    if(Puntos == 44){
        Puntos = 0
        Tiempo = 26
        document.getElementById("Pantalla_Ganaste").style.display = "flex"
        document.getElementById("Fondo_Musical").pause()
        clearInterval(Tiempo_Restar)

        Swal.fire({
            title : 'FELICIDADES POR OBTENER EL TESORO <br><br> <img src="IMG/Cofre_del_tesoro.gif" width = "120px"><br>',
            html: 'Te felicitamos por alcanzar el tesoro, a partir de ahora te esperan retos cada vez mas dificeles a si que preparate para afrotarlos y mejorar tus habilidades de atencion, para conseguir la mayor cantiedad de ORO dentro del juego',
            icon: 'sucess',
            confirmButtonText: 'AHUN QUIERO MAS !!!',
            width: '50%',
            height: '80%',
            timer: 100000,
            
            
            timerProgressbar: true,
            /*Funcion de cerrar la alerta*/
            allowOutsideClick: true,
            allowEscapeKey: false,
            allowEnterkey: false,
            stopKeydownPropagation: false,
            });
        



    }
    }


}


document.getElementById("JUGAR_ARRANQUE").addEventListener('click', INICIO)

function INICIO(){
document.getElementById("INICIO_BORRAR").style.display = "none"
document.getElementById("Fondo_Musical").play()
function Conteo(){
conteo--;
document.getElementById("Conteo").innerHTML = conteo
if(conteo == -1){
document.getElementById("Conteo").style.display = "none" 
function Comenzar(){
    document.getElementById("INCIO").style.display = "none"
    JUGAR()
}
setTimeout(Comenzar, 1000)
}
}
setTimeout(Conteo, 1)
setInterval(Conteo, 1000)
}





function Reloj(){
    Hora_Actual = new Date(),
    Hora = Hora_Actual.getHours(),
    Minutos = Hora_Actual.getMinutes(),
    Segundos = Hora_Actual.getSeconds(),
    AMPM = "PM",
    Dia = Hora_Actual.getDay(),
    Dia_Numero = Hora_Actual.getDate(),
    Mes = Hora_Actual.getMonth(),
    Años = Hora_Actual.getFullYear(),

        PDia = document.getElementById("PdiaSemana")
        Pdia_Numero = document.getElementById("PdiaNumero")
        Pmes = document.getElementById("Pmes"),
        Paños = document.getElementById("Paño")
        PHora = document.getElementById("PHora"),
        PMinutos = document.getElementById("PMinutos"),
        PSegundos = document.getElementById("PSegundos"),
        Pampm = document.getElementById("PAMPM");

        if(Hora > 12){
            Hora = Hora - 12
        }

        if(Hora < 10){
            Hora = "0" + Hora
        }

        if(Minutos < 10){
            Minutos = "0" + Minutos
        }

        if(Segundos < 10){
            Segundos = "0" + Segundos
        }


        var Dias_Semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado']
        PDia.textContent = Dias_Semana[Dia];
        Pdia_Numero.textContent = Dia_Numero
        var Meses = ['Enero', 'Febrero', 'Marzo', 'Abirl', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        Pmes.textContent = Meses[Mes]
        Paños.textContent = Años

        PSegundos.textContent = Segundos
        PMinutos.textContent = Minutos
        PHora.textContent = Hora
        Pampm.textContent = AMPM

        
}

setTimeout(Reloj, 1)
setInterval(Reloj, 1000)
