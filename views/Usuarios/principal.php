<?php
if (!isset($_SESSION['user'])) {
    header("Location: index.php?action=login");
    exit;
}
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

 <main>
    
 <!-- Sección Cómo Funciona -->
        <section class="how-it-works">
            
                <img class="image" src="img/princi_4.jpg" alt="">
               
                <div class="steps"> <!-- Contenedor de pasos -->
                     <h2>Usuarios</h2>
                    <p>
                        ¡Consulta todos los usuarios de la base de datos, añade nuevos usuarios segun lo requieras.
                        Actualiza o elimina registros poco necesarios o desactualizados!
                    </p>

                    <a href="index.php?action=index" class="btn btn-primary">Ver lista de usuarios</a>  
                    
                </div>
        </section>
      
        <!-- Sección de Beneficios -->
        <section class="benefits">
        
         <img class="image" src="img/orden.jpg" alt="">
       
            <div class="steps"> <!-- Contenedor de pasos -->
                <h2>Ordenes</h2>
                <p>
                    Agrega ordenes de trabajo para tu equipo operativo, asigna el trabajo de manera rápida y eficaz.
                    Gestiona la cantidad de trabajo y visualizalo en tiempo real.
                </p>

                <a href="index.php?action=orden" class="btn btn-primary">Ingresar</a>
                
            </div>
        </section>
      
        <!-- Sección de Audiencia Objetivo -->
        <section class="target">
     
           <img class="image" src="img/estandar.jpg" alt="">

            
            <div class="steps"> <!-- Contenedor de pasos -->
                <h2>Establecer Estandares</h2>
                <p>
                    Establece los estandares de producción de tu area, modifica o agrega cantidades, tiempos y 
                    procesos a realizar.
                </p>

                <a href="index.php?action=index" class="btn btn-primary">Ver lista de estandares</a>
                
            </div>
        </section>
  
    </main>


    <a href="index.php?action=home" class="btn btn-danger mt-3 cerrar">Cerrar Sesión</a>
</body>
</html>