<?php 
    require_once("conexion.php");
    session_start();

    if(isset($_POST['register'])){
        if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['genero']) && !empty($_POST['nacimiento']) && !empty($_POST['email'])
            && !empty($_POST['telefono']) && !empty($_POST['usuario']) && !empty($_POST['clave'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $sexo = $_POST['genero'];
            $nacimiento = $_POST['nacimiento'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];

            $sql = "SELECT * FROM usuarios WHERE email=$email";
            $query = $conn;
            $result = mysqli_query($conn,$sql);

            if($result){
                echo '<p>E-Mail ya registrado</p>';
            }else{
                $sqldos = "SELECT * FROM usuarios WHERE nombreUsuario=$usuario";
                $resultado = mysqli_query($query,$sqldos);
                if(!$resultado){
                    $registrar = "INSERT INTO usuarios (nombre, apellido, sexo, fechaNacimiento, email, telefono, nombreUsuario, clave) 
                                VALUES('$nombre','$apellido','$sexo','$nacimiento','$email','$telefono', '$usuario', '$clave')";
                    $resultados = mysqli_query($conn,$registrar);
                    mysqli_close($conn);
                    if($resultados){
                        echo '<script>
                            alert("Usuario Registrado Correctamente");
                            window.location = "inicio.php"
                            </script>';
                    }else{
                        echo '<script>
                            alert("Error al ingresar datos");
                            window.location = "registro.php"
                            </script>';
                    }
                }else{
                    echo '<script>
                            alert("El usuario ingresado ya existe, por favor intente otro");
                            window.location = "registro.php"
                            </script>';
                }
            }
        }else{
            echo '<script>
                            alert("Complete todos los campos");
                            window.location = "registro.php"
                            </script>';
        }
    }
?>