<?php
$user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="styles/styles12.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="bodicito">
    <div class="container mt-5 mit">
    <h1>Bienvenido, <?= htmlspecialchars($user['usu_usu']) ?></h1>
    <a href="index.php?action=logout" class="btn btn-danger mt-3 cerrar">Cerrar Sesión</a>
    </div>


<main>
    
 <!-- Sección Cómo Funciona -->
        <section class="how-it-works">
            
                <img class="image" src="img/asignado.jpg" alt="">
               
                <div class="steps"> <!-- Contenedor de pasos -->
                    <h2>Ordenes asignadas</h2>
                    <p>
                        ¡Consulta todas las ordenes asignadas a tu usuario, verifica datos vitales como:
                        proceso a realizar, fecha de entrega u otros.
                    </p>

                    <a href="index.php?action=getByidOpe" class="btn btn-primary">Ver ordenes asignadas</a>  
                    
                </div>
        </section>
      
        <!-- Sección de Beneficios -->
        <section class="benefits">
        
         <img class="image" src="img/what.png" alt="">
       
            <div class="steps"> <!-- Contenedor de pasos -->
                <h2>Registrar eficiencia</h2>
                <p>
                    Agrega facilmente tus tiempos, has del registro de actividades
                    algo mucho mas sencillo y dinamico que antes.
                </p>

                <a href="index.php?action=getindi" class="btn btn-primary">Registrar</a>
                
            </div>
        </section>
      
    </main>

</body>
</html>

