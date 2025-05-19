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
    
<div class="container mt-5 mit">
<h2>Indicadores</h2>
</div>

<a href="index.php?action=getorden" class="btn btn-primary crear">Insertar nuevo indicador</a><br><br>

<div class="container yo">
    <form action="index.php?action=buscarindi" method="POST">
            Buscar por id <input type="number" placeholder="ingrese el id" name="id" class="id">
    <input type="submit" value="buscar" class="btn btn-primary">
    </form>
</div>

<a href="index.php?action=operario_dashboard" class="btn btn-primary volver ">salir</a>

<table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Cantidad realizada</th>
        <th scope="col">Tiempo gastado</th>
        <th scope="col">Fecha</th>
        <th scope="col">Uusario</th>
        <th scope="col">Orden</th>
        <th scope="col">Producto</th>
        <th scope="col">Proceso</th>
        <th scope="col">Detalle</th>
    </tr>
    </thead>
    <tbody>
        <?php if ($indicadores): ?>
            <?php if (isset($indicadores['id_ind'])): ?>
                <!-- Si solo se encontró un usuario con ese ID -->
                <tr>
                    <td><?php echo $indicadores['id_ind']; ?></td>
                    <td><?php echo $indicadores['can_rea']; ?></td>
                    <td><?php echo $indicadores['tie_gas']; ?></td>
                    <td><?php echo $indicadores['fec_ind']; ?></td>
                    <td><?php echo $indicadores['usu_usu']; ?></td>
                    <td><?php echo $indicadores['nro_ord']; ?></td>
                    <td><?php echo $indicadores['nom_pro']; ?></td>
                    <td><?php echo $indicadores['pro_ord']; ?></td>
                     <td><a href="index.php?action=show&id=<?php echo $usuario['id_ind']; ?>">Ver</a></td>
                </tr>
            <?php else: ?>
                <!-- Si no se ha encontrado un usuario específico, mostramos todos -->
                <?php foreach ($indicadores as $indicador): ?>
                    <tr>
                        <td><?php echo $indicador['id_ind']; ?></td>
                        <td><?php echo $indicador['can_rea']; ?></td>
                        <td><?php echo $indicador['tie_gas']; ?></td>
                        <td><?php echo $indicador['fec_ind']; ?></td>
                        <td><?php echo $indicador['usu_usu']; ?></td>
                        <td><?php echo $indicador['nro_ord']; ?></td>
                        <td><?php echo $indicador['nom_pro']; ?></td>
                        <td><?php echo $indicador['pro_ord']; ?></td>
                         <td><a href="index.php?action=showindi&id=<?php echo $indicador['id_ind']; ?>">Ver</a></td>
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