document.addEventListener("DOMContentLoaded", function() {
    Actualizar = false
    function listarMascota (){
        var dataMascotas = localStorage.getItem("dataMascotasStorage")

        dataMascotas = JSON.parse(dataMascotas)

        if(dataMascotas == null){
            var dataMascotas = []
        }

        var dataFila = '';
        if(dataMascotas.length > 0){
            for(const i  in dataMascotas){
                var item = JSON.parse(dataMascotas[i]);
                dataFila += "<tr>";
                    dataFila += "<td class='align-middle'><p>" + i + "</p></td>";
                    dataFila += "<td class='align-middle'><p>" + item.nom_mascota + "</p></td>";
                    dataFila += "<td class='align-middle'><p>" + item.especie + "</p></td>";
                    dataFila += "<td class='align-middle'><p>" + item.edad + "</p></td>";
                    dataFila += "<td class='align-middle'><p>" + item.vacuna + "</p></td>";
                    dataFila += "<td class='align-middle'><p>" + item.descripcion + "</p></td>"
                    dataFila += `<td class='align-middle'><div style='width: 15vw; height: 12vw; max-height: 130px; max-width: 150px;  background: url("${item.link}"); background-size: cover; background-position:50% 50%' class="m-auto"></div></td>`
                    dataFila += "<td class='align-middle'>" + "<button type='button' class='btn btn-sm btn-primary Selector_Editor' data-bs-toggle='modal' data-bs-target='#md-add-mascota' id="+ i +"><i class='fas fa-edit'></i> Editar</button>" + "</td>";
                dataFila += "</tr>";
            }

            document.getElementById("tb-mascota").innerHTML = dataFila;
            document.querySelectorAll(".Selector_Editor").forEach(e => {
                e.addEventListener("click", () => {
                    var Element_Edit = e.id
                    var Info_Act = JSON.parse(localStorage.getItem("dataMascotasStorage"))
                    var Info_Corregir = JSON.parse(Info_Act[Element_Edit])
                    document.getElementById("ia-nom-mascota").value = Info_Corregir.nom_mascota 
                    document.getElementById("ia-especie").value = Info_Corregir.especie
                    document.getElementById("ia-edad").value = Info_Corregir.edad
                    document.getElementById("ia-vacuna").value = Info_Corregir.vacuna
                    document.getElementById("ia-desc").value = Info_Corregir.descripcion
                    document.getElementById("ia-link").value = Info_Corregir.link
                    if(e.id == 0){
                    Actualizar = "PrimerN"
                    }else{Actualizar = e.id}
                })
            })
        }
    }





    function guardarMascota (){
        let mascota = JSON.stringify({
            nom_mascota: document.getElementById("ia-nom-mascota").value,
            especie: document.getElementById("ia-especie").value,
            edad: document.getElementById("ia-edad").value,
            vacuna: document.getElementById("ia-vacuna").value,
            descripcion: document.getElementById("ia-desc").value,
            link: document.getElementById("ia-link").value
        })
        

        //console.log(mascota)

        var dataMascotas = JSON.parse(localStorage.getItem("dataMascotasStorage"))


        if (dataMascotas == null) {
            var dataMascotas = []
        }
        if(Actualizar != false || Actualizar == "PrimerN"){
        if(Actualizar == "PrimerN"){
        Actualizar = 0        
        }
        dataMascotas[Actualizar] = mascota
        localStorage.setItem("dataMascotasStorage", JSON.stringify(dataMascotas))
        }else{         
        dataMascotas.push(mascota)
        localStorage.setItem("dataMascotasStorage", JSON.stringify(dataMascotas))
        }
        listarMascota()
    }

    const form_mascota = document.getElementById('form-add-mascota')

    form_mascota.addEventListener('submit', (e) => {
        e.preventDefault()

        guardarMascota()

        form_mascota.reset()
    })

    listarMascota()
})




function Reset(){
    document.getElementById("ia-nom-mascota").value = "" 
    document.getElementById("ia-especie").value = ""
    document.getElementById("ia-edad").value = ""
    document.getElementById("ia-vacuna").value = ""
    document.getElementById("ia-desc").value = ""
    document.getElementById("ia-link").value = ""
    Actualizar = false
}