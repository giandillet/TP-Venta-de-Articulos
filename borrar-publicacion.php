<?php
    require 'conexion.php';
    session_start();
    $userconectado = $_SESSION['nombreUsuario'];

    if(!isset($userconectado)){
        header("location:login.php");
    }else{

    /*if(isset($_GET['idPub'])){
        $idPub = $_GET['idPub'];
    }*/

    if(isset($_POST['idPub'])){
        $idPub = $_POST['idPub'];
    }else{
        header("location:principal.php");
    }
    echo $idPub;

    $sqlcons="DELETE FROM consultas WHERE idPublicacion='$idPub'";
    $resultado = mysqli_query($conn,$sqlcons);
    if($resultado){
        $sql = "DELETE FROM publicacion WHERE idPublicacion='$idPub'";
        $resultado = mysqli_query($conn,$sql);
        mysqli_close($conn);
        if($resultado){
            echo '<script>
                    alert("Publicacion Eliminada Correctamente");
                    window.location = "principal.php"
                </script>';
        }else{
            echo '<script>
                    alert("Hubo un error al borrar la publicacion");
                    window.location = "principal.php"
                </script>';
        }
    }else{
        echo '<script>
                    alert("Hubo un error borrando la publicacion");
                    window.location = "principal.php"
                </script>';
    }
    }
?>