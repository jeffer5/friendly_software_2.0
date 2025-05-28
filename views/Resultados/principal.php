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
        <a href="index.php?action=principal">Inicio</a>
        
        <a onclick="toggleSubmenu('perfilSubmenu', this)">
            Operario <span class="toggle-icon">></span>
        </a>
        <div class="submenu" id="perfilSubmenu">
            <a href="index.php?action=conUsu">Consular operario</a>
        </div>

        <a onclick="toggleSubmenu('otroSubmenu', this)">
            Orden <span class="toggle-icon">></span>
        </a>
        <div class="submenu" id="otroSubmenu">
            <a href="index.php?action=conOrd1">Consultar orden</a>
            <a href="index.php?action=conByData">Consultar por fecha</a>
        </div>

         <a href="index.php?action=showAllEfi">Eficiencias completas</a>
          <a href="index.php?action=supervisor_dashboard">Salir</a>
        <a href="index.php?action=logout">Cerrar sesión</a>
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