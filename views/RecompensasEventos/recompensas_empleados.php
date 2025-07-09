<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novedades: Recompensas y Eventos</title>
    <link rel="stylesheet" href="styles/stylesRecEmp.css"> 
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
              <li class="nav-item"><a class="nav-link" href="index.php?action=operario_dashboard">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>


    <div class="content">
        <h1>Novedades: Recompensas y Eventos</h1><br>
        <p class="lead">Aquí encontrarás las últimas recompensas, bonificaciones y eventos de la empresa.</p>
        <hr>

        <?php if (empty($recompensas_activas)): ?>
            <div class="alert alert-info" role="alert">
                Por el momento, no hay recompensas o eventos activos. ¡Mantente atento!
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($recompensas_activas as $re): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo htmlspecialchars($re['titulo']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Publicado el: <?php echo htmlspecialchars($re['fecha_publicacion']); ?></h6>
                                <p class="card-text"><?php echo nl2br(htmlspecialchars($re['descripcion'])); ?></p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <span class="badge bg-success">Activo</span>
                                </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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