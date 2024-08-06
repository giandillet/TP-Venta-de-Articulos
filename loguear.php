<?php 
    require 'conexion.php';
    session_start();

    $usuario= $_POST['usuario'];
    $clave= $_POST['clave'];

    $sql= "SELECT COUNT(*) as contar from usuarios where nombreUsuario = '$usuario' and clave = '$clave'";
    $consulta = mysqli_query($conn,$sql);
    $array = mysqli_fetch_array($consulta);

    if($array['contar']>0){
        $_SESSION['nombreUsuario']=$usuario;
        header("location:principal.php");
    }else{
        echo "Usuario o Clave incorrecta";
    }
?>