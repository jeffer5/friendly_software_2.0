
<?php
$user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="styles/styles4.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="bodicito">
    <div class="container mt-5 mit">
       <h1>Bienvenido, <?= htmlspecialchars($user['usu_usu']) ?></h1>
    </div>

 <main>
    
 <!-- Sección Cómo Funciona -->
        <section class="how-it-works">
            
                <img class="image" src="img/orden2.png" alt="">
               
                <div class="steps"> <!-- Contenedor de pasos -->
                    <h2>Ordenes</h2>
                    <p>
                        ¡Consulta todas las ordenes de la base de datos, añade nuevas ordenes segun lo requieras.
                        Actualiza o elimina registros poco necesarios o desactualizados!
                    </p>

                    <a href="index.php?action=getAll" class="btn btn-primary">Ver lista de ordenes</a>  
                    
                </div>
        </section>
      
        <!-- Sección de Beneficios -->
        <section class="benefits">
        
         <img class="image" src="img/orden1.png" alt="">
       
            <div class="steps"> <!-- Contenedor de pasos -->
                <h2>Asignar ordenes</h2>
                <p>
                    Agrega ordenes de trabajo para tu equipo operativo, asigna el trabajo de manera rápida y eficaz.
                    Gestiona la cantidad de trabajo y visualizalo en tiempo real.
                </p>

                <a href="index.php?action=indexAsi" class="btn btn-primary">Asignar</a>
                
            </div>
        </section>
      
    </main>


    <a href="index.php?action=supervisor_dashboard" class="btn btn-primary volver">salir</a>
</body>
</html>
