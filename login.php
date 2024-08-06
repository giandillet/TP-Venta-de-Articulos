<html>
    <head>
        <title>Inicia Sesion en Market</title>
        <link rel="stylesheet" href="estilo-login.css"/>
    </head>
    <body>
        <h1>Inicia Sesion en Market</h1>
        <center>
        <form name="formalogin" id="formalogin" action="loguear.php" method="POST">
            <p>
                <label for="user_login" id="labelform">Usuario<br/>
                <input type="text" name="usuario" placeholder="usuario"/></label>
            </p>
            <p>
                <label for="user_pass" id="labelform">Clave<br/>
                <input type="password" name="clave" placeholder="clave"/></label>
            </p>
            <p>
                <button type="submit">Iniciar Sesion</button>
            </p>
        </form>
        </center>
            <p>
                No tienes una cuenta en Market? <a href="registro.php">Registrate Aqui</a>!
            </p>
            <p>
                <a href="inicio.php">Volver a Inicio</a>
            </p>
    </body>
</html>