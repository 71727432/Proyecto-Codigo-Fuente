


    //Sistema de seleccion desarrollado por Fredy (Registro)
    var Inicio = 1
    function Activar(Elementos) {
        var Clicks = Inicio
        document.getElementById("Especie").options[Clicks].selected = true;
        Inicio = Inicio + 1
        if(Elementos == Inicio){
            Inicio = 1
        }
    }

    

//Desarrollo registro Fredy (Registro)
/*Local Storege (Memoria del navegador)

Se guarda info en formato de texto dentro del navegador

*/
function Guardar_Memoria(){
    
var Datos_Medic = [] 
var Obtener_Comrprovacion = JSON.parse(localStorage.getItem("Tablaregistrostorage"))

if(Obtener_Comrprovacion != null && Indice_Rg != null && Indice_Rg != ""){
    var Indice_A_cmp = parseInt(Indice_Rg)
    var Element_cmp  = JSON.parse(Obtener_Comrprovacion[Indice_A_cmp])
    for(const E in Element_cmp){
        Datos_Medic.push(Element_cmp[E])
    }

    var Proceder = false

    
    for(var m = 9; m < Datos_Medic.length; m++){
        if(Datos_Medic[m] != "" && Datos_Medic[m] != "Pendiente"){
            Proceder = true
        }
    }

    if(Proceder){
         var Valores_Espeficos =  JSON.parse(Obtener_Comrprovacion[Indice_A_cmp])
         var Cita_est = Valores_Espeficos.estado_citar
         var Salud = Valores_Espeficos.EstadoSLD
        var Alta = Valores_Espeficos.AltaMSC
        var Prec = Valores_Espeficos.AltaMSC
        var Citacua = Valores_Espeficos.Cituacion_Medica
    }else{
        var Cita_est = "Pendiente"
        var Salud = ""
       var Alta = ""
       var Prec = ""
       var Citacua ="" 
    }

}else{
    var Cita_est = "Pendiente"
    var Salud = ""
   var Alta = ""
   var Prec = ""
   var Citacua =""
}




const Objeto_paciente = JSON.stringify({
    Usuario: document.getElementById("Usuario").value,
    contraseña: document.getElementById("contraseña").value,    
    edad_mascota: document.getElementById("Edad").value + " " + Tiempo,
    Fecha_Cita: document.getElementById("Fecha_Cita").value,
    Nombre_msc: document.getElementById("Nombre_msc").value,
    Telefono: document.getElementById("Telefono").value,
    direccion: document.getElementById("direccion").value,
    Cituacion: document.getElementById("Cituacion").value,
    Especie: document.getElementById("Especie").value,
    /*Datos que el admin podra actualizar */
    estado_citar: Cita_est,
    EstadoSLD: Salud,
    AltaMSC: Alta,
    Precio: Prec,
    Cituacion_Medica: Citacua,
})


    //Guardo en local Storage
    var tabla_paciente = localStorage.getItem("Tablaregistrostorage") //Obtiene la informacion del item, para saber si existe
    tabla_paciente = JSON.parse(tabla_paciente); // Transforma a una variable js para que se pueda leer
    if(tabla_paciente == null){
        var tabla_paciente = []
    }



    if(Indice_Rg != null && Indice_Rg != ""){                
        var Perfil_Act = parseInt(Indice_Rg)
        tabla_paciente[Perfil_Act] = Objeto_paciente
        localStorage.setItem("Tablaregistrostorage", JSON.stringify(tabla_paciente))
        var Obtener_V_Sub = JSON.parse(localStorage.getItem("Tablaregistrostorage"))
        var User = JSON.parse(Obtener_V_Sub[Indice_Rg])
        window.location.replace(`Fredy_Pacientes_Urgencia.html?Cambio=${User.Usuario}`)

    }else{
        tabla_paciente.push(Objeto_paciente)//Agregue el objeto a una vatiable en formato de texto
        localStorage.setItem("Tablaregistrostorage", JSON.stringify(tabla_paciente))//Lo convierte a un objeto json
        window.location.replace("Fredy_Pacientes_Urgencia.html?New_User=true") //Redirecciona
    }



}


