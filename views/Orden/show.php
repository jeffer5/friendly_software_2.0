<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <h2>Detalles de la orden</h2>
        <p><strong>ID:</strong> <?php echo $usuario['id_ord']; ?></p>
        <p><strong>Numero de orden:</strong> <?php echo $usuario['nro_ord']; ?></p>
        <p><strong>Nombre del cliente:</strong> <?php echo $usuario['nom_cli']; ?></p>
        <p><strong>Fecha de entrega:</strong> <?php echo $usuario['fec_ent']; ?></p>
        <p><strong>Producto:</strong> <?php echo $usuario['nom_pro']; ?></p>
        <p><strong>Cantidad total:</strong> <?php echo $usuario['can_tot']; ?></p>
        <p><strong>Poceso:</strong> <?php echo $usuario['pro_ord']; ?></p>
        
</body>
</html>
