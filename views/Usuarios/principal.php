<?php
$user = $_SESSION['user'];
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
    <div class="container mt-5 mit">
        <h1>Bienvenido, <?= htmlspecialchars($user['usu_usu']) ?></h1>
    </div>


    <a href="index.php?action=home" class="btn btn-danger mt-3 cerrar">Cerrar Sesión</a>

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
                    <a href="index.php?action=results" ><img class="image" src="img/results.png" alt=""></a>
                    <h2>Resultados</h2>
            </div>

        </section>
 </main>

    
</body>
</html>