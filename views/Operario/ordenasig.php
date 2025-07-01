<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="mybody">

  <?php 
  $user = $_SESSION['user']; 
 ?>
   


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=operario_dashboard">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>
    
    <div class="container mt-5 mit">
        <h1>Ordenes Asignadas</h1>
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
    </tr>
    </thead>
    <tbody>

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

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>