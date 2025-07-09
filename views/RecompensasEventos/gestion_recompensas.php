<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Recompensas y Eventos</title>
    <link rel="stylesheet" href="styles/stylesRec.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=supervisor_dashboard">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="content">
        <h1>Gestión de Recompensas y Eventos</h1><br>

        <?php 
        // Inicia la sesión si no está iniciada ya (buena práctica para mensajes de sesión)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_SESSION['mensaje']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']); // Limpiar el mensaje después de mostrarlo ?>
        <?php endif; ?>

        <div class="card mb-4">
            <div class="card-header">
                <h3>Añadir Nueva Recompensa o Evento</h3>
            </div>
            <div class="card-body">
                <form action="index.php?action=guardarRecompensaEvento" method="post">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required maxlength="255">
                        <small class="form-text text-muted">Máximo 255 caracteres para el título.</small>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="7" required></textarea>
                        <small class="form-text text-muted">Detalles completos de la recompensa o evento.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Guardar Recompensa/Evento
                    </button>
                </form>
            </div>
        </div>

        <hr>

        <h2>Recompensas y Eventos Publicados</h2>
        <?php if (empty($recompensas_eventos)): ?>
            <div class="alert alert-info" role="alert">
                No hay recompensas o eventos publicados aún. ¡Usa el formulario de arriba para añadir uno!
            </div>
        <?php else: ?>
            <div class="table-responsive table-striped table-dark">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fecha Publicación</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recompensas_eventos as $re): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($re['id_rec']); ?></td>
                                <td><?php echo htmlspecialchars($re['titulo']); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($re['descripcion'])); ?></td> <td><?php echo htmlspecialchars($re['fecha_publicacion']); ?></td>
                                <td>
                                    <?php if ($re['activo']): ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Inactivo</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="index.php?action=editarRecompensa&id=<?php echo htmlspecialchars($re['id_rec']); ?>" class="btn btn-sm btn-warning mb-1" title="Editar">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="index.php?action=eliminarRecompensa&id=<?php echo htmlspecialchars($re['id_rec']); ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('¿Estás seguro de que quieres eliminar esta recompensa/evento? Esta acción es irreversible.');"
                                       title="Eliminar">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>