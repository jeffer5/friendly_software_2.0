<?php
$user = $_SESSION['user'];
?>

<?php
// En la parte superior de tus páginas protegidas (ej. dashboard.php, perfil.php)
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="styles/styles3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="bodicito">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=gestionRecompensas">Recompensas</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=logout">Cerrar sesion</a></li>
            </ul>
          </div>
        </div>
    </nav>


    <div class="container mt-5 mit">
        <h1>Bienvenido, <?= htmlspecialchars($user['usu_usu']) ?></h1>
    </div>


 <main>
    
 <!-- Sección Cómo Funciona -->
        <section class="how-it-works">
            
            <div class="steps"> <!-- Contenedor de pasos -->
                    
                    <a href="index.php?action=orden"><img  class="image" src="img/orden_copy.png" alt=""></a>

                    <h2>Ordenes</h2>
            </div>
            <div class="steps"> <!-- Contenedor de pasos -->
                        
                        <a href="index.php?action=index"><img class="image" src="img/usuario.png" alt=""></a>  
                        <h2>Usuarios</h2>
            </div>  
            <div class="steps"> <!-- Contenedor de pasos -->
                    <a href="index.php?action=todos" ><img class="image" src="img/indicador_copy.png" alt=""></a>
                    <h2>Estandares</h2>
            </div>
            <div class="steps"> <!-- Contenedor de pasos -->
                    <a href="index.php?action=mostrarIndicadores" ><img class="image" src="img/indicador_copy.png" alt=""></a>
                    <h2>Indicadores</h2>
            </div>
            <div class="steps"> <!-- Contenedor de pasos -->
                    <a href="index.php?action=principal" ><img class="image" src="img/results.png" alt=""></a>
                    <h2>Resultados</h2>
            </div>

        </section>
 </main>

    
</body>
</html>