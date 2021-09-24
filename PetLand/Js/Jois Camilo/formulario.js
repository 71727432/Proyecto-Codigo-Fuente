function guardar(){     



    var objveterinaria = JSON.stringify({
        idespecie: document.getElementById("txtespecie").value,
        idnombmascota: document.getElementById("txtnombmascota").value,
        idedad: document.getElementById("txtedad").value,
        idcboestado: document.getElementById("cboEstado").value,
        iddueño: document.getElementById("txtdueño").value,

    });

    console.log(objveterinaria);

    //GUARDAMOS EN LOCAL STORAGE
    var tablaveterinaria = localStorage.getItem("veterinarialocalstorage"); //CREAR VARIABLE
    tablaveterinaria = JSON.parse(tablaveterinaria);                        //TRANSFORMAR A UNA VARIABLE JAVASCRIPT
    if(tablaveterinaria == null){
        var tablaveterinaria = [];
    }

    if(ID != null && ID != ""){
        tablaveterinaria[ID] = objveterinaria
        localStorage.setItem("veterinarialocalstorage", JSON.stringify(tablaveterinaria))
        window.location.replace("Jois_servicios.html")
    }else{
    tablaveterinaria.push(objveterinaria);       //AGREGA EL OBJETO A LA VARIABLE TABLAPACIENTE
    localStorage.setItem("veterinarialocalstorage",JSON.stringify(tablaveterinaria));
    window.location.replace("Jois_servicios.html"); // REDIRECCIONA A LA 
    }
}
