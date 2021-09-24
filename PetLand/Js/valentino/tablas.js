var tablaMascotas = localStorage.getItem("tablaMascotaStorage");
tablaMascotas = JSON.parse(tablaMascotas);
if (tablaMascotas == null) {
    var tablaMascotas = [];
}

function listar() {
    console.log("Ingresando a listar...");

    var dataFila = '';
    if (tablaMascotas.length > 0) {
        for (const i in tablaMascotas) {
            var varDoctor = JSON.parse(tablaMascotas[i]);
            dataFila += "<tr>";
            dataFila +="<td class='align-middle'>"+varDoctor.nombre+"</td>";
            dataFila +="<td class='align-middle'>"+varDoctor.tipo+"</td>";
            dataFila +="<td class='align-middle'>"+varDoctor.dia+"</td>";
            dataFila +="<td class='align-middle'>"+varDoctor.mes+"</td>";
            dataFila +="<td class='align-middle'>"+varDoctor.año+"</td>";
            dataFila +="<td class='align-middle'>"+varDoctor.especialidad+"</td>";
            dataFila +="<td class='align-middle'>"+varDoctor.turno+"</td>";
            dataFila +="<td>"+
            "<a href='Valentino_citas.html?Editar="+ i +"' class='btn btn-warning'>Editar</a>"
            "</td>";
            dataFila +="</tr>";
        }
        document.getElementById("dataMascotas").innerHTML = dataFila;
    }
}
