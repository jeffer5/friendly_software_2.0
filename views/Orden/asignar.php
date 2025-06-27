<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles8.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
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
              <li class="nav-item"><a class="nav-link" href="index.php?action=orden">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>

    <h1 class="tittle">Asignación de ordenes</h1>

<form action="index.php?action=asignarO" method="post" enctype="multipart/form-data" class="form-container"> 
    <p> Asigne rapidamente una orden de trabajo
    Seleccionando al operario y la orden a cumplir</p>

    <label for="usuario" id="usuario">Usuario:</label>
    <select name="usuario"  required>
        <option value="">Escoja</option>
        <?php foreach($usuarios as $usuario): ?>
            <option value="<?= $usuario['id_usu']; ?>"><?= $usuario['nom_usu']; ?></option>
        <?php endforeach; ?>
    </select>


    <label for="nro_ord" id="nro_orden">Número de Orden:</label>
    <select name="nro_orden" id="nro_ord" required>
        <option  value="">Escoja</option>
        <?php
        
        $ordencitas_data = [];
        foreach($ordenes as $orden):
            // Cada iteración añade una entrada a $ordencitas_data
            $ordencitas_data[$orden['id_ord']] = $orden;
        ?>
            <option value="<?= $orden['id_ord']; ?>"><?= $orden['nro_ord']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <br>


        <label for="staticEmail" class="col-sm-2 col-form-label">Proceso:</label>
        <input type="text" id="proceso" name="proceso" disabled>
        

        <script>    
            // Pasamos los datos PHP a JavaScript
            const ordencitas = <?= json_encode($ordencitas_data); ?>;
        </script>
 
    <br><input type="submit" class="btn btn-primary asi" value="Asignar">

</form>


<div class="container yo">
    <form action="index.php?action=buscaru" method="POST">
            Buscar por id <input type="number" placeholder="ingrese 0 para volver" name="id" class="id">
    <input type="submit" value="buscar" class="btn btn-primary">
    </form>
    
</div>



<table class="table table-striped table-dark">
    <thead >
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre operario</th>
        <th scope="col">usuario operario</th>
        <th scope="col">Numero de orden</th>
        <th scope="col">Nombre del cliente</th>
        <th scope="col">Fecha de entrega</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad total</th>
        <th scope="col">Proceso</th>
        <th scope="col">Eliminar</th>
    </tr>
    </thead>
    <tbody>
        <?php if ($detalles): ?>
            <?php if (isset($detalles['id_det'])): ?>
                <!-- Si solo se encontró un usuario con ese ID -->
                <tr>
                    <td><?php echo $detalles['id_det']; ?></td>
                    <td><?php echo $detalles['nom_usu']; ?></td>
                    <td><?php echo $detalles['usu_usu']; ?></td>
                    <td><?php echo $detalles['nro_ord']; ?></td>
                    <td><?php echo $detalles['nom_cli']; ?></td>
                    <td><?php echo $detalles['fec_ent']; ?></td>
                    <td><?php echo $detalles['nom_pro']; ?></td>
                    <td><?php echo $detalles['can_tot']; ?></td>
                    <td><?php echo $detalles['pro_ord']; ?></td>
                    <td>
                        <button class="btn btn-danger" onclick="eliminar(this.value)" value="<?php echo $detalles['id_det']; ?>" >Eliminar</button>
                    </td>     
                </tr>
            <?php else: ?>
                <!-- Si no se ha encontrado un usuario específico, mostramos todos -->
                <?php foreach ($detalles as $destalle): ?>
                    <tr>
                         <td><?php echo $destalle['id_det']; ?></td>
                        <td><?php echo $destalle['nom_usu']; ?></td>
                        <td><?php echo $destalle['usu_usu']; ?></td>
                        <td><?php echo $destalle['nro_ord']; ?></td>
                        <td><?php echo $destalle['nom_cli']; ?></td>
                        <td><?php echo $destalle['fec_ent']; ?></td>
                        <td><?php echo $destalle['nom_pro']; ?></td>
                        <td><?php echo $destalle['can_tot']; ?></td>
                        <td><?php echo $destalle['pro_ord']; ?></td>
                    <td>
                        <button class="btn btn-danger" onclick="eliminar(this.value)" value="<?php echo $destalle['id_det']; ?>" >Eliminar</button>
                    </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else: ?>
            <tr><td colspan="11">No se encontraron resultados.</td></tr>
        <?php endif; ?>
    </tbody>
</table>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="javascript/function5.js"></script> 
</body>
</html>