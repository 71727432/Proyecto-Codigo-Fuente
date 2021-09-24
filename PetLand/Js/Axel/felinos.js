document.addEventListener("DOMContentLoaded", function() {

    function listarMascota () {
        var dataMascotas = JSON.parse(localStorage.getItem("dataMascotasStorage"))

        if(dataMascotas == null){
            var dataMascotas = []
        }

        var dataFila = '';
        if(dataMascotas.length > 0){
            for(const i  in dataMascotas){
                var item = JSON.parse(dataMascotas[i]);

                if (item.especie == 'Felino') {
                    dataFila += "<div class='col'>";
                    dataFila += "<div class='card h-100'>";
                        dataFila +=  `<div style='background: url("  ${item.link}  "); height: 40vh; max-height: 300px; width: 95%; background-size: cover' class='card-img-top m-auto mt-2' alt=''></div> `
                        dataFila += "<div class='card-body'>";
                            dataFila += "<h5 class='card-title text-center' >" + item.nom_mascota + "</h5>";
                        dataFila += "</div>";
                        dataFila += "<div class='card-footer d-grid'>";
                            dataFila += '<button type="button" class="btn btn-primary" onclick="getInfoMascota(' + i  + ')" data-bs-toggle="modal" data-bs-target="#md-adoptar">Adoptar</button>';
                        dataFila += "</div>";
                    dataFila += "</div>";
                dataFila += "</div>";
                }
            }

            document.getElementById("row-mascotas").innerHTML = dataFila;
        }
    }

    function solicitudAdopcionMascota () {
        let solicitud = JSON.stringify({
            nombre: document.getElementById("ia-nombre").value,
            correo: document.getElementById("ia-correo").value,
            telefono: document.getElementById("ia-telf").value,
            direccion: document.getElementById("ia-dir").value
        })

        //console.log(solicitud)

        var dataSolicitudes = JSON.parse(localStorage.getItem("dataSolicitudesStorage"))

        if (dataSolicitudes == null) {
            var dataSolicitudes = []
        }

        dataSolicitudes.push(solicitud)
        localStorage.setItem("dataSolicitudesStorage", JSON.stringify(dataSolicitudes))
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Su solicitud fue enviada',
            text:  `Ya recibimos la solicitud que acaba de llenar, muy pronto nos comunicaremos con usted para acordar ciertos puntos y ofrecerle su nueva mascota`,
            showConfirmButton: true,
            confirmButtonText: "Continuar"
          })
        document.getElementById("Cerrar_Modal").click()
    
    }

    listarMascota()

    const form_adopcion = document.getElementById('form-adoptar')

    form_adopcion.addEventListener('submit', (e) => {
        e.preventDefault()

        solicitudAdopcionMascota()

        form_adopcion.reset()
    })
})