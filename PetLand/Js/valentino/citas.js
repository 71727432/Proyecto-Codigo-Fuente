function guardar(){
    


    var objMascota = JSON.stringify({
        nombre : document.getElementById("txtNombreMascota").value,
        tipo : document.getElementById("txtTipoMascota").value,
        dia : document.getElementById("txtDia").value,
        mes : document.getElementById("txtMes").value,
        año : document.getElementById("txtAño").value,
        especialidad : document.getElementById("txtEspecialidad").value,
        turno : document.getElementById("txtTurno").value
    });

    //GURDAMOS EN LOCAL STORAGE
    var tablaMascotas = JSON.parse(localStorage.getItem("tablaMascotaStorage"));    
    if(tablaMascotas == null){
        var tablaMascotas = [];
    }    

    if(Busqueda != null && Busqueda != ""){
    var ID = parseInt(Busqueda)
    tablaMascotas[ID] = objMascota
    localStorage.setItem("tablaMascotaStorage", JSON.stringify(tablaMascotas)) 
    window.location.replace("Valentino_tablas.html");   
    }else{
    tablaMascotas.push(objMascota);
    localStorage.setItem("tablaMascotaStorage",JSON.stringify(tablaMascotas));
    window.location.replace("Valentino_tablas.html");
    }

}