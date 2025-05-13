<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <h2>Detalles del Usuario</h2>
        <p><strong>ID:</strong> <?php echo $usuario['id_usu']; ?></p>
        <p><strong>Nombre:</strong> <?php echo $usuario['nom_usu']; ?></p>
        <p><strong>Apellido:</strong> <?php echo $usuario['ape_usu']; ?></p>
        <p><strong>Documento:</strong> <?php echo $usuario['tdo_usu']; ?></p>
        <p><strong>Número:</strong> <?php echo $usuario['ndo_usu']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $usuario['tel_usu']; ?></p>
        <p><strong>Usuario:</strong> <?php echo $usuario['usu_usu']; ?></p>
        <p><strong>Rol:</strong> <?php echo $usuario['rol_usu']; ?></p>
        <p><strong>Foto:</strong> <img src="uploads/<?php echo $usuario['fot_usu']; ?>" width="100" height="100" alt="foto de usuario"></p>
        
</body>
</html>
