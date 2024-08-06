<?php
    require 'conexion.php';
    session_start();

    $userconectado = $_SESSION['nombreUsuario'];

    if(!isset($userconectado)){
        header("location:login.php");
    }

    if(isset($_GET['idPub'])){
        $idPub = $_GET['idPub'];
    }

    $sql="SELECT a.nomArticulo, a.foto, a.descripcion, a.nombreRubro, p.fecha, a.precio, p.idPublicacion
            FROM publicacion p JOIN articulo a ON p.codArticulo=a.codArticulo
            WHERE idPublicacion='$idPub'";
    $consulta = mysqli_query($conn,$sql);
    $resultado = mysqli_fetch_array($consulta);
?>
<html>
    <head>
        <title>Mi Market: <?php echo $resultado['nomArticulo']?></title>
    </head>

    <script type="text/javascript">
        function confirmarBorrado()
        {
            var respuesta = confirm("Esta seguro de querer borrar la publicacion?");

            if(respuesta==true){
                return true;
            }else{
                return false;
            }
        }
    </script>

    <body align=center>
        <h1>Mi Market: <?php echo $resultado['nomArticulo']?></h1>
        <h1>$<?php echo $resultado['precio']?></h1>
        <p><img src="data:image/jpg;base64,<?php echo base64_encode($resultado['foto']); ?>"/></p>
        <p>Descripcion: <?php echo $resultado['descripcion']?></p>
        <p>Rubro: <?php echo $resultado['nombreRubro']?>
        <p>Publicado el <?php echo $resultado['fecha']?></p>

        <h2>Lista de comentarios<h2>
        <table border="1" align="center">
        <tbody bgcolor=lightyellow>
            <tr>
                <td align=center style="font-weight:bold">Fecha del comentario</td>
                <td align=center style="font-weight:bold">Comentario</td>
            </tr>
        <?php
            $query="SELECT fecha, comentario FROM consultas WHERE idPublicacion='$idPub'";
            $consulta = mysqli_query($conn,$query);
            mysqli_close($conn);
            while($resultado = mysqli_fetch_array($consulta)){
        ?>
            <tr>
                <td align=center><?php echo $resultado['fecha']?></td>
                <td align=center><?php echo $resultado['comentario'] ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
        </table>
        <p>
        <!--<a href='borrar-publicacion.php?idPub=<?php echo $idPub?>' onclick="return confirmarBorrado()">Borrar Publicacion</a>-->
        <form name='baja' id='baja' action='borrar-publicacion.php' method=POST>
            <input type='hidden' name ='idPub' id='idPub' value=<?php echo $idPub?>>
            <button type='submit' onclick="return confirmarBorrado()">Borrar Publicacion</button>
        </form>
        </p>
        <p><a href='mis-publicaciones.php'>Volver a Mis Publicaciones</a></p>
    </body>
</html>