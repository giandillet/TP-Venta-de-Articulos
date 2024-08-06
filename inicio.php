<?php
    require('conexion.php');
    $query = "SELECT rubroID, nombreRubro FROM rubro ORDER BY nombreRubro ASC";
    $resultado = mysqli_query($conn,$query);
    mysqli_close($conn);
?>

<html>
    <head>
        <title>Bienvenido a Market</title>
    </head>
    <body align=center>
        <h1>Bienvenido a Market</h1>
        <form name="iniciarSesion" id="iniciarSesion" action="login.php">
            <button type="submit">Iniciar Sesion</button>
        </form>
        <form name="registrarse" id="registrarse" action="registro.php">
            <button type="submit">Registrate</button>
        </form>
        <form name="buscador" id="buscador" action="buscar-publicacion.php" method="POST">
        <p>
            <label>Busca un Producto por su Nombre<br/>
            <input type="text" name="articulo" placeholder="Ingrese un termino de busqueda" size="32"/>
            <button type="submit" name="buscar" id="buscar">Buscar</button></label>
        </p>
        </form>
        <form name="buscarRubro" id="buscarRubro" action="buscar-publicacion.php" method="POST">
            <label>Busca un Producto segun su Rubro<br/>
            <select name="cbx_rubro" id="cbx_rubro">
                <?php WHILE($row = $resultado->fetch_assoc()){ ?>
                    <option value="<?php echo $row['nombreRubro'];?>"><?php echo $row['nombreRubro'];?></option>
                <?php } ?>
            </select>
            <button type="submit" name="buscar" id="buscar">Buscar</button></label>
        </form>
    </body>
</html>