<!DOCTYPE html>
<html lang="es"> <!-- Idioma definido como espalol -->
<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres en UTF-8 -->
    <link rel="stylesheet" href="styles/stylescrea.css">
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
          <a class="navbar-brand mi-fri" href="#">Creadores</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=home">Salir</a></li>
              
            </ul>
          </div>
        </div>
    </nav>


    <!-- Contenido Nosotros -->

    <main>  

     <section class="section1">
            <div class="divcito">
            <h1> <div class="gonzo">Gonzalo</div>Bustos Cuevas</h1>
            <p>Estudiante del programa Análisis y Desarrollo de Software en el SENA, con formación en diseño, 
                construcción, prueba y mantenimiento de aplicaciones informáticas bajo estándares de calidad y buenas prácticas de desarrollo.
                Tengo conocimientos en lenguajes como Java, JavaScript, Python y SQL, así como en herramientas
                y entornos como Git, Visual Studio Code, MySQL y HTML/CSS.</p>
            <a href="files/prueba.pdf" download="Hoja de vida" type="button" class="btn btn-primary">mirar cv</a>
            </div>
            <img src="img/fotofriendly.jpg">
        </section>
        <section class="section2">
            <div class="divcito1">
            <h1><div class="jefer">Jefferson</div> Eladio Avila Delgado</h1>
            <p>Estudiante del programa Análisis y Desarrollo de Software (ADSO) del SENA, con conocimientos en ciberseguridad adquiridos a través de un curso de Google. 
                Tiene experiencia en desarrollo back-end con Java, Python, PHP y C++, y en front-end con HTML, CSS, JavaScript, React y Bootstrap.
                Domina bases de datos como MySQL, Oracle y SQL Server, y tiene habilidades en análisis y levantamiento de requerimientos. 
                Se destaca por su enfoque analítico, responsabilidad y compromiso con el desarrollo de soluciones seguras y eficientes.
            </p>
            <a href="files/jefer.pdf" download="Hoja de vida" type="button" class="btn btn-primary">mirar cv</a>
            </div>
            <img src="img/jefer.jpg">
        </section>
        <section class="section3">
            <div class="divcito2">
            <h1><div class="vivi">Viviana </div>Ospina Lasso</h1>
            <p>Tecnóloga en formación del programa ADSO del SENA, con formación complementaria en ciberseguridad mediante curso certificado por Google. Posee habilidades en desarrollo back-end 
                (Java, Python, PHP, C++) y front-end (HTML, CSS, JavaScript, React, Bootstrap), además del manejo de bases de datos como MySQL, Oracle y SQL Server.
                Cuenta con experiencia en el análisis y levantamiento de requerimientos, destacándose por su enfoque analítico, 
                responsabilidad y compromiso con la calidad del software y la seguridad digital.</p>
            <a href="files/prueba.pdf" download="Hoja de vida" type="button" class="btn btn-primary">mirar cv</a>
            </div>
            <img src="img/vivi.jpg">
        </section>
        
       
    </main>         

    <!-- Pie de página -->

    <!--<footer class="footer">
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
    </footer>-->

</body>
</html>
