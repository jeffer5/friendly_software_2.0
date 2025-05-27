<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/stylesOrd.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>


 <div class="sidebar">
        <a href="index.php?action=showAllEfi">Inicio</a>
        
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
        </div>

         <a href="index.php?action=showAllEfi">Eficiencias completas</a>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
    </div>


    <div class="content">
    <h1>Bienvenido</h1>
    <form action="index.php?action=conOrd" method="post" enctype="multipart/form-data" class="form-container"> 
        <p> Seleccione la orden que esta buscando</p>
        <label for="orden" id="orden"></label>
        <select name="orden" required>
            <option value="">Escoja</option>
            <?php foreach($orden as $item): ?>
                <option value="<?= $item['nro_ord']; ?>"><?= $item['nro_ord']; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" class="btn btn-primary asi" value="Escoger" name="escoger">
    </form>
    </div>
    

    <center><table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">Numero de orden</th>
        <th scope="col">Nombre del producto</th>
        <th scope="col">Proceso</th>
        <th scope="col">Fecha indicador</th>
        <th scope="col">Operario</th>
        <th scope="col">Eficiencia</th>
        <th scope="col">Fecha entrega</th>
                
    </tr>
    </thead>
    <tbody>

      <?php if (isset($ordenes) && count($ordenes) > 0): ?>
                <?php foreach ($ordenes as $destalle): ?>
                    <tr>
                         <td><?php echo $destalle['nro_ord']; ?></td>
                        <td><?php echo $destalle['nom_pro']; ?></td>
                        <td><?php echo $destalle['pro_ord']; ?></td>
                        <td><?php echo $destalle['fec_ind']; ?></td>
                        <td><?php echo $destalle['usu_usu']; ?></td>
                        <td>
                            <div class="porcentaje" style="--porcentaje: <?= $destalle['tot_efi'] ?>">
                            <svg width="100" height="100">
                                <circle r="35" cx="50%" cy="50%" pathlength="100"/>
                                <circle r="35" cx="50%" cy="50%" pathlength="100"/>
                            </svg>
                            <span><?= $destalle['tot_efi'] ?>%</span>
                            </div>
                
                        </td>
                        <td><?php echo $destalle['fec_ent']; ?></td>
                    </tr>
                 <?php endforeach; ?>
    <?php elseif (isset($usuarioes)): ?>
        <tr><td colspan="9">No se encontraron datos para este usuario.</td></tr>
    <?php endif; ?>
</table><br>
</center>
        


    <script src="javascript/function3.js"></script>
</body>
</html>