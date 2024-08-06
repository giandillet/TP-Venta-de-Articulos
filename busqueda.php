<html>
    <?php
        require 'conexion.php';
        session_start();
        $userconectado = $_SESSION['nombreUsuario'];

        if(!isset($userconectado)){
            header("location:login.php");
        }else{

        if(isset($_POST['articulo']))
            $busqueda=$_POST['articulo'];
        else
            if(isset($_POST['cbx_rubro']))
                $busqueda=$_POST['cbx_rubro'];
    ?>
    <head>
        <title>Resultados de la busqueda</title>
    </head>
    <body bgcolor="bisque">
        <h1 align=center>Articulos de <?php echo $userconectado?></h1>
        <br>
            <table border="1" align="center" width="75%" height=300px>
            <tbody bgcolor="white">
                <tr>
                    <td align="center" style="font-weight:bold">codArticulo</td>
                    <td align="center" style="font-weight:bold">nomArticulo</td>
                    <td align="center" style="font-weight:bold">descripcion</td>
                    <td align="center" style="font-weight:bold">precio</td>
                    <td align="center" style="font-weight:bold">Foto</td>
                    <td align="center" style="font-weight:bold">Rubro</td>
                    <td align="center" style="font-weight:bold">Publicar</td>
                </tr>
            <?php 
                if(!isset($busqueda)){
                    $sql="SELECT * FROM articulo WHERE nombreUsuario='$userconectado'";
                }else{
                    $sql="SELECT * FROM articulo WHERE nombreUsuario='$userconectado' AND
                                    (nomArticulo LIKE '".$busqueda."%' OR nombreRubro='$busqueda')";
                }
                $result= mysqli_query($conn,$sql);
                mysqli_close($conn);
                while($mostrar = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td align="center"><?php echo $mostrar['codArticulo']?></td>
                    <td align="center"><?php echo $mostrar['nomArticulo']?></td>
                    <td align="center"><?php echo $mostrar['descripcion']?></td>
                    <td align="center"><?php echo $mostrar['precio']?></td>
                    <td align="center"><img src="data:image/jpg;base64,<?php echo base64_encode($mostrar['foto']); ?>"/></td>
                    <td align="center"><?php echo $mostrar['nombreRubro']?></td>
                    <td align="center"><a href='publicar.php?idArt=<?php echo $mostrar['codArticulo']?>'>Publicar</a></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        </br>
        <a href="principal.php">Volver al menu Principal</a>
    </body>
    <?php } ?>
</html>