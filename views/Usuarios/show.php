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
<h1 class="title">Detalles del Usuario</h1>
<center>
<div class="card mb-3 tar" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="uploads/<?php echo $usuario['fot_usu'];?>"  class="img-fluid rounded-start fot"  alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text"><b>ID:</b> <?php echo $usuario['id_usu']; ?></p>
        <p class="card-text"><b>Nombre:</b> <?php echo $usuario['nom_usu']; ?></p>
        <p class="card-text"><b>Apellido:</b> <?php echo $usuario['ape_usu']; ?></p>
        <p class="card-text"><b>Tipo de documento:</b> <?php echo $usuario['tdo_usu']; ?></p>
        <p class="card-text"><b>Numero de documento:</b> <?php echo $usuario['ndo_usu']; ?></p>
        <p class="card-text"><b>Numero de telefono:</b> <?php echo $usuario['tel_usu']; ?></p>
        <p class="card-text"><b>Nombre usuario:</b> <?php echo $usuario['usu_usu']; ?></p>
        <p class="card-text"><b>Rol:</b> <?php echo $usuario['rol_usu']; ?></p>
      </div>
    </div>
  </div>
</div><br>
<button type="button" onclick="history.back()"   class="btn btn-primary">Volver</button>
<a href="index.php?action=editar&id=<?php echo $usuario['id_usu']; ?>" class="btn btn-primary">actualizar</a>
</center>


</body>
</html>