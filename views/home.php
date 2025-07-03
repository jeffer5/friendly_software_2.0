<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/stylesfooter.css">
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
          <a class="navbar-brand mi-fri" href="index.php?action=creadores">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=nosotros">Nosotros</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=login">Inicio sesion</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=registrar">Registro</a></li>
            </ul>
          </div>
        </div>
    </nav>

    
   
    
    <nav class="navbar mi-navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <p class="lead text-center pa">Libera el Potencial de tu Equipo con Datos Inteligentes 
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
                    <h3>Recolectar</h3>
                    <img src="img/recolectar.jpg" alt="">
                    <p>Recopila automáticamente datos de rendimiento y actividad de los empleados con una configuración mínima.</p>
                </div>
                <!-- Paso 2: Analizar -->
                <div class="step">
                    <h3>Analizar</h3>
                    <img src="img/analizar.jpg" alt="">
                    <p>Nuestros algoritmos inteligentes detectan patrones, dinámicas de equipo y tendencias de eficiencia.</p>
                </div>
                <!-- Paso 3: Actuar -->
                <div class="step">
                    <h3>Actuar</h3>
                    <img src="img/actuar.png" alt="">
                    <p>Recursos Humanos recibe informes claros y útiles para tomar decisiones basadas en datos reales.</p>
                </div>
            </div>
        </section>
      
        <!-- Sección de Beneficios -->
        <!-- Sección de Beneficios -->
        
        <section class="benefits">
            <div class="benefits-text-overlay">
                <h2>Beneficios para tu Equipo</h2>
                <ul>
                    <li>✅ Mejora la productividad y la colaboración del equipo</li>
                    <li>✅ Detecta el agotamiento antes de que afecte el rendimiento</li>
                    <li>✅ Toma decisiones con información actualizada y real</li>
                    <li>✅ Métricas totalmente personalizables para tu flujo de trabajo</li>
                </ul>
            </div>

            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/productivo.jpg" class="d-block w-100 carousel-img-cover" alt="Descripción de la imagen 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/productivo1.jpg" class="d-block w-100 carousel-img-cover" alt="Descripción de la imagen 2">
                    </div>
                    <div class="carousel-item">
                        <img src="img/productivo2.jpg" class="d-block w-100 carousel-img-cover" alt="Descripción de la imagen 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
      
        <!-- Sección de Audiencia Objetivo -->
        <section class="target-audience">
            <h2>Ideal para Cualquier Industria</h2>
            <p>
                <div class="parrafo">
                Ya sea que trabajes en <strong>manufactura</strong>, <strong>tecnología</strong>, 
                <strong>logística</strong> o <strong>servicio al cliente</strong>
                —nuestra plataforma se adapta a los objetivos y dinámicas de tu equipo.
                </div>
            </p>
        </section>
  
    </main>


    

    <footer class="footer" id="asereje">
        <div class="footer-contenido" id="conte">
            <p>&copy; 2025 Friendly software. Todos los derechos reservados.</p>
            <p>
                Contacto: 
                <a href="#">Friendlysoftware@jgv.com</a> | Tel: +57 318 727 7707
            </p>
            <div class="redes">
                <a href="#" target="_blank">Facebook</a> |
                <a href="#" target="_blank">LinkedIn</a> |
                <a href="#" target="_blank">Instagram</a>
            </div>
        </div>  
    </footer>
    


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