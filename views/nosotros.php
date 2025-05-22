<!DOCTYPE html>
<html lang="es"> <!-- Idioma definido como espalol -->
<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres en UTF-8 -->
    <link rel="stylesheet" href="styles/stylesnosotros.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Vista adaptable a móviles -->
    <title>Información</title> <!-- Título de la pestaña del navegador -->
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
              <li class="nav-item"><a class="nav-link" href="index.php?action=nosotros">Nosotros</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=login">Inicio sesion</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?action=registrar">Registro</a></li>
            </ul>
          </div>
        </div>
    </nav>


    <!-- Contenido Nosotros -->

    <main>  
        
        <center>
            <h1 class="title">Nosotros</h1><br><br>

            <!-- Descripción general de la empresa -->
            <p class="parr">
                Somos una solución tecnológica diseñada para optimizar la gestión del rendimiento en las áreas de acondicionamiento <br>
                y recursos humanos. Nuestro software permite recolectar, analizar y visualizar datos clave sobre el desempeño <br>
                de los trabajadores, facilitando la toma de decisiones estratégicas <br>
                para mejorar la eficiencia operativa y la productividad del talento humano.
            </p>
        </center><br><br>
                    
        <!-- Sección de misión y visión -->
            <!-- Misión -->
                <center>
                    <h1 class="title">Misión</h1><br><br>
                    
                    <p class="parr">
                        Desarrollar herramientas inteligentes que permitan a las áreas de acondicionamiento <br>
                        y recursos humanos tomar decisiones basadas en datos, con el objetivo de potenciar el rendimiento <br>
                        del personal y contribuir al crecimiento sostenible de las organizaciones.
                    </p>
                </center><br><br>
        
            <!-- Visión -->
                <center>
                    <h1 class="title">Visión</h1><br><br>
                    <p class="parr">
                        Ser la plataforma líder en análisis de rendimiento laboral para áreas de acondicionamiento <br>
                        y recursos humanos en América Latina, reconocida por impulsar la eficiencia, <br>
                        la productividad y la toma de decisiones estratégicas mediante el uso de datos confiables y visualizaciones claras.
                    </p>
                </center><br><br>

        <!-- Botón para regresar a la página principal -->
        <center>
                <button onclick="history.back()" class="btn btn-primary volver">Volver</button>

        </center>
    </main>         

    <!-- Pie de página -->

    <footer class="footer">
        <div class="footer-contenido">
            <p>&copy; 2025 Friendly software. Todos los derechos reservados.</p>
            <p>
                Contacto: 
                <a href="mailto:Friendlysoftware@jgv.com">Friendlysoftware@jgv.com</a> | Tel: +57 318 727 7707
            </p>
            <div class="redes">
                <a href="#" target="_blank">Facebook</a> |
                <a href="#" target="_blank">LinkedIn</a> |
                <a href="#" target="_blank">Instagram</a>
            </div>
        </div>  
    </footer>

</body>
</html>
