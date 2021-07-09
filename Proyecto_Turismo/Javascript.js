

//SLIDER_01-------------------------------------------------------------------------- 
var Boton_derecha = document.getElementById("Derecha")
var Boton_izquierda = document.getElementById("Izquierda")


Boton_derecha.addEventListener('click', Mover_Slider_Derecha)

Avazar = 0
function Mover_Slider_Derecha(){
    
        if(Avazar == 238.4){
        Avazar = 0
        document.getElementById("Mover_Silder").style.left = "-" + Avazar + "vh"}
    
        else{
            Avazar = Avazar + 59.6
            document.getElementById("Mover_Silder").style.left = "-" + Avazar + "vh"}

    }



Boton_izquierda.addEventListener('click', Mover_Slider_Izquierda)
function Mover_Slider_Izquierda(){ 

    if((Avazar ==  -59.6)||(Avazar == -59.59999999999999) || (Avazar == 0) ){
        Avazar = 238.4
        document.getElementById("Mover_Silder").style.left = "-"  + Avazar + "vh"
    }
    else{
        Avazar = Avazar - 59.6
        document.getElementById("Mover_Silder").style.left =  "-" + Avazar + "vh"} 
}

//SLIDER_02--------------------------------------------------------------------------

var Mover_Derecha_slider_2 = document.getElementById("Derecha_slider_2")
var Mover_Izquierda_slider_2 = document.getElementById("Izquierda_slider_2")

Avazar_Slider_2 = 0

Mover_Derecha_slider_2.addEventListener('click', Mover_Derecha_Slider_2)
function Mover_Derecha_Slider_2(){

    if(Avazar_Slider_2 == 238.4){
        Avazar_Slider_2 = 0
        document.getElementById("Mover_Silder_slider_2").style.left = "-" + Avazar_Slider_2 + "vh"}
    
    else{
        Avazar_Slider_2 = Avazar_Slider_2 + 59.6
        document.getElementById("Mover_Silder_slider_2").style.left = "-" + Avazar_Slider_2 + "vh"}
}

Mover_Izquierda_slider_2.addEventListener('click', Mover_Izquierda_Slider_2)
function Mover_Izquierda_Slider_2(){ 

    if((Avazar_Slider_2 ==  -59.6)||(Avazar_Slider_2 == -59.59999999999999) || (Avazar_Slider_2 == 0) ){
        Avazar_Slider_2 = 238.4
        document.getElementById("Mover_Silder_slider_2").style.left = "-"  + Avazar_Slider_2 + "vh"
    }
    else{
        Avazar_Slider_2 = Avazar_Slider_2 - 59.6
        document.getElementById("Mover_Silder_slider_2").style.left =  "-" + Avazar_Slider_2 + "vh"} 
}

//SLIDER_03--------------------------------------------------------------------------


var Mover_Derecha_slider_3 = document.getElementById("Derecha_slider_3")
var Mover_Izquierda_slider_3 = document.getElementById("Izquierda_slider_3")

Avazar_Slider_3 = 0

Mover_Derecha_slider_3.addEventListener('click', Mover_Derecha_Slider_3)
function Mover_Derecha_Slider_3(){

    if(Avazar_Slider_3 == 238.4){
        Avazar_Slider_3 = 0
        document.getElementById("Mover_Silder_slider_3").style.left = "-" + Avazar_Slider_3 + "vh"}
    
    else{
        Avazar_Slider_3 = Avazar_Slider_3 + 59.6
        document.getElementById("Mover_Silder_slider_3").style.left = "-" + Avazar_Slider_3 + "vh"}
}

Mover_Izquierda_slider_3.addEventListener('click', Mover_Izquierda_Slider_3)
function Mover_Izquierda_Slider_3(){ 

    if((Avazar_Slider_3 ==  -59.6)||(Avazar_Slider_3 == -59.59999999999999) || (Avazar_Slider_3 == 0) ){
        Avazar_Slider_3 = 238.4
        document.getElementById("Mover_Silder_slider_3").style.left = "-"  + Avazar_Slider_3 + "vh"
    }
    else{
        Avazar_Slider_3 = Avazar_Slider_3 - 59.6
        document.getElementById("Mover_Silder_slider_3").style.left =  "-" + Avazar_Slider_3 + "vh"} 
}