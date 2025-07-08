<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de los estandares</title>
    <link rel="stylesheet" href="styles/styles15.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head><center>
<body class="mybody">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=todos">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>

    
        <h2 class="title ">Detalle de los estandares</h2>
        
      <div class="card" style="width: 35rem;">
        <img src="img/orden2.png" class="card-img-top" alt="...">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>ID:</strong> <?php echo $usuario['id_pro']; ?></li>
          <li class="list-group-item"><strong>Producto:</strong> <?php echo $usuario['pro_pro']; ?></li>
          <li class="list-group-item"><strong>Proceso:</strong> <?php echo $usuario['act_pro']; ?></li>
          <li class="list-group-item"><strong>Cantidad estandar:</strong> <?php echo $usuario['can_pro']; ?></li>
          <li class="list-group-item"><strong>Tiempo estandar:</strong> <?php echo $usuario['tie_pro']; ?></li>
        </ul>
      </div>
      
<button type="button" onclick="history.back()"   class="btn btn-primary">Volver</button>
<a href="index.php?action=modify&id=<?php echo $usuario['id_pro']; ?>" class="btn btn-primary">Editar</a>
</body></center>
</html>