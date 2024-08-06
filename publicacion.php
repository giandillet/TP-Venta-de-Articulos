<html>
    <?php 
        require 'conexion.php';
        session_start();

        if(isset($_GET['idPub'])){
            $idPub = $_GET['idPub'];
        }
        $sql="SELECT a.nomArticulo, a.foto, a.descripcion, a.nombreRubro, p.fecha, p.nombreUsuario, a.precio, p.idPublicacion
                    FROM publicacion p JOIN articulo a ON p.codArticulo=a.codArticulo
                    WHERE idPublicacion='$idPub'";
        $consulta = mysqli_query($conn,$sql);
        $resultado = mysqli_fetch_array($consulta);
        mysqli_close($conn);
    ?>
    <head>
        <title>Market: <?php echo $resultado['nomArticulo']?></title>
    </head>
    <body align=center>
        <h1><?php echo $resultado['nomArticulo']?></h1>
        <h1>$<?php echo $resultado['precio']?></h1>
        <p><img src="data:image/jpg;base64,<?php echo base64_encode($resultado['foto']); ?>"/></p>
        <p>Descripcion: <?php echo $resultado['descripcion']?></p>
        <p>Rubro: <?php echo $resultado['nombreRubro']?></p>
        <p>Publicado por <?php echo $resultado['nombreUsuario']?> el <?php echo $resultado['fecha']?></p>
        
        <form name="comentar" id="comentar" action="comentar.php?idPub=<?php echo $idPub?>" method="post">
            <p>
                <label>Ingrese un comentario</br>
                <textarea type="textarea" name="comentario" id="comentario" value="" cols="40" rows="6"></textarea></label>
            </p>
            <p>
                <button type="submit">Publicar Comentario</button>
            </p>
        </form>
    </body>
</html>