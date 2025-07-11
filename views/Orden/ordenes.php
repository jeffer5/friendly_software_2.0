<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles6.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="mybody">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=crear">Crear nueva orden</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=orden">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>
    
<div class="container mt-5 mit">
<h2>Lista de Ordenes</h2>
</div>

<div class="container yo">
    <form action="index.php?action=search" method="POST">
        Buscar por id <input type="number" placeholder="ingrese el id" name="id" class="id">
    <input type="submit" value="buscar" class="btn btn-primary">
    </form>
</div>


<table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Numero de orden</th>
        <th scope="col">Nombre cliente</th>
        <th scope="col">Fecha de entrega</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad total</th>
        <th scope="col">Proceso</th>
        <th scope="col">Detalle</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
    </tr>
    </thead>
    <tbody>
         <?php if ($usuarios): ?>
            <?php if (isset($usuarios['id_ord'])): ?>
                <!-- Si solo se encontró un usuario con ese ID -->
                <tr>
                     <td><?php echo $usuarios['id_ord']; ?></td>
                    <td><?php echo $usuarios['nro_ord']; ?></td>
                    <td><?php echo $usuarios['nom_cli']; ?></td>
                    <td><?php echo $usuarios['fec_ent']; ?></td>
                    <td><?php echo $usuarios['nom_pro']; ?></td>
                    <td><?php echo $usuarios['can_tot']; ?></td>
                    <td><?php echo $usuarios['pro_ord']; ?></td>
                    <td>
                        <a href="index.php?action=mostrar&id=<?php echo $usuarios['id_ord']; ?>">Ver</a>
                    </td>
                    <td>
                        <a href="index.php?action=modificar&id=<?php echo $usuarios['id_ord']; ?>">Editar</a>
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="eliminar(this.value)" value="<?php echo $usuarios['id_ord']; ?>" >Eliminar</button>
                    </td>
                </tr>
            <?php else: ?>
                <!-- Si no se ha encontrado un usuario específico, mostramos todos -->
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id_ord']; ?></td>
                        <td><?php echo $usuario['nro_ord']; ?></td>
                        <td><?php echo $usuario['nom_cli']; ?></td>
                        <td><?php echo $usuario['fec_ent']; ?></td>
                        <td><?php echo $usuario['nom_pro']; ?></td>
                        <td><?php echo $usuario['can_tot']; ?></td>
                        <td><?php echo $usuario['pro_ord']; ?></td>
                        <td>
                            <a href="index.php?action=mostrar&id=<?php echo $usuario['id_ord']; ?>">Ver</a>
                        </td>
                        <td>
                            <a href="index.php?action=modificar&id=<?php echo $usuario['id_ord']; ?>">Editar</a>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="eliminar(this.value)" value="<?php echo $usuario['id_ord']; ?>" >Eliminar</button>
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
    <script src="javascript/function.js"></script>    
</body>
</html>