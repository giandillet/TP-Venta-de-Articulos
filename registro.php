<html>
    <head>
        <title>Registrate en Market</title>
        <link rel="stylesheet" href="estilo-registro.css"/>
    </head>
    <body>
            <h1>Registrate en Market</h1>
            <center>
            <form name="formaregistro" id="formaregistro" action="registrar.php" method="POST">
                <p>
                    <label>Nombre<br/>
                    <input type="text" name="nombre" id="nombre" value=""/></label>
                </p>
                <p>
                    <label>Apellido<br/>
                    <input type="text" name="apellido" id="apellido" value=""/></label>
                </p>
                <p>
                    <label>Sexo<br/>
                    <label id="botonera">
                    <input type="radio" name="genero" <?php if(isset($genero) && $genero=="femenino") echo "checked" ?>value="F">Femenino
                    <input type="radio" name="genero" <?php if(isset($genero) && $genero=="masculino") echo "checked" ?>value="M">Masculino
                    <input type="radio" name="genero" <?php if(isset($genero) && $genero=="otro") echo "checked" ?>value="O">Otro</label></label>
                </p>
                <p>
                    <label>Fecha de Nacimiento<br/>
                    <input type="date" name="nacimiento" id="nacimiento" value="yyyy-mm-dd" max="2021-12-05"></label>
                </p>
                <p>
                    <label>E-Mail<br/>
                    <input type="text" name="email" id="email" value=""/></label>
                </p>
                <p>
                    <label>Telefono<br/>
                    <input type="text" name="telefono" id="telefono" value=""/></label>
                </p>
                <p>
                    <label>Nombre de Usuario<br />
                    <input type="text" name="usuario" id="usuario" value=""/></label>
                </p>
                <p>
                    <label>Clave<br />
                    <input type="password" name="clave" id="clave" value=""/></label>
                </p>
                <p class="submit">
                    <input type="submit" name="register" id="register" class="button" value="Registrar"/>
                </p>
            </form>
            </center>
            <div class="clearfix"></div>
            <p>
                Ya tienes una cuenta en Market? <a href="login.php">Inicia Sesion Aqui</a>!
            </p>
            <p>
                <a href="inicio.php">Volver a Inicio</a>
            </p>
    </body>
</html>