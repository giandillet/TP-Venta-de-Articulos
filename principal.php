<?php
    session_start();
    $userconectado = $_SESSION['nombreUsuario'];

    if(!isset($userconectado)){
        header("location:login.php");
    }

    //el echo(rand()) es para que el .css se actualize en tiempo real, sino no mostraba los cambios
?>
<html>
    <head>
        <title>Market</title>
        <link rel="stylesheet" href="estilo-principal.css?v=<?php echo(rand()); ?>"/>
    </head>
    <body>
        <h1>Bienvenido <?php echo $userconectado ?></h1>
        <form name="formpublicar" id="formpublicar" action="subirproducto.php">
            <button type="submit">Subir Articulo</button>
        </form>

        <form name="buscador" id="buscador" action="busqueda.php" method="POST">
            <p>
                <label>Buscar entre mis Articulos<br/>
                <input type="text" name="articulo" id="articulo" placeholder="Ingrese un termino de busqueda" size="32"/>
                <button type="submit" name="buscar" id="buscar">Buscar</button></label>
            </p>
        </form>
        <div>
            <a href='mis-publicaciones.php'>Revisar mis Publicaciones</a>
        </div>
        <form name='salidaform' id='salidaform' action='salir.php'> 
            <p> <button type='submit' name='salir' id='salir'>Cerrar Sesion</button></p>
        </form>
    </body>
</html>