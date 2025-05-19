<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


        <form action="index.php?action=updateLL&id=<?= $usuario['id_pro'] ?>" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" permite que los datos del formulario se dividan en múltiples partes, y cada parte puede contener un tipo de dato diferente (texto o archivo).-->
                 <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Id</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="id_pro" value=<?php echo $usuario['id_pro']; ?> required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Producto</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="pro_pro2" value=<?php echo $usuario['pro_pro']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Proceso</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="act_pro2" value=<?php echo $usuario['act_pro']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Cantidad estandar</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="staticEmail" name="can_pro2" value=<?php echo $usuario['can_pro']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Tiempo estandar</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="staticEmail" name="tie_pro2" value=<?php echo $usuario['tie_pro']; ?> required>
                    </div>
                </div>
                <br>

                <button type=submit class="btn btn-primary">Actualizar</button>
            </form>

    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>