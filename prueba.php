<?php
<<<<<<< HEAD
$entrada = $_POST['user'];
    $usuario = json_decode($entrada);
=======
    $entrada = $_POST['user'];
    $usuario = json_decode($entrada);
    //echo $entrada;
>>>>>>> 42cb72956bc69105ae9c56abee456026acf7b03c
    echo 'mapeo de usuario del servidor'.json_encode($usuario);
    http_response_code(200);
?>