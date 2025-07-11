<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles/styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>


<body class="bg-light d-flex justify-content-center align-items-center vh-100 ">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <img id="logo" src="img/logo.png" alt="">
        <h4 class="mb-4 text-center">Iniciar Sesión</h4>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=login">
            <div class="mb-3">
                <label for="usu_usu" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usu_usu" name="usu_usu" required>
            </div>
            <div class="mb-3">
                <label for="pass_usu" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="pass_usu" name="pass_usu" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
            <div class="d-grid">
                <button type="reset" class="btn btn-primary">Borrar</button>
            </div>
            <div class="d-grid">
                <a  href="index.php?action=showForgotPasswordForm"  class="forgot" href="">Forgot password?</a>
            </div>

            <div class="d-grid mi-grid">
                <a class="btn btn-primary" href="index.php?action=home">Salir</a>
            </div>
        </form>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

        

</html>