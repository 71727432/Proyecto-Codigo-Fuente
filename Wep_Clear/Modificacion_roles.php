<?php 

include_once 'conexion.php';

class Actualizar_perfiles extends Conexion_BD{

    private $Perfil_rg;
    private $Perfil_elm;
    private $Mostrar_perfiles;
    private $Mostrar_tarea;
    private $Paswoord_user;

    function Ver_perfiles($ID_User, $Perfil){
    $query = $this->connect()->prepare('SELECT * FROM tareas WHERE Usuario = :id_user');
    $query->execute(['id_user' => $ID_User]);

    foreach ($query as $Mostrar_perfiles){
        $this->Perfil_rg = $Mostrar_perfiles['Tareas_pendiente'];
        $this->Perfil_elm = $Mostrar_perfiles['Tareas_eliminada'];
    }

    if($query->rowCount() == 0){
        $Registrar_perfil = $this->connect()->prepare('INSERT INTO tareas (Usuario, Tareas_pendiente, Tareas_eliminada) VALUE (:user, :pendents, :done)');
        $Registrar_perfil->execute(['user' => $ID_User, 'pendents' => $Perfil , 'done' => $Perfil ]);
    }else{
        if($this->Perfil_rg != ""){
        $Ingresar_perfil = $this->connect()->prepare('UPDATE tareas SET Tareas_pendiente = :pendents , Tareas_eliminada = :done WHERE Usuario = :id_user');
        $Ingresar_perfil->execute(['pendents' => $this->Perfil_rg . "," . $Perfil , 'done' => $this->Perfil_elm . "," . $Perfil , 'id_user' => $ID_User]);
        }else{
            $Ingresar_perfil = $this->connect()->prepare('UPDATE tareas SET Tareas_pendiente = :pendents , Tareas_eliminada = :done WHERE Usuario = :id_user');
            $Ingresar_perfil->execute(['pendents' => $Perfil , 'done' =>  $Perfil , 'id_user' => $ID_User]);
        }
    }

    }

    public function Mostrar_perfiles($Id_user){
        $Consultar_perfiles = $this->connect()->prepare('SELECT * FROM tareas WHERE Usuario = :User_consulta');
        $Consultar_perfiles->execute(['User_consulta' => $Id_user]);

        foreach($Consultar_perfiles as $Perfiles){
            $this->Mostrar_perfiles = $Perfiles['Tareas_pendiente'];
        }

        return $this->Mostrar_perfiles; 

    }    
    function Eliminar_rol($Id, $Nueva_lis){
        $Consultar_perfiles = $this->connect()->prepare('UPDATE tareas SET Tareas_pendiente = :pendents , Tareas_eliminada = :done WHERE Usuario = :id_user');
        $Consultar_perfiles->execute(['pendents'=> $Nueva_lis, 'done' => $Nueva_lis, 'id_user' => $Id]);
    }



    function Insertar_tarea_perfil($Id_user, $Tarea_PERFIL){
        $Tarea = $this->connect()->prepare('SELECT * FROM registro_tareas WHERE Usuario = :user_inset');
        $Tarea->execute(['user_inset'=> $Id_user]);

        if($Tarea->rowCount() == 0){
            $Insertar = $this->connect()->prepare('INSERT INTO registro_tareas (Usuario, Tarea) VALUE (:id_user, :Tareas)');
            $Insertar->execute(['id_user' => $Id_user, 'Tareas'=> $Tarea_PERFIL]);
        }else{
            $Actualizar = $this->connect()->prepare('UPDATE registro_tareas SET Tarea = :Tarea_perfil WHERE Usuario = :Id_user');
            $Actualizar->execute(['Tarea_perfil'=> $Tarea_PERFIL, 'Id_user' => $Id_user]);
        }
    }



    public function Mostrar_tareas_perfiles($Id_user){
        $Mostrar = $this->connect()->prepare('SELECT * FROM registro_tareas WHERE Usuario = :user_inset');
        $Mostrar->execute(['user_inset' => $Id_user]);

        foreach($Mostrar as $Tarea){
            $this->Mostrar_tarea = $Tarea['Tarea'];
        }
        return $this->Mostrar_tarea;

    }

    public function Registro_perfil_adicional( $Tarea_integrada, $Id_user){
        $Ejecutar_ins = $this->connect()->prepare('UPDATE registro_tareas SET Tarea = :Tarea_actualizada WHERE Usuario = :id_user');
        $Ejecutar_ins->execute(['Tarea_actualizada' => $Tarea_integrada, 'id_user'=> $Id_user]);
    }

    public function Ejecutar_cambios($cnt){
        $Cambiar = $this->connect()->prepare('SELECT * FROM registro_de_usuarios WHERE id = :id_user');
        $Cambiar->execute(['id_user' => $cnt]);

        foreach($Cambiar as $Datos_password){
            $this->Paswoord_user = $Datos_password['Contraseña'];
        }
        return $this->Paswoord_user;
    }

    public function Actualizar_nombre($ID, $Nuevo_nombre){
        $Cambio_name = $this->connect()->prepare('UPDATE registro_de_usuarios SET Nombre = :New_name WHERE id = :id_user');
        $Cambio_name->execute(['New_name' => $Nuevo_nombre, 'id_user' => $ID]);
    }

    public function Actualizar_correo($ID, $Nuevo_correo){
        $Cambio_name = $this->connect()->prepare('UPDATE registro_de_usuarios SET Correo = :New_email WHERE id = :id_user');
        $Cambio_name->execute(['New_email' => $Nuevo_correo, 'id_user' => $ID]);
    }

    public function Actualizar_usuario($ID, $Nuevo_user){
        $Cambio_name = $this->connect()->prepare('UPDATE registro_de_usuarios SET Usuario = :New_user WHERE id = :id_user');
        $Cambio_name->execute(['New_user' => $Nuevo_user, 'id_user' => $ID]);
    }

    public function Actualizar_contraseña($ID, $Nuevo_password){
        $Cambio_name = $this->connect()->prepare('UPDATE registro_de_usuarios SET Contraseña = :New_password WHERE id = :id_user');
        $Cambio_name->execute(['New_password' => $Nuevo_password, 'id_user' => $ID]);
    }

}
?>