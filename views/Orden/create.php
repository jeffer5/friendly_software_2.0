<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <h2>Registro Nueva Orden</h2>

            <form action="index.php?action=crear" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" permite que los datos del formulario se dividan en múltiples partes, y cada parte puede contener un tipo de dato diferente (texto o archivo).-->
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Numero orden</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="staticEmail" name="nro_ord" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Cliente</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="nom_cli" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Fecha de entrega</label>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" id="staticEmail" name="fec_ent" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Producto</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="nom_pro" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Cantidad total</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="staticEmail" name="can_tot" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Proceso</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="pro_ord" required>
                    </div>
                </div>
                <br>

                <button type=submit class="btn btn-primary">Registrar</button>
            </form>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>