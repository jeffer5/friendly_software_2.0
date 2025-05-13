<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <h2>Registro Nuevo Estandar</h2>

            <form action="index.php?action=crearr" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" permite que los datos del formulario se dividan en múltiples partes, y cada parte puede contener un tipo de dato diferente (texto o archivo).-->
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Producto</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="pro_pro" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Proceso</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="act_pro" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Cantidad estandar</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="staticEmail" name="can_pro" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Tiempo estandar</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="staticEmail" name="tie_pro" required>
                    </div>
                </div>
                <br>

                <button type=submit class="btn btn-primary">Registrar</button>
            </form>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>