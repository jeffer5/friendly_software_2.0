<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/stylesUsu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <form action="index.php?action=conUsu2" method="post" enctype="multipart/form-data" class="form-container"> 
        <p> Seleccione al operario que esta buscando</p>
        <label for="usuario" id="usuario"></label>
        <select name="usuario" required>
            <option value="">Escoja</option>
            <?php foreach($usuarios as $usuario): ?>
                <option value="<?= $usuario['id_usu']; ?>"><?= $usuario['nom_usu']; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" class="btn btn-primary asi" value="Escoger" name="escoger">
    </form>
    </div>
    


   


    <center>
<table class="table table-striped table-dark">
    <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Orden</th>
        <th>Producto</th>
        <th>Actividad</th>
        <th>Cantidad</th>
        <th>Tiempo</th>
        <th>Eficiencia</th>
        <th>Fecha</th>
    </tr>

    <?php if (isset($usuarioes) && count($usuarioes) > 0): ?>
        <?php foreach ($usuarioes as $item): ?>
            <tr>
                <td><?= $item['usu_usu'] ?></td>
                <td><?= $item['nom_usu'] ?></td>
                <td><?= $item['ape_usu'] ?></td>
                <td><?= $item['nro_ord'] ?></td>
                <td><?= $item['nom_pro'] ?></td>
                <td><?= $item['act_pro'] ?></td>
                <td><?= $item['can_pro'] ?></td>
                <td><?= $item['tie_pro'] ?></td>
                <td><?= $item['tot_efi'] ?></td>
                <td><?= $item['fec_ind'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php elseif (isset($usuarioes)): ?>
        <tr><td colspan="9">No se encontraron datos para este usuario.</td></tr>
    <?php endif; ?>
</table>
</center>

    <script src="javascript/function3.js"></script>
</body>
</html>