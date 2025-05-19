<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <?php

        $user = $_SESSION['user'];

    ?>


    <div class="container mt-5 mit">
        <h1>Bienvenido, <?= htmlspecialchars($user['usu_usu']) ?></h1>
        <a href="index.php?action=logout" class="btn btn-danger mt-3 cerrar">Cerrar Sesión</a>
    </div>


  <table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre operario</th>
        <th scope="col">usuario operario</th>
        <th scope="col">Numero de orden</th>
        <th scope="col">Nombre del cliente</th>
        <th scope="col">Fecha de entrega</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad total</th>
        <th scope="col">Proceso</th>
    </tr>
    </thead>
    <tbody>

                <?php foreach ($detalles as $destalle): ?>
                    <tr>
                         <td><?php echo $destalle['id_det']; ?></td>
                        <td><?php echo $destalle['nom_usu']; ?></td>
                        <td><?php echo $destalle['usu_usu']; ?></td>
                        <td><?php echo $destalle['nro_ord']; ?></td>
                        <td><?php echo $destalle['nom_cli']; ?></td>
                        <td><?php echo $destalle['fec_ent']; ?></td>
                        <td><?php echo $destalle['nom_pro']; ?></td>
                        <td><?php echo $destalle['can_tot']; ?></td>
                        <td><?php echo $destalle['pro_ord']; ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>