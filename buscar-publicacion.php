<html>
    <?php
        require 'conexion.php';
        session_start();

        if(isset($_POST['articulo']))
            $busqueda=$_POST['articulo'];
        else
            if(isset($_POST['cbx_rubro']))
                $busqueda=$_POST['cbx_rubro'];
    ?>
    <head>
        <title>Resultados de la busqueda</title>
    </head>
    <body bgcolor="orange">
        <br>
            <table border="1" align="center" width="75%" height=300px>
            <tbody bgcolor="white">
                <tr>
                    <td align="center" style="font-weight:bold">Nombre Articulo</td>
                    <td align="center" style="font-weight:bold">Foto</td>
                    <td align="center" style="font-weight:bold">Precio</td>
                </tr>
            <?php 
                if($busqueda==""){
                    $sql="SELECT a.nomArticulo, a.foto, a.nombreRubro, a.precio, p.idPublicacion
                     FROM publicacion p JOIN articulo a ON p.codArticulo=a.codArticulo";
                }else{
                    $sql="SELECT a.nomArticulo, a.foto, a.nombreRubro, a.precio, p.idPublicacion
                    FROM publicacion p JOIN articulo a ON p.codArticulo=a.codArticulo
                    WHERE (nomArticulo LIKE '".$busqueda."%' OR nombreRubro='$busqueda')";
                }
                $result= mysqli_query($conn,$sql);
                mysqli_close($conn);
                while($mostrar = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td align="center"><a href='publicacion.php?idPub=<?php echo $mostrar['idPublicacion']?>'>
                                <?php echo $mostrar['nomArticulo']?></a></td>
                    <td align="center"><img src="data:image/jpg;base64,<?php echo base64_encode($mostrar['foto']); ?>"/></td>
                    <td align="center"><?php echo $mostrar['precio']?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        </br>
        <a href="inicio.php">Volver al menu Principal</a>
    </body>
</html>