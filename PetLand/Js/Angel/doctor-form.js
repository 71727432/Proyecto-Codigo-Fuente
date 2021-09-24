function guardar(){
    
    console.log("PRESIONO GUARDAR...");

    var objDoctor = JSON.stringify({
        Nombres : document.getElementById("txtNombres").value,
        Apeliidos : document.getElementById("txtApellidos").value,
        Direccion : document.getElementById("txtDireccion").value,
        Correo : document.getElementById("txtCorreo").value,
        Comentario : document.getElementById("txtComentario").value
    });


    //GURDAMOS EN LOCAL STORAGE
    var tablaDoctor = localStorage.getItem("UsuariosTablasStorages");
    tablaDoctor = JSON.parse(tablaDoctor);
    if(tablaDoctor == null){
        var tablaDoctor = [];   
    }

    if(Buscar != null && Buscar != ""){
        var Id_Procesada = parseInt(Buscar)
        tablaDoctor[Id_Procesada] = objDoctor
        localStorage.setItem("UsuariosTablasStorages", JSON.stringify(tablaDoctor))
        window.location.replace("Angel_Tablas.html");
    }else{

    tablaDoctor.push(objDoctor);
    localStorage.setItem("UsuariosTablasStorages",JSON.stringify(tablaDoctor));
    window.location.replace("Angel_Tablas.html");
    }

}


var Formulario = document.getElementById("frmDoctor")

Formulario.addEventListener('submit', (e) => {
    e.preventDefault()
    guardar()
})