<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Usuario</title>
    <link rel="stylesheet" href="styles/styles14.css">
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
              <li class="nav-item"><a class="nav-link" href="index.php?action=index">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>


<h1 class="title">Detalles del Usuario</h1>

      <div class="card" style="width: 35rem;">
        <img src="img/orden2.png" class="card-img-top" alt="...">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>ID:</strong> <?php echo $usuario['id_usu']; ?></li>
          <li class="list-group-item"><strong>Nombre:</strong> <?php echo $usuario['nom_usu']; ?></li>
          <li class="list-group-item"><strong>Apellido:</strong> <?php echo $usuario['ape_usu']; ?></li>
          <li class="list-group-item"><strong>Tipo de documento:</strong> <?php echo $usuario['tdo_usu']; ?></li>
          <li class="list-group-item"><strong>Numero de documento:</strong> <?php echo $usuario['ndo_usu']; ?></li>
          <li class="list-group-item"><strong>Correo electronico:</strong> <?php echo $usuario['ema_usu']; ?></li>
          <li class="list-group-item"><strong>Numero de telefono:</strong> <?php echo $usuario['tel_usu']; ?></li>
          <li class="list-group-item"><strong>Nombre usuario:</strong> <?php echo $usuario['usu_usu']; ?></li>
          <li class="list-group-item"><strong>Rol:</strong> <?php echo $usuario['rol_usu']; ?></li>
        </ul>
      </div>


<button type="button" onclick="history.back()"   class="btn btn-primary volver">Volver</button>
<a href="index.php?action=editar&id=<?php echo $usuario['id_usu']; ?>" class="btn btn-primary">actualizar</a>
</center>


</body>
</html>