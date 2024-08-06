<?php
    require("conexion.php");
    session_start();

    $userconectado = $_SESSION['nombreUsuario'];

    if(!isset($userconectado)){
        header("location:login.php");
    }

    if(isset($_GET['idArt'])){
        $codArt = $_GET['idArt'];
    }

    $check = "SELECT * FROM publicacion WHERE codArticulo='$codArt'";
    $result = mysqli_query($conn,$check);
    if($result->num_rows > 0){
        echo '<script>
                alert("El Articulo ya se encuentra publicado");
                window.location = "busqueda.php"
            </script>';
    }else{
        $sql = "INSERT INTO publicacion(fecha, nombreUsuario, codArticulo) 
                VALUES (NOW(),'$userconectado','$codArt')";
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
        if($result){
            echo '<script>
                    alert("Articulo Publicado Correctamente");
                    window.location = "principal.php"
                </script>';
        }else{
            echo '<script>
                    alert("Error");
                    window.location = "busqueda.php"
                </script>';
        }
    }
?>