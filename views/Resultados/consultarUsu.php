<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/stylesUsu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>


 <div class="sidebar">
        <a href="index.php?action=principal">Inicio</a>
        
        <a onclick="toggleSubmenu('perfilSubmenu', this)">
            Operario <span class="toggle-icon">></span>
        </a>
        <div class="submenu" id="perfilSubmenu">
            <a href="index.php?action=conUsu">Consular operario</a>
        </div>

        <a onclick="toggleSubmenu('otroSubmenu', this)">
            Orden <span class="toggle-icon">></span>
        </a>
        <div class="submenu" id="otroSubmenu">
            <a href="index.php?action=conOrd1">Consultar orden</a>
            <a href="index.php?action=conByData">Consultar por fecha</a>
        </div>

         <a href="index.php?action=showAllEfi">Eficiencias completas</a>
          <a href="index.php?action=supervisor_dashboard">Salir</a>
        <a href="index.php?action=logout">Cerrar sesión</a>
    </div>


    <div class="content">
    <h1>Bienvenido</h1>
    <form action="index.php?action=conUsu2" method="post" enctype="multipart/form-data" class="form-container"> 
        <p> Seleccione al operario que esta buscando</p>
        <label for="usuario" id="usuario"></label>
        <select name="usuario" required>
            <option value="">Escoja</option>
            <?php foreach($usuarios as $usuario): ?>
                <option value="<?= $usuario['id_usu']; ?>"><?= $usuario['nom_usu']; ?></option>
            <?php endforeach; ?>
        </select>

         <input type="submit" class="btn btn-primary asi" value="Escoger" name="escoger">
        <button style="background-color: aquamarine; border: none; padding: 10px 20px; border-radius: 5px;" onclick="window.print()">🖨️ Imprimir o Guardar como PDF</button>
    </form>
    </div>
    



    <center>
<table class="table table-striped ">
    
    <?php if (isset($usuarioes) && count($usuarioes) > 0): ?>
        <?php foreach ($usuarioes as $item): ?>
            <tr >
                <th class="titt">Descripcion del usuario</th>
            </tr>

            <tr>
                <td class="tittle">Usuario<br>
                    <div class="valor"><?= $item['usu_usu'] ?></div>
                </td>
            </tr>
            <tr>
                 <td class="titt">Nombre y Apellido<br>
                 <div class="valor"><?= $item['nom_usu'] ?></div>
                 <div class="valor"><?= $item['ape_usu'] ?></div>
                </td>
            </tr>
            <tr>
                 <td class="tittle">Numero de Orden <br>
                 <div class="valor"><?= $item['nro_ord'] ?></div>
                </td>
            </tr>
            <tr>
                 <td class="titt">Nombre del producto<br>
                 <div class="valor"><?= $item['nom_pro'] ?></div>
                </td>
            </tr>
            <tr>
                 <td class="tittle">Cantidades<br>
                 <div class="valor">Cantidad realizada: <?= $item['can_rea'] ?></div><br>
                 <div class="valor">Tiempo gastado: <?= $item['tie_gas'] ?></div>
                </td>
            </tr>
            <tr>
                 <td class="titt">Fecha<br>
                 <div class="valor"><?= $item['fec_ind'] ?>
                </td>
            </tr>
            <tr>
                 <td class="tittle">Eficiencia<br>
                 
                 <div class="porcentaje" style="--porcentaje: <?= $item['tot_efi'] ?>">
                 <svg width="150" height="150">
                    <circle r="70" cx="50%" cy="50%" pathlength="100"/>
                    <circle r="70" cx="50%" cy="50%" pathlength="100"/>
                </svg>
                <span><?= $item['tot_efi'] ?>%</span>
                 </div>
                </td>
            </tr>



        <?php endforeach; ?>
    <?php elseif (isset($usuarioes)): ?>
        <tr><td colspan="9">No se encontraron datos para este usuario.</td></tr>
    <?php endif; ?>
</table><br>
</center>

    <script src="javascript/function4.js"></script>
    <script src="javascript/function3.js"></script>
</body>
</html>