


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="styles/styles4.css">
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
              <li class="nav-item"><a class="nav-link" href="index.php?action=supervisor_dashboard">Salir</a></li>
              
            </ul>
          </div>
        </div>
    </nav>



    <div class="container mt-5 mit">
       <h1>Ordenes</h1>
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

                <a href="index.php?action=indexAsi" class="btn btn-primary asi">Asignar</a>
                
            </div>
        </section>
      
    </main>


</body>
</html>
