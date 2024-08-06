<?php
    require("conexion.php");
    session_start();
    $userconectado = $_SESSION['nombreUsuario'];

    if(!isset($userconectado)){
        header("location:login.php");
    }else{

    $nomprod = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $rubro = $_POST['cbx_rubro'];
    $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

    $sql = "INSERT INTO articulo(nomArticulo, descripcion, precio, foto, nombreRubro, nombreUsuario) 
            VALUES ('$nomprod','$descripcion','$precio','$imagen','$rubro','$userconectado')";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);
    if($result){
        echo '<script>
                alert("Articulo Registrado Correctamente");
                window.location = "principal.php"
            </script>';
    }else{
        echo '<script>
                alert("Error al ingresar datos");
                window.location = "subirproducto.php"
            </script>';
    }
    }
?>