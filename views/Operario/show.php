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
        <div class="card mb-3 tar" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <img src="img/estandar.jpg" >
        <p><strong>ID:</strong> <?php echo $indicador['id_ind']; ?></p>
        <p><strong>Cantidad realizada:</strong> <?php echo $indicador['can_rea']; ?></p>
        <p><strong>Tiempo gastado:</strong> <?php echo $indicador['tie_gas']; ?></p>
        <p><strong>Fecha:</strong> <?php echo $indicador['fec_ind']; ?></p>
        <p><strong>Usuario:</strong> <?php echo $indicador['usu_usu']; ?></p>
        <p><strong>Número de orden:</strong> <?php echo $indicador['nro_ord']; ?></p>
        <p><strong>Producto:</strong> <?php echo $indicador['nom_pro']; ?></p>
        <p><strong>Proceso:</strong> <?php echo $indicador['pro_ord']; ?></p>
</div>
</div>
</div>
</div>
<button type="button" onclick="history.back()"   class="btn btn-primary">Volver</button>
<a href="index.php?action=modify&id=<?php echo $usuario['id_pro']; ?>" class="btn btn-primary">Editar</a>
</body></center>
</html>
