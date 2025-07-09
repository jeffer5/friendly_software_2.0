<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/stylesOrd.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ranking de Operarios</title>
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
        <h1>Ranking de Operarios por Órdenes Completadas</h1><br>
        <form action="index.php?action=ranking" method="post" class="form-container"> <p>Seleccione el rango de fechas para el ranking</p>
            <label for="fecha1">Fecha Inicio:</label>
            <input type="date" name="fecha1" required>
            <label for="fecha2">Fecha Fin:</label>
            <input type="date" name="fecha2" required><br><br>
            <input type="submit" class="btn btn-primary asi" value="Generar Ranking" name="generar_ranking">
            <button style="background-color: aquamarine; border: none; padding: 10px 20px; border-radius: 5px;" onclick="window.print()">🖨️ Imprimir o Guardar como PDF</button>
        </form>

      
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Posición</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Órdenes Completadas</th>
                    <th scope="col">Eficiencia Promedio</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($ranking_operarios) && !empty($ranking_operarios)): ?>
                    <?php $posicion = 1; ?>
                    <?php foreach ($ranking_operarios as $operario): ?>
                        <tr>
                            <td><?php echo $posicion++; ?></td>
                            <td><?php echo htmlspecialchars($operario['usu_usu']); ?></td>
                            <td><?php echo htmlspecialchars($operario['nom_usu'] . ' ' . $operario['ape_usu']); ?></td>
                            <td><?php echo htmlspecialchars($operario['total_ordenes_completadas']); ?></td>
                            <td><?php echo number_format($operario['promedio_eficiencia'], 2); ?>%</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No se encontraron datos de ranking para el rango de fechas seleccionado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        </center>
    </div>

    <script>
        function toggleSubmenu(id, element) {
            var submenu = document.getElementById(id);
            var icon = element.querySelector('.toggle-icon');
            if (submenu.style.display === 'block') {
                submenu.style.display = 'none';
                icon.style.transform = 'rotate(0deg)';
            } else {
                submenu.style.display = 'block';
                icon.style.transform = 'rotate(90deg)';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>