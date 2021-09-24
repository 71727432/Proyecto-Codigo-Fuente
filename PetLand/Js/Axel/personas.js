document.addEventListener("DOMContentLoaded", function() {

    function listarSolicitudes(){

        

        var dataPersonas = localStorage.getItem("dataSolicitudesStorage")
    
        dataPersonas = JSON.parse(dataPersonas)
        
        if(dataPersonas == null){
            var dataPersonas = []
        }

        var dataFila = '';

        if(dataPersonas.length > 0){
            for(const i  in dataPersonas){
                var item = JSON.parse(dataPersonas[i]);
                dataFila += "<tr>";
                    dataFila += "<td>" + i + "</td>";
                    dataFila += "<td>" + item.nombre + "</td>";
                    dataFila += "<td>" + item.correo + "</td>";
                    dataFila += "<td>" + item.telefono + "</td>";
                    dataFila += "<td>" + item.direccion + "</td>";
                dataFila += "</tr>";
            }

            document.getElementById("tb-persona").getElementsByTagName('tbody')[0].innerHTML = dataFila;
        }
    }

    listarSolicitudes()

})