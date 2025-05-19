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


        <form action="index.php?action=update&id=<?= $usuario['id_usu'] ?>" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" permite que los datos del formulario se dividan en múltiples partes, y cada parte puede contener un tipo de dato diferente (texto o archivo).-->
                 <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Id</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="id_usu" value=<?php echo $usuario['id_usu']; ?> required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="nom_usu2" value=<?php echo $usuario['nom_usu']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Apellido</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="ape_usu2" value=<?php echo $usuario['ape_usu']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-1 col-form-label">Tipo de documento</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="exampleFormControlSelect1" name="tdo_usu2" value=<?php echo $usuario['tdo_usu']; ?> required>
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
                    <label for="staticEmail" class="col-sm-1 col-form-label">Numero de documento</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="staticEmail" name="ndo_usu2" value=<?php echo $usuario['ndo_usu']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Telefono</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="tel_usu2" value=<?php echo $usuario['tel_usu']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Usuario</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="staticEmail" name="usu_usu2" value=<?php echo $usuario['usu_usu']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-1 col-form-label">Rol usuario</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="exampleFormControlSelect1" name="rol_usu2" value=<?php echo $usuario['rol_usu']; ?> required>
                        <option value="">SELECCIONE</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="operario">Operario</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-1 col-form-label">Foto </label>
                    <div class="col-sm-6">
                    <input type="file" class="form-control" id="staticEmail" name="fot_usu" width="100" height="100" alt="foto de usuario" required> 
                    </div>
                </div>
                <br>
                

                <button type=submit class="btn btn-primary">Actualizar</button>
            </form>

    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>