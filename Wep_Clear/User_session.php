<?php

class UserSession{
    public function __construct()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
    }
    public function setCurrentUser($User){
        $_SESSION['user'] = $User;
    }

    public function getCurrectUser(){
        return $_SESSION['user'];
    }
    
    public function closeSession(){
        session_unset();
        session_destroy();
    }

}


?>