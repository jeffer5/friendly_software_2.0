<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/stylesresul.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>


<div class="sidebar">
        <a href="index.php">Inicio</a>
        
        <a onclick="toggleSubmenu('perfilSubmenu', this)">
            Operario <span class="toggle-icon">></span>
        </a>
        <div class="submenu" id="perfilSubmenu">
            <a href="index.php?action=consultar">Consular por usuario</a>
            <a href="index.php?action=conName">Consultar por nombre</a>
        </div>

        <a onclick="toggleSubmenu('otroSubmenu', this)">
            Perfil <span class="toggle-icon">></span>
        </a>
        <div class="submenu" id="otroSubmenu">
            <a href="ver_perfil.php">Ver Perfil</a>
            <a href="editar_perfil.php">Editar Perfil</a>
        </div>

        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>

    <div class="content">
        <h1>Bienvenido</h1>
        <form action="index.php?action=consultarUsu" method="$_POST">
            <label for="">
            Ingrese el usuario<input type="text" name="usu_usu" id="usu">
            </label>
            <input type="submit" value="enviar" id="btn">
        </form> 
    </div>
    <hr> <!-- corte para empezar a poner la informacion -->





    


    <script src="javascript/function3.js"></script>
</body>
</html>