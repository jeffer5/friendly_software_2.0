<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bienvenido</title>
</head>

<body class="body">

<?php
    session_start();
    if (isset($_SESSION['mensaje'])):
    ?>
        <div id="alerta-registro" class="alert alert-success alert-dismissible fade show mt-3 mx-3" role="alert">
            <?= $_SESSION['mensaje'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['mensaje']);
    endif;
    ?>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=create">Nosotros</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=login">Inicio sesion</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=registrar">Registro</a></li>
            </ul>
          </div>
        </div>
    </nav>

    
   
    
    <nav class="navbar mi-navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <p class="lead text-center">Libera el Potencial de tu Equipo con Datos Inteligentes 
          Analiza la eficiencia del equipo en tiempo real y entrega al área de RRHH información clara y accionable.
          </p>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>

    <main>
    
 <!-- Sección Cómo Funciona -->
        <section class="how-it-works">
            <h2>¿Cómo Funciona?</h2>
            <div class="steps"> <!-- Contenedor de pasos -->
                <!-- Paso 1: Recolectar -->
                <div class="step">
                    <img src="collect-icon.png" alt="Recolectar Datos">
                    <h3>Recolectar</h3>
                    <p>Recopila automáticamente datos de rendimiento y actividad de los empleados con una configuración mínima.</p>
                </div>
                <!-- Paso 2: Analizar -->
                <div class="step">
                    <img src="analyze-icon.png" alt="Analizar">
                    <h3>Analizar</h3>
                    <p>Nuestros algoritmos inteligentes detectan patrones, dinámicas de equipo y tendencias de eficiencia.</p>
                </div>
                <!-- Paso 3: Actuar -->
                <div class="step">
                    <img src="act-icon.png" alt="Actuar">
                    <h3>Actuar</h3>
                    <p>Recursos Humanos recibe informes claros y útiles para tomar decisiones basadas en datos reales.</p>
                </div>
            </div>
        </section>
      
        <!-- Sección de Beneficios -->
        <section class="benefits">
            <h2>Beneficios para tu Equipo</h2>
            <ul>
                <li>✅ Mejora la productividad y la colaboración del equipo</li>
                <li>✅ Detecta el agotamiento antes de que afecte el rendimiento</li>
                <li>✅ Toma decisiones con información actualizada y real</li>
                <li>✅ Métricas totalmente personalizables para tu flujo de trabajo</li>
            </ul>
        </section>
      
        <!-- Sección de Audiencia Objetivo -->
        <section class="target-audience">
            <h2>Ideal para Cualquier Industria</h2>
            <p>
                Ya sea que trabajes en <strong>manufactura</strong>, <strong>tecnología</strong>, <strong>logística</strong> o <strong>servicio al cliente</strong>—nuestra plataforma se adapta a los objetivos y dinámicas de tu equipo.
            </p>
        </section>
  
    </main>



    <script>
    // Esperar 3 segundos (3000 ms) y luego cerrar la alerta automáticamente
    setTimeout(function() {
        var alerta = document.getElementById('alerta-registro');
        if (alerta) {
            var alertaBootstrap = bootstrap.Alert.getOrCreateInstance(alerta);
            alertaBootstrap.close();
        }
    }, 3000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>