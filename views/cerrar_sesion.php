
<?php
session_start();  // Inicia la sesión para acceder a las variables de sesión
session_unset();  // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión completamente
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Define el conjunto de caracteres de la página para asegurar que se muestren correctamente los caracteres especiales -->
  <meta charset="UTF-8">
  
  <!-- Hace que la página sea compatible con dispositivos móviles al establecer un viewport adecuado -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Título que aparecerá en la pestaña del navegador -->
  <title>Hasta pronto</title>
  
  <style>
    /* Estilos CSS embebidos dentro del HTML */
    body {
      background: #111; /* Color de fondo oscuro para toda la página */
      color: #fff; /* Color de texto blanco para un buen contraste */
      font-family: 'Segoe UI', sans-serif; /* Establece una fuente moderna y legible */
      
      /* Centra el contenido tanto vertical como horizontalmente */
      display: flex;
      align-items: center; /* Alinea el contenido verticalmente al centro */
      justify-content: center; /* Alinea el contenido horizontalmente al centro */
      height: 100vh; /* Hace que el body ocupe toda la altura de la ventana */
      margin: 0; /* Elimina el margen por defecto del body */
    }

    /* Estilo para el contenedor del mensaje */
    .mensaje {
      text-align: center; /* Centra el texto dentro del contenedor */
      
      /* Aplica una animación al aparecer */
      animation: aparecer 2s ease-in-out;
    }

    /* Estilo del título */
    .mensaje h1 {
      font-size: 2.5em; /* Tamaño grande para el título */
      margin-bottom: 10px; /* Espacio debajo del título */
      color: #66ff99; /* Color verde brillante para el título */
    }

    /* Estilo de los párrafos debajo del título */
    .mensaje p {
      color: #ccc; /* Color gris claro para los párrafos */
    }

    /* Definición de la animación 'aparecer' */
    @keyframes aparecer {
      0% { opacity: 0; transform: translateY(20px); } /* Al principio, el texto es invisible y se encuentra desplazado hacia abajo */
      100% { opacity: 1; transform: translateY(0); } /* Al final, el texto se muestra con normalidad */
    }

    /* Estilos para el 'loader' (el spinner animado) */
    .loader {
      border: 4px solid #444; /* Borde gris oscuro */
      border-top: 4px solid #66ff99; /* Parte superior del borde de color verde brillante */
      border-radius: 50%; /* Hace que el borde sea redondeado */
      width: 40px; /* Establece el ancho del 'loader' */
      height: 40px; /* Establece la altura del 'loader' */
      
      /* Animación para girar el 'loader' */
      animation: girar 1s linear infinite; /* Gira constantemente cada segundo */
      margin: 20px auto; /* Centra el 'loader' horizontalmente */
    }

    /* Definición de la animación 'girar' */
    @keyframes girar {
      0% { transform: rotate(0deg); } /* Empieza desde el ángulo 0 grados */
      100% { transform: rotate(360deg); } /* Al final, gira 360 grados */
    }
  </style>
</head>

<body>
  <!-- Contenedor principal del mensaje -->
  <div class="mensaje">
    <!-- Título que muestra el mensaje de despedida -->
    <h1>¡Hasta pronto!</h1>
    
    <!-- Párrafo informando que la sesión se cerró correctamente -->
    <p>Tu sesión ha sido cerrada correctamente.</p>
    
    <!-- El 'loader' que indica que está en proceso de redirección -->
    <div class="loader"></div>
    
    <!-- Párrafo indicando que el sistema está redirigiendo -->
    <p>Redirigiendo al login...</p>
  </div>

  <!-- Script para redirigir al usuario después de 4 segundos -->
  <script>
    setTimeout(() => {
      window.location.href = "index.php?action=home"; // Redirige al usuario a la página de login o principal
    }, 4000); // Espera 4 segundos antes de redirigir
  </script>
</body>
</html>
