<?php
    require("conexion.php");
    session_start();

    if(isset($_GET['idPub'])){
        $codPub = $_GET['idPub'];
    }

    if(isset($_POST['comentario'])){
        $comentario=$_POST['comentario'];
    }

    $check = "SELECT * FROM publicacion WHERE idPublicacion=$codPub";
    $result = mysqli_query($conn,$check);
    
    if(!$result){
        echo '<script>
                alert("Publicacion No Encontrada");
                window.location = "inicio.php"
              </script>';
    }else{
        $sql = "INSERT INTO consultas(fecha, idPublicacion, comentario) 
              VALUES (NOW(),'$codPub','$comentario')";
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
        if($result){
            echo '<script>
                    alert("El comentario ha sido Enviado");
                    window.location = "inicio.php"
                </script>';
        }else{
            echo '<script>
                    alert("Error");
                    window.location = "inicio.php"
                </script>';
        }
    }
?>