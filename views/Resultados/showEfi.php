<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesefi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Eficiencias Totales</title>
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
        <a href="index.php?action=ranking">Ranking operarios</a>
        <a href="index.php?action=supervisor_dashboard">Salir</a>
        <a href="index.php?action=logout">Cerrar sesión</a>
    </div>


    <div class="content">
    <h1>Bienvenido</h1>
    <p>Encuentra todo lo que necesitas</p>
    <button style="background-color: aquamarine; border: none; padding: 10px 20px; border-radius: 5px;" onclick="window.print()">🖨️ Imprimir o Guardar como PDF</button>
    </div>
    

        <center>
    <table class="table table-striped table-dark">
    <thead >
    <tr>
        <th colspan="9"  id="tittle">Eficiencias totales</th>
    </tr>    
    <tr>
        <th scope="col">ID eficiencia</th>
        <th scope="col">Numero de orden</th>
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
                        <td><?php echo $usuario['nro_ord']; ?></td>
                        <td>
                            <div class="porcentaje" style="--porcentaje: <?= $usuario['tot_efi'] ?>">
                            <svg width="100" height="100">
                                <circle r="35" cx="50%" cy="50%" pathlength="100"/>
                                <circle r="35" cx="50%" cy="50%" pathlength="100"/>
                            </svg>
                            <span><?= $usuario['tot_efi'] ?>%</span>
                            </div>
                        </td>
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