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
    <h2 class="title ">Detalles de la orden</h2><br>
    <div class="card mb-3 tar" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-8">
        <div class="card-body">
            <img src="img/orden2.png" ><br> <br>
        <p class="card-text"><strong>ID:</strong> <?php echo $usuario['id_ord']; ?></p>
        <p class="card-text"><strong>Numero de orden:</strong> <?php echo $usuario['nro_ord']; ?></p>
        <p class="card-text"><strong>Nombre del cliente:</strong> <?php echo $usuario['nom_cli']; ?></p>
        <p class="card-text"><strong>Fecha de entrega:</strong> <?php echo $usuario['fec_ent']; ?></p>
        <p class="card-text"><strong>Producto:</strong> <?php echo $usuario['nom_pro']; ?></p>
        <p class="card-text"><strong>Cantidad total:</strong> <?php echo $usuario['can_tot']; ?></p>
        <p class="card-text"><strong>Poceso:</strong> <?php echo $usuario['pro_ord']; ?></p>

</div>
</div>
</div>
</div><br><br>
<button type="button" onclick="history.back()"   class="btn btn-primary">Volver</button>
</center>
</body>
</html>