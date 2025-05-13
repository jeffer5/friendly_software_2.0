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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
    <h1>Bienvenido, <?= htmlspecialchars($user['usu_usu']) ?></h1>
    <a href="index.php?action=logout" class="btn btn-danger mt-3">Cerrar Sesión</a>
</div>
</body>
</html>