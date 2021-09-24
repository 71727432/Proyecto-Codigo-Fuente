function guardar(){
    
    console.log("PRESIONO GUARDAR...");

    var objDoctor = JSON.stringify({
        idDoctor : document.getElementById("txtIdDoctor").value,
        nombApellido : document.getElementById("txtNombApellido").value,
        dni : document.getElementById("txtDni").value,
        especialidad : document.getElementById("txtEspecialidad").value,
        estado : document.getElementById("cboEstado").value,
    });

    console.log(objDoctor);

    //GURDAMOS EN LOCAL STORAGE
    var tablaDoctor = localStorage.getItem("tablaDoctorStorage");
    tablaDoctor = JSON.parse(tablaDoctor);
    if(tablaDoctor == null){
        var tablaDoctor = [];   
    }


    if(User != null && User != ""){
        var ID_RMP = parseInt(User)
        tablaDoctor[ID_RMP] = objDoctor
        localStorage.setItem("tablaDoctorStorage",JSON.stringify(tablaDoctor));
        window.location.replace("Victor_veterinarios.html");
    }else{
        tablaDoctor.push(objDoctor);
        localStorage.setItem("tablaDoctorStorage",JSON.stringify(tablaDoctor));
        window.location.replace("Victor_veterinarios.html");
    }



}