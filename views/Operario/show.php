<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles17.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
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
              <li class="nav-item"><a class="nav-link" href="index.php?action=getindi">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>




        <h2 class="title ">Detalles del indicador</h2>

      <div class="card" style="width: 35rem;">
        <img src="img/orden2.png" class="card-img-top" alt="...">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>ID:</strong> <?php echo $indicador['id_ind']; ?></li>
          <li class="list-group-item"><strong>Cantidad realizada:</strong> <?php echo $indicador['can_rea']; ?></li>
          <li class="list-group-item"><strong>Tiempo gastado:</strong> <?php echo $indicador['tie_gas']; ?></li>
          <li class="list-group-item"><strong>Fecha:</strong> <?php echo $indicador['fec_ind']; ?></li>
          <li class="list-group-item"><strong>Usuario:</strong> <?php echo $indicador['usu_usu']; ?></li>
          <li class="list-group-item"><strong>Número de orden:</strong> <?php echo $indicador['nro_ord']; ?></li>
          <li class="list-group-item"><strong>Producto:</strong> <?php echo $indicador['nom_pro']; ?></li>
          <li class="list-group-item"><strong>Proceso:</strong> <?php echo $indicador['pro_ord']; ?></li>
        </ul>
      </div>

</body></center>
</html>
