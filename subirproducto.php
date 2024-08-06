<?php
    session_start();
    $userconectado = $_SESSION['nombreUsuario'];

    if(!isset($userconectado)){
        header("location:login.php");
    }

    require('conexion.php');
    $query = "SELECT rubroID, nombreRubro FROM rubro ORDER BY nombreRubro ASC";
    $resultado = mysqli_query($conn,$query);
    mysqli_close($conn);
?>

<html>
    <head>
        <title>Publicar Producto</title>
    </head>
    <body>
        <h1>Publica tu Producto en Market</h1>
        <form name="productform" id="productform" action="subir-articulo.php" method="post" enctype="multipart/form-data">
            <p>
                <label>Nombre del Producto<br/>
                <input type="text" name="nombre" id="nombre" value=""/></label>
            </p>
            <p>
                <label>Descripcion<br/>
                <textarea type="textarea" name="descripcion" id="descripcion" value=""></textarea></label>
            </p>
            <p>
                <label>Precio<br/>
                <input type="number" name="precio" id="precio" value=""/></label>
            </p>
            <p>
                <label>Rubro<br/>
                <select name="cbx_rubro" id="cbx_rubro">
                    <option value=0></option>
                    <?php WHILE($row = $resultado->fetch_assoc()){ ?>
                        <option value="<?php echo $row['nombreRubro'];?>"><?php echo $row['nombreRubro'];?></option>
                    <?php } ?>
                    </select>
            </p>
            <p>
                <label>Ingrese una Imagen</br>
                <input type="file" name="foto" id="foto"/></label>
            </p>
            <p>
                <button type="submit">Subir</button>
            </p>
        </form>
        <a href="principal.php">Volver al menu Principal</a>
    </body>
</html>