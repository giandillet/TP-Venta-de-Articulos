<?php
    require 'conexion.php';
    session_start();
    $userconectado = $_SESSION['nombreUsuario'];

    if(!isset($userconectado)){
        header("location:login.php");
    }

?>
<html>
    <head>
        <title>Publicaciones de <?php echo $userconectado?></title>
    </head>
    <body bgcolor=lightgreen>
        <h1 align=center>Articulos de <?php echo $userconectado?></h1>
        <br>
            <table border="1" align="center" width="75%" height=300px>
            <tbody bgcolor="lightgrey">
                <tr>
                    <td align="center" style="font-weight:bold">ID de Publicacion</td>
                    <td align="center" style="font-weight:bold">Nombre del Articulo</td>
                    <td align="center" style="font-weight:bold">Rubro</td>
                    <td align="center" style="font-weight:bold">Precio</td>
                </tr>
            <?php 
                $sql="SELECT p.idPublicacion, a.nomArticulo, a.nombreRubro, a.precio FROM publicacion p JOIN articulo a ON p.codArticulo = a.codArticulo
                        WHERE p.nombreUsuario='$userconectado'";
                $resultado = mysqli_query($conn,$sql);
                while($mostrar = mysqli_fetch_array($resultado)){ 
            ?>
                <tr>
                    <td align="center"><?php echo $mostrar['idPublicacion']?></td>
                    <td align="center"><a href='administrar-publicacion.php?idPub=<?php echo $mostrar['idPublicacion']?>'>
                        <?php echo $mostrar['nomArticulo']?></a></td>
                    <td align="center"><?php echo $mostrar['nombreRubro']?></td>
                    <td align="center"><?php echo $mostrar['precio']?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        </br>
        <a href='principal.php'>Volver al menu principal</a>
    </body>
</html>