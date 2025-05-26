<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesefi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    

        <center>
    <table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">ID eficiencia</th>
        <th scope="col">Total eficiencia</th>
        <th scope="col">Cantidad realizada</th>
        <th scope="col">Tiempo gastado</th>
        <th scope="col">Fecha proceso</th>
        <th scope="col">Usuario</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($todos as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id_efi']; ?></td>
                        <td><?php echo $usuario['tot_efi']; ?></td>
                        <td><?php echo $usuario['can_rea']; ?></td>
                        <td><?php echo $usuario['tie_gas']; ?></td>
                        <td><?php echo $usuario['fec_ind']; ?></td>
                        <td><?php echo $usuario['usu_usu']; ?></td>
                        <td><?php echo $usuario['nom_usu']; ?></td>
                        <td><?php echo $usuario['ape_usu']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



  



            <script src="javascript/function3.js"></script>

</body>
</html>