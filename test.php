<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Efecto vidrio con imágenes</title>
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1517816743773-6e0fd518b4a6?auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
      background-size: cover;
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }

    .glass {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      padding: 30px;
      max-width: 400px;
      margin: 100px auto;
      color: #fff;
      text-align: center;
    }

    .glass img {
      width: 100px;
      height: auto;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <div class="glass">
    <img src="https://upload.wikimedia.org/wikipedia/commons/4/47/PNG_transparency_demonstration_1.png" alt="Imagen transparente">
    <h2>Contenido dentro del efecto vidrio</h2>
    <p>Este div tiene fondo semitransparente con efecto blur. La imagen PNG respeta el efecto del fondo.</p>
  </div>

</body>
</html>



