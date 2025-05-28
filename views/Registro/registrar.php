<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <h2 id="tittle">Registro Nuevo Supervisor</h2>

        

        <div class="manzana">


            <form class="form-re"  action="index.php?action=registrar" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" permite que los datos del formulario se dividan en múltiples partes, y cada parte puede contener un tipo de dato diferente (texto o archivo).-->
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticName" name="nom_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Apellido</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticLastName" name="ape_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Tipo de documento</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1" name="tdo_usu" required>
                        <option value="">SELECCIONE</option>
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                        <option value="TI">TI</option>
                        <option value="PT">PT</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Numero de documento</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" id="staticNdo" name="ndo_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Telefono</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticPhone" name="tel_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Usuario</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticUser" name="usu_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Contrasena</label>
                    <div class="col-sm-8">
                    <input type="password" class="form-control" id="staticPassword" name="pass_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Rol usuario</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect2" name="rol_usu" required>
                        <option value="">SELECCIONE</option>
                        <option value="supervisor">Supervisor</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Foto </label>
                    <div class="col-sm-8">
                    <input type="file" class="form-control" id="staticPhoto" name="fot_usu" required>
                    </div>
                </div>
                <br>

                <button type=submit class="btn btn-primary">Registrar</button>
            </form>
        </div>

    <button onclick="history.back()" class="btn btn-primary volver">volver</button>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
