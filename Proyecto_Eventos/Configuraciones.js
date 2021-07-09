

function Mostrar_Modal(){

    document.getElementById("Modal01").style.display = "flex"
    document.getElementById("Contenedor_modal").style.display = "flex"
    document.getElementById("Modal_img01").style.display = "flex"
    document.getElementById("IMG__1").style.display = "flex"

}


function Mostrar_Modal2(){

    document.getElementById("Contenedor_modal").style.display = "none"

    document.getElementById("Modal01").style.display = "flex"
    document.getElementById("Contenedor_modal2").style.display = "flex"
    document.getElementById("Modal_img02").style.display = "flex"
    document.getElementById("IMG__2").style.display = "flex"



}


function Mostrar_Modal3(){

    document.getElementById("Contenedor_modal").style.display = "none"


    document.getElementById("Modal01").style.display = "flex"
    document.getElementById("Contenedor_modal3").style.display = "flex"
    document.getElementById("Modal_img03").style.display = "flex"
    document.getElementById("IMG__3").style.display = "flex"

}


function Mostrar_Modal4(){

    document.getElementById("Contenedor_modal").style.display = "none"


    document.getElementById("Modal01").style.display = "flex"
    document.getElementById("Contenedor_modal4").style.display = "flex"
    document.getElementById("Modal_img04").style.display = "flex"
    document.getElementById("IMG__4").style.display = "flex"

}


function Mostrar_Modal5(){

    document.getElementById("Contenedor_modal").style.display = "none"


    document.getElementById("Modal01").style.display = "flex"
    document.getElementById("Contenedor_modal5").style.display = "flex"
    document.getElementById("Modal_img05").style.display = "flex"
    document.getElementById("IMG__5").style.display = "flex"

}


function Mostrar_Modal6(){

    document.getElementById("Contenedor_modal").style.display = "none"


    document.getElementById("Modal01").style.display = "flex"
    document.getElementById("Contenedor_modal6").style.display = "flex"
    document.getElementById("Modal_img06").style.display = "flex"
    document.getElementById("IMG__6").style.display = "flex"

}

document.getElementById("Cerrar").addEventListener('click', Cerrar_Modal)

function Cerrar_Modal(){
    document.getElementById("Modal01").style.display = "none"
    document.getElementById("Contenedor_modal").style.display = "none"

    document.getElementById("Modal01").style.display = "none"
    document.getElementById("Contenedor_modal2").style.display = "none"

    document.getElementById("Modal01").style.display = "none"
    document.getElementById("Contenedor_modal3").style.display = "none"

    document.getElementById("Modal01").style.display = "none"
    document.getElementById("Contenedor_modal4").style.display = "none"
    
    document.getElementById("Modal01").style.display = "none"
    document.getElementById("Contenedor_modal5").style.display = "none"

    document.getElementById("Modal01").style.display = "none"
    document.getElementById("Contenedor_modal6").style.display = "none"

}


function Menu_Responsive(){
    
    document.getElementById("Menu_Responsive").style.display = "flex"
    
    
}

function Cerrar_Menu(){
    document.getElementById("Menu_Responsive").style.display = "none"

}