<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Recompensa/Evento</title>
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
              <li class="nav-item"><a class="nav-link" href="index.php?action=gestionRecompensas">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>



    <div class="content">
        <h1>Editar Recompensa o Evento</h1><br>

        <?php 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_SESSION['mensaje']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['mensaje']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (isset($recompensa_a_editar) && !empty($recompensa_a_editar)): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Detalles de la Recompensa/Evento</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?action=actualizarRecompensaEvento" method="post">
                        <input type="hidden" name="id_rec" value="<?php echo htmlspecialchars($recompensa_a_editar['id_rec']); ?>">
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" 
                                value="<?php echo htmlspecialchars($recompensa_a_editar['titulo']); ?>" 
                                required maxlength="255">
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="7" required>
                                <?php echo htmlspecialchars($recompensa_a_editar['descripcion']); ?>
                            </textarea>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" 
                                <?php echo ($recompensa_a_editar['activo'] == 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="activo">Activa/Publicada</label>
                            <small class="form-text text-muted">Desmarcar para ocultar a los empleados sin eliminarla.</small>
                        </div>
                        
                        <button type="submit" class="btn btn-success me-2">
                            <i class="fas fa-save"></i> Guardar Cambios
                        </button>
                        <a href="index.php?action=gestionRecompensas" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Cancelar y Volver
                        </a>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                No se encontraron datos para la recompensa o evento especificado. <a href="index.php?action=gestionRecompensas">Volver a la lista de gestión</a>.
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