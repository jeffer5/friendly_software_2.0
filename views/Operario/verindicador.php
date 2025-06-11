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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=getorden">Insertar nuevo indicador</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=operario_dashboard">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>

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
    <?php
   
    if (isset($_SESSION['mensa'])):
    ?>
        <div id="alerta-registro" class="alert alert-danger alert-dismissible fade show mt-3 mx-3" role="alert">
            <?= $_SESSION['mensa'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['mensa']);
    endif;
    ?>


    <?php
   
    if (isset($_SESSION['error'])):
    ?>
        <div id="alerta-regis" class="alert alert-danger alert-dismissible fade show mt-3 mx-3" role="alert">
            <?= $_SESSION['error'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['error']);
    endif;
    ?>


   

    
<div class="container mt-5 mit">
<h2>Indicadores</h2>
</div>


<div class="container yo">
    <form action="index.php?action=buscarindi" method="POST">
            Buscar por id <input type="number" placeholder="ingrese el id" name="id" class="id">
    <input type="submit" value="buscar" class="btn btn-primary">
    </form>
</div>



<table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Cantidad realizada</th>
        <th scope="col">Tiempo gastado</th>
        <th scope="col">Cantidad total</th>
        <th scope="col">Fecha</th>
        <th scope="col">Uusario</th>
        <th scope="col">Orden</th>
        <th scope="col">Producto</th>
        <th scope="col">Proceso</th>
        <th scope="col">Detalle</th>
        <th scope="col">Subir eficiencia</th>
        
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
                    <td><?php echo $indicadores['can_tot']; ?></td>
                    <td><?php echo $indicadores['fec_ind']; ?></td>
                    <td><?php echo $indicadores['usu_usu']; ?></td>
                    <td><?php echo $indicadores['nro_ord']; ?></td>
                    <td><?php echo $indicadores['nom_pro']; ?></td>
                    <td><?php echo $indicadores['pro_ord']; ?></td>
                     <td><a href="index.php?action=show&id=<?php echo $indicadores['id_ind']; ?>">Ver</a></td>
                      <td>
                        <a href="index.php?action=addefi&id=<?php echo $indicadores['id_ind']; ?>"
                           class="btn btn-primary indicador-button"
                           id="indicador-<?php echo $indicadores['id_ind']; ?>">
                           Subir eficiencia
                        </a>
                    </td>
                     
                </tr>
            <?php else: ?>
                <!-- Si no se ha encontrado un usuario específico, mostramos todos -->
                <?php foreach ($indicadores as $indicador): ?>
                    <tr>
                        <td><?php echo $indicador['id_ind']; ?></td>
                        <td><?php echo $indicador['can_rea']; ?></td>
                        <td><?php echo $indicador['tie_gas']; ?></td>
                        <td><?php echo $indicador['can_tot']; ?></td>
                        <td><?php echo $indicador['fec_ind']; ?></td>
                        <td><?php echo $indicador['usu_usu']; ?></td>
                        <td><?php echo $indicador['nro_ord']; ?></td>
                        <td><?php echo $indicador['nom_pro']; ?></td>
                        <td><?php echo $indicador['pro_ord']; ?></td>
                         <td><a href="index.php?action=showindi&id=<?php echo $indicador['id_ind']; ?>" >Ver</a></td>
                         <td>
                            <a href="index.php?action=addefi&id=<?php echo $indicador['id_ind']; ?>"
                               class="btn btn-primary indicador-button"
                               id="indicador-<?php echo $indicador['id_ind']; ?>">
                                Subir eficiencia
                            </a>
                        </td>
                         
              
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else: ?>
            <tr><td colspan="11">No se encontraron resultados.</td></tr>
        <?php endif; ?>
    </tbody>
</table>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        // --- Obtener el ID del indicador que se acaba de registrar desde PHP ---
        // PHP imprime el ID del indicador si existe en la sesión
        // Si no existe (es decir, no hubo registro exitoso), será una cadena vacía.
        const idIndicadorRegistrado = "<?php
            if (isset($_SESSION['id_indicador_cambiar_color'])) {
                $id_from_session = $_SESSION['id_indicador_cambiar_color'];
                unset($_SESSION['id_indicador_cambiar_color']); // Limpia la sesión después de usarla
                echo "indicador-" . $id_from_session; // Formatea el ID para que coincida con el id HTML
            } else {
                echo ""; // Si no hay ID, se deja vacío
            }
        ?>";

        // --- Función para activar un botón permanentemente ---
        function activateButtonPermanently(buttonId) {
            const buttonToActivate = document.getElementById(buttonId);
            if (buttonToActivate && !buttonToActivate.classList.contains('active-button')) {
                buttonToActivate.classList.add('active-button');
                // buttonToActivate.disabled = true; // Opcional: Deshabilita el botón
            }
        }

        // --- Al cargar la página, si hay un ID de indicador recién registrado, activarlo ---
        if (idIndicadorRegistrado) {
            activateButtonPermanently(idIndicadorRegistrado);
        }

        // --- (Opcional) Guardar y restaurar la persistencia de estado para TODOS los botones ---
        // Si quieres que el botón PERMANEZCA activo incluso después de cerrar y abrir el navegador,
        // necesitarías almacenar los IDs en localStorage O (preferiblemente) consultarlos de la base de datos.
        // Pero para "sólo si se registró exitosamente AHORA", lo de arriba es suficiente.

        // Si tu intención es que el color cambie *solo cuando se haga clic* Y *se confirme en el backend*,
        // y que la página se recargue, el código de arriba es el más sencillo.
        // El `localStorage` que teníamos antes para "todos los botones activos" no es necesario si solo
        // cambias el color del botón que acaba de ser registrado.

        // Si necesitas que los botones que se activaron en visitas anteriores *también* se muestren activos,
        // entonces necesitas la lógica del backend para indicar qué IDs ya tienen eficiencia registrada
        // (como lo hablamos en la respuesta anterior, el `LEFT JOIN`).

    }); // Fin de DOMContentLoaded
</script>




<script>
    // Esperar 3 segundos (3000 ms) y luego cerrar la alerta automáticamente
    setTimeout(function() {
        var alerta = document.getElementById('alerta-registro');
        if (alerta) {
            var alertaBootstrap = bootstrap.Alert.getOrCreateInstance(alerta);
            alertaBootstrap.close();
        }
    }, 3000);
</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/javascript/function3.js"></script>
</body>
</html>