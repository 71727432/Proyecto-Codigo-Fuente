<?php 
function Resultado($Num1, $Operacion, $Num2){
    if($Operacion == "+"){ 
    return $Num1 + $Num2;}
    if($Operacion == "-"){
    return $Num1 - $Num2;}
    if($Operacion == "*"){
    return $Num1 * $Num2;}
    if($Operacion == "/"){
    return $Num1 / $Num2;}
    if($Operacion == "^"){
    return $Num1 ** $Num2;}
    if($Operacion == "√"){
    return sqrt($Num1);}
}

function Verificar_Campos($Num1, $Num2){
    if(is_numeric($Num1) && is_numeric($Num2)){
        return true;
    }else{
        return false;
    }
}

function Mensaje_error(){
    echo "Le falta ingresar datos";
}

function Calcular(){
    if(isset($_POST["Resultado"]) && isset($_POST["QueHacer"]) && isset($_POST["Resultado2"])){
        $Numero_1 = $_POST["Resultado"];
        $Numero_2 = $_POST["Resultado2"];
        $Operacion = $_POST["QueHacer"];
        if(Verificar_Campos($Numero_1, $Numero_2)){
        echo "El resultado es " . Resultado($Numero_1, $Operacion, $Numero_2);
        }else{
            Mensaje_error();
        }
    }
    }


?>