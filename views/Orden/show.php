<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle orden</title>
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
              <li class="nav-item"><a class="nav-link" href="index.php?action=getAll">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>



    <h2 class="title ">Detalles de la orden</h2><br>

    <div class="card" style="width: 35rem;">
      <img src="img/orden2.png" class="card-img-top" alt="...">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>ID:</strong> <?php echo $usuario['id_ord']; ?></li>
        <li class="list-group-item"><strong>Numero de orden:</strong> <?php echo $usuario['nro_ord']; ?></li>
        <li class="list-group-item"><strong>Nombre del cliente:</strong> <?php echo $usuario['nom_cli']; ?></li>
        <li class="list-group-item"><strong>Fecha de entrega:</strong> <?php echo $usuario['fec_ent']; ?></li>
        <li class="list-group-item"><strong>Producto:</strong> <?php echo $usuario['nom_pro']; ?></li>
        <li class="list-group-item"><strong>Cantidad total:</strong> <?php echo $usuario['can_tot']; ?></li>
        <li class="list-group-item"><strong>Proceso:</strong> <?php echo $usuario['pro_ord']; ?></li>
      </ul>
    </div>
    
</body>
</html>