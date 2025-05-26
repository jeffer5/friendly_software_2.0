<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/stylesresul.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div class="sidebar">
        <a href="index.php">Inicio</a>
        
        <a onclick="toggleSubmenu('perfilSubmenu', this)">
            Operario <span class="toggle-icon">></span>
        </a>
        <div class="submenu" id="perfilSubmenu">
            <a href="index.php?action=conUsu">Consular operario</a>
        </div>

        <a onclick="toggleSubmenu('otroSubmenu', this)">
            Perfil <span class="toggle-icon">></span>
        </a>
        <div class="submenu" id="otroSubmenu">
            <a href="ver_perfil.php">Ver Perfil</a>
            <a href="editar_perfil.php">Editar Perfil</a>
        </div>

         <a href="index.php?action=showAllEfi">Eficiencias completas</a>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>

    <div class="content">
    <h1>Bienvenido</h1>
    <p>Encuentra todo lo que necesitas</p>
    </div>
    <hr>


            <div class="container">
                <h1> ¡Resultados!</h1>
                <p>
                    Explora la gran variedad de datos que el software te proporciona, evidencia puntos clave en 
                    los procesos de producción y mejoralos de forma inmediata
                </p>
            </div>
    
           


                <center>
                    <form action="" id="carru">
                    <img src="img/estandar.jpg" alt="" width="400px" height="300px" id="carrusel"><br>
                    </form>
                </center>



    
            <script src="javascript/function3.js"></script>
</body>
</html>