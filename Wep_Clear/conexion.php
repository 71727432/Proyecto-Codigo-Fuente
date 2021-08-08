<?php
class Conexion_BD{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        /*$this->host = 'localhost';
        $this->db = 'usuarios';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
        */

        $this->host = 'remotemysql.com:3306';
        $this->db = 'rg4Eu4NNZp';
        $this->user = 'rg4Eu4NNZp';
        $this->password = 'uIajnEYR6O';
        $this->charset = 'utf8mb4';
        
    }

    public function connect(){

        try{
            $Conexion = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
        
            $Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false];
    
            $Conect_PDO = new PDO($Conexion, $this->user, $this->password, $Options);
            
            return $Conect_PDO;
        }catch(PDOException $e){
            print_r("Ocurrio un error" . $e->getMessage());
        }

    }

}

?>



