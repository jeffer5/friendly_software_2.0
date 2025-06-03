<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles5.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="mybody">
    
     <?php
    session_start();
    if (isset($_SESSION['mensaje'])):
    ?>
        <div id="alerta-registro" class="alert alert-success alert-dismissible fade show mt-3 mx-3" role="alert">
            <?= $_SESSION['mensaje'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['mensaje']);
    endif;
    ?>


<div class="container mt-5 mit">
<h2>Lista de Usuarios</h2>
</div>

<a href="index.php?action=create" class="btn btn-primary crear">Crear nuevo usuario</a><br><br>

<div class="container yo">
    <form action="index.php?action=buscar" method="POST">
            Buscar por id <input type="number" placeholder="ingrese el id" name="id" class="id">
    <input type="submit" value="buscar" class="btn btn-primary">
    </form>
</div>

<a href="index.php?action=supervisor_dashboard" class="btn btn-danger volver ">salir</a>

<table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Tipo Documento</th>
        <th scope="col">Numero documento</th>
        <th scope="col">Telefono</th>
        <th scope="col">Usuario</th>
        <th scope="col">Rol</th>
        <th scope="col">Foto</th>
        <th scope="col">Detalle</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
    </tr>
    </thead>
    <tbody>
        <?php if ($usuarios): ?>
            <?php if (isset($usuarios['id_usu'])): ?>
                <!-- Si solo se encontró un usuario con ese ID -->
                <tr>
                    <td><?php echo $usuarios['id_usu']; ?></td>
                    <td><?php echo $usuarios['nom_usu']; ?></td>
                    <td><?php echo $usuarios['ape_usu']; ?></td>
                    <td><?php echo $usuarios['tdo_usu']; ?></td>
                    <td><?php echo $usuarios['ndo_usu']; ?></td>
                    <td><?php echo $usuarios['tel_usu']; ?></td>
                    <td><?php echo $usuarios['usu_usu']; ?></td>
                    <td><?php echo $usuarios['rol_usu']; ?></td>
                    <td><img src="uploads/<?php echo $usuarios['fot_usu']; ?>" width="100" height="100" alt="Foto de usuario"></td>
                    <td><a href="index.php?action=show&id=<?php echo $usuarios['id_usu']; ?>">Ver</a></td>
                    <td><a href="index.php?action=editar&id=<?php echo $usuarios['id_usu']; ?>">Editar</a></td>
                    <td><button class="btn btn-danger" onclick="eliminarU(this.value)" value="<?php echo $usuarios['id_usu']; ?>">Eliminar</button></td>
                </tr>
            <?php else: ?>
                <!-- Si no se ha encontrado un usuario específico, mostramos todos -->
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id_usu']; ?></td>
                        <td><?php echo $usuario['nom_usu']; ?></td>
                        <td><?php echo $usuario['ape_usu']; ?></td>
                        <td><?php echo $usuario['tdo_usu']; ?></td>
                        <td><?php echo $usuario['ndo_usu']; ?></td>
                        <td><?php echo $usuario['tel_usu']; ?></td>
                        <td><?php echo $usuario['usu_usu']; ?></td>
                        <td><?php echo $usuario['rol_usu']; ?></td>
                        <td><img src="uploads/<?php echo $usuario['fot_usu']; ?>" width="100" height="100" alt="Foto de usuario"></td>
                        <td><a href="index.php?action=show&id=<?php echo $usuario['id_usu']; ?>">Ver</a></td>
                        <td><a href="index.php?action=editar&id=<?php echo $usuario['id_usu']; ?>">Editar</a></td>
                        <td><button class="btn btn-danger" onclick="eliminarU(this.value)" value="<?php echo $usuario['id_usu']; ?>">Eliminar</button></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else: ?>
            <tr><td colspan="11">No se encontraron resultados.</td></tr>
        <?php endif; ?>
    </tbody>
</table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="javascript/function1.js"></script> 
</body>
</html>