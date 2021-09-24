var tablaveterinaria = localStorage.getItem("veterinarialocalstorage");
tablaveterinaria = JSON.parse(tablaveterinaria);
if (tablaveterinaria == null) {
    var tablaveterinaria = [];
}else{
    listar()
}

function listar() {
    console.log("Ingresando a listar...");

    var dataFila = '';
    if (tablaveterinaria.length > 0) {
        for (const i in tablaveterinaria) {
            var varveteri = JSON.parse(tablaveterinaria[i]);
            dataFila += "<tr>";
            dataFila +="<td class='align-middle'>"+varveteri.idespecie+"</td>";
            dataFila +="<td class='align-middle'>"+varveteri.idnombmascota+"</td>";
            dataFila +="<td class='align-middle'>"+varveteri.idedad+"</td>";
            dataFila +="<td class='align-middle'>"+varveteri.idcboestado+"</td>";
            dataFila +="<td class='align-middle'>"+varveteri.iddueño+"</td>";
            dataFila +="<td class='align-middle'> <a href='Jois_formulario.html?Editar=" + i +"' class='btn btn-warning'>Editar</a> </td>";
            dataFila +="</tr>";
        }
        document.getElementById("informaveterinaria").innerHTML = dataFila;
    }
}