<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles7.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="mybody">
    
<div class="container mt-5 mit">
<h2>Lista de Estandares</h2>
</div>

<a href="index.php?action=crearr" class="btn btn-primary crear">Crear nuevo estandar</a><br><br>

<div class="container yo">
    <form action="index.php?action=searching" method="POST">
        Buscar por id <input type="number" placeholder="ingrese el id" name="id" class="id">
    <input type="submit" value="buscar" class="btn btn-primary">
    </form>
</div>

<a href="index.php?action=supervisor_dashboard" class="btn btn-primary volver ">salir</a>

<table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Producto</th>
        <th scope="col">Proceso</th>
        <th scope="col">Cantidad estandar</th>
        <th scope="col">Tiempo estandar x min </th>
        <th scope="col">Detalle </th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
    </tr>
    </thead>
    <tbody>
        <?php if ($usuarios): ?>
            <?php if (isset($usuarios['id_pro'])): ?>
                <!-- Si solo se encontró un usuario con ese ID -->
                <tr>
                    <td><?php echo $usuarios['id_pro']; ?></td>
                    <td><?php echo $usuarios['pro_pro']; ?></td>
                    <td><?php echo $usuarios['act_pro']; ?></td>
                    <td><?php echo $usuarios['can_pro']; ?></td>
                    <td><?php echo $usuarios['tie_pro']; ?></td>
                    <td>
                        <a href="index.php?action=mos&id=<?php echo $usuarios['id_pro']; ?>">Ver</a>
                    </td>
                    <td>
                        <a href="index.php?action=modify&id=<?php echo $usuarios['id_pro']; ?>">Editar</a>
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="eliminar(this.value)" value="<?php echo $usuarios['id_pro']; ?>" >Eliminar</button>
                    </td>
                </tr>
            <?php else: ?>
                <!-- Si no se ha encontrado un usuario específico, mostramos todos -->
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id_pro']; ?></td>
                        <td><?php echo $usuario['pro_pro']; ?></td>
                        <td><?php echo $usuario['act_pro']; ?></td>
                        <td><?php echo $usuario['can_pro']; ?></td>
                        <td><?php echo $usuario['tie_pro']; ?></td>
                        <td>
                            <a href="index.php?action=mos&id=<?php echo $usuario['id_pro']; ?>">Ver</a>
                        </td>
                        <td>
                            <a href="index.php?action=modify&id=<?php echo $usuario['id_pro']; ?>">Editar</a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="eliminart(this.value)" value="<?php echo $usuario['id_pro']; ?>" >Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else: ?>
            <tr><td colspan="11">No se encontraron resultados.</td></tr>
        <?php endif; ?>
    </tbody>
</table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="javascript/function2.js"></script>    
</body>
</html>