<?php

include_once 'User_session.php';
$User_close = new UserSession();
$User_close->closeSession();
header("location: index.php")


?>