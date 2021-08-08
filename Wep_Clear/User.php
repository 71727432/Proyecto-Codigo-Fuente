<?php

include_once 'conexion.php';

class User extends Conexion_BD{
    private $Nombre;
    private $Usuario;
    private $ID;
    private $Foto;
    private $Formato_foto;
    public function User_Exists($user , $password){
        $query = $this->connect()->prepare('SELECT * FROM registro_de_usuarios WHERE Usuario = :user AND Contraseña = :password');
        $query->execute(['user' => $user, 'password' => $password]);

        if($query->rowCount()){
            return true;
        }else{return false; }
    }
    public function Usuario_registrado($user){
        $query = $this->connect()->prepare('SELECT * FROM registro_de_usuarios WHERE Usuario = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $Current_User){
            $this->Nombre = $Current_User['Nombre'];
            $this->Usuario = $Current_User['Usuario'];
            $this->ID = $Current_User['id'];
            $this->Foto = $Current_User['Foto'];
            $this->Formato_foto = $Current_User['Tipo_de_foto'];
        }
    }

    public function Obtener_id(){
        return $this->ID;
    }

    public function Obtener_nombre(){
        return $this->Nombre;
    }

    public function Mostrar_foto(){
        return $this->Foto;
    }


    //MANEJO DE CREAR CUENTAS

    public function Registro_repetido($Usuario, $Contraseña){
        $query = $this->connect()->prepare('SELECT * FROM registro_de_usuarios WHERE Usuario = :user AND Contraseña = :password');
        $query->execute(['user' => $Usuario, 'password' => $Contraseña]);

        if($query->rowCount() == 0){
            return true;
        }else{
            return false;
        }

    }

    public function registrar_user_db($Nombre, $Apellido, $Usuario, $Contraseña, $Correo){
        $Registrar_new_user = $this->connect()->prepare("INSERT INTO registro_de_usuarios (Nombre, Apellido, Usuario, Contraseña, Correo, Foto, Tipo_de_foto) VALUES (:name_user, :last_name, :user, :password_user, :email, :Foto_publicar, :Formato_photo)");
        $Registrar_new_user->execute(['name_user' => $Nombre, 'last_name' => $Apellido, 'user' => $Usuario, 'password_user' => $Contraseña, 'email' => $Correo, 'Foto_publicar' => '0x89504e470d0a1a0a0000000d49484452000000e1000000e10803000000096d224800000057504c5445e9e9e97d7d7dececec787878eeeeee777777bcbcbc747474dcdcdcd6d6d6e7e7e7999999808080e2e2e2c7c7c7cfcfcf919191888888a0a0a0b5b5b5afafafcbcbcba8a8a8858585b0b0b08d8d8dc0c0c09e9e9e959595bc6b10ba0000076e49444154789ced9dd97ae3200c466d21bc6f8913bb4ef2fecf39b8b1dbac8e1710d0e1dccd5c34fe3f81400224cf73381c0e87c3e170381c0e87c3e170381c0e87c3e170382c0300f017f12fdd1f24915e5a129545ddecd32bcd2138c6b9f8efbf201310e2a2a95a9f71760bf7b35d5a97b9e52a01f363d3fa9cf92f1142b3aa8ead1509e815a950f15add8dccf610dba811306e3ecb1b4576270f757ff13200cbcbbbb1f912ee1f728b34021e77e102795743f2c61a8d18578bf55d357e2536cc47c8f7abf47d6bcc0ae3770200277fc9fc7b24bc44664b84285d6dc0c18c2c305922169b0c389831cdcdd578d868c02b2c2bcd74aa905cb80c81bdc6c0448910edb68fd091f060de40c532932750ec71ceba053d82a544793d2cd52de91e3c4a16282456896e5537281068961521ce1428f4d9d914770379ab42a090d818b26824954c2f7a27d18c7511f6aa040a4a03062a06b27632af6873ddfa849751a8af77a8fa8db853aad0e7baa7221e548ed11ea637248658a19719145e740af4bc4ab540314e4f1a8d08272921ef07328dfe3451b25b7b84eb0b16b156ed6606b41931a7d1e7335d46c45ab9231dd164c4844a9f2e23c2896816f66889f741f17eed162d6b2294146be148a761778a0d999f118431bd118152a0cfbec88d0847423f2368c915a2cadcc50be88729d20af4594d6c4488293d694f45ad906ec73610d20af4f0422cd0e747da8988d402c9276244bb56f40a53528570a49e86be9f912a240c0d7fe0a44122f57adfc348d77c24c8223e292c48159224d91e14925e96027a813e3b50ba1aaa2cdb9dc23da5c288ded1d02e88040732ffa342d25c8d53e814ae833206d6e369ce7f7e3d240d9fb42824ddd3d087f8d4413e129eca8cd09ece60aa213e24bde3467b2c33288c0805d29e8e8e0a69335125bd0da98f10c915525f18a677a6d407ddf4ae26247534622216e4ae86fa8834213e5da3cdd2f46047ab9093664b7ba80f1039b13e41443a4c6983c32bb4c3947e908a61aaf49dc5238c5c9f202154a8e70514e5a2afe3d217ed85938b9e4bc240160687c4f7307e1492ddbfac745dd6870b8d11a9afd2dc288c69dca9c677414a1f57fec0353eb384884020dbeb7cbc0604af6632bdcff312e5bb53dd4f2c9527ddf4d71d50fdba4bf318fd46e9a2a8236a7a042285f7a3b8115515144e45dd6f8047d4d51c684da989a5ecc9ba015e6600f72a24d21e187e00cef22572b36a9aa17489ec689440f90395c5860994ee6ecc132824ca3bf966c62c13f7482b4ac7cf9e9102fb9258522a27923fc45b00c0d7662bb29d8953f0172cbb6d1a5963e614fc05927a4395565e99b5ccbf06a3fdcc4ae54ffadac05417730fc0c272e55758f6654d416f6188325d68476e93be1e80b8f1672f1d2cec02bbf4f500e4c1259c6148c6fda6b4ad71c0007a517de1535392b130db1789f185d827402f2f9a8a87fc695a32c6c32cad63abe55d110a92f87448bb2cfc81b7d5be2ea2be478beecf930440df1d08f2e84adf38c81a71967ce65a009393628d9068b4b5d8bbecc3b052ba53166175a5abe7054051f5cb1df3d5a58cc06b42df0fb320a15f2e85be6ebc8911368a9aa7603c94eae77e4dad11cadb5632bc53716509bc9b0b9e3c533de1efc0a756324cbe1931eeeef6b56147163a029c9e334ebc95eb0f306f9ef6ed9c28fcc7287d193384a9bcde62e005afd276aca5c883bf32e0f0fbbc89a47c0078c7ee4de0a560363cfe78f23c786e7edf171ab77e017845f5fe3758a7361307d1c48f0f1ab78d55b1499afe0996150a2562d97e8c68194b8f6b375a8051fdb9590dab950d542c3efdf8a071f7b5c290628f5b9c67252279a3429db7e8b89ef955102d694d09e8954d3b3779c55225fe66e1e919f3bbbaf470c622098879b19f2deffb8f5f14485c713cc858960665826f657ef7cf8d8a4337b7d9e5ef9fde495ffc579e7f32f1e9bb263846ded805f89b6b4fe03c2ebed26cb13a3512714b47b5efeeb859d777011ee83b03efae5d7357ffd14aaec040c29df5bb76c0db8f525927d188585097f29c83c43a19b4559fe723ed5a1fe8287b358b50d2f5e144430d8c998452ee85e1d95413f6485833c87a58ac826d7f2f04b2fb1a4a66fbc3c4dcdc4978856f0c17699efd6c22db3415f164bcc08d7dcb22458d0da5b2a585a00563b467fda31328ac10b8a19ba7f17e7464edc31a3cd86142c16e55a31d7337dccfaceb6042f7165d062b9c8da941e16b56bda425aeb0b391e56525683a1b4a647962ca96956264696109eb4cb8bc2c816d265c6a4430327df881453391b22d9e3496a4a5e068a10917058a3afa734860fe9a48df8f4b0ef30b0fea68222385d9bd76729333a453cc7df40681a526f4fd6cde44441bd24faf99b76050157f52c1bc23451da5baa511ce4a67e8feca2df0193da134140896c9eef33035fbb8f023332a4627560b9c71adcf963cf75b3e0e536b776c239f3b2868688a27954f1df674f43c90cc657a98e2f69a08da995ef42d8d7d6f61d319298a5a968a996e9aa4a309ae74267b9958746438c154a4ff07a6e1872268b9bdc1ef2f53b90c88757f9d0ca6c260cb23a791f6fd28b53abcbfe1fdd6142fbabf4d0a53aec6c6039967263a43a9ac264bc8fb5dcddf70a54fcef41f5bd685d025d3f18e0000000049454e44ae426082',
        'Formato_photo' => 'No tiene' ]);
    }


    public function Actualizar_Foto($ID_user, $Direccion_foto, $Formato_foto){
        $Renovar = $this->connect()->prepare("UPDATE registro_de_usuarios SET Foto = :new_foto , Tipo_de_foto = :format_photo WHERE id = :id_user");
        $Renovar->execute(['new_foto' => $Direccion_foto, 'format_photo' => $Formato_foto,  'id_user' => $ID_user ]);
    }


    public function Tipo_De_foto(){
        return $this->Formato_foto;
    }



}


?>