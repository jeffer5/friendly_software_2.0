<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/stylesedit.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="edi">


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand mi-fri" href="#">Friendly software</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" href="index.php?action=index">Salir</a></li>
            </ul>
          </div>
        </div>
    </nav>

        <h1 id="title">Actualizar Estandar</h1>

        

        <form  action="index.php?action=update&id=<?= $usuario['id_usu'] ?>" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" permite que los datos del formulario se dividan en múltiples partes, y cada parte puede contener un tipo de dato diferente (texto o archivo).-->
            <div class="form">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label dat">Id</label>
                    <div class="col-sm-8"> 
                    <input type="text" class="form-control" id="staticEmail" name="id_usu" value=<?php echo $usuario['id_usu']; ?> required>
                    </div>
                </div> <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label dat">Nombre</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="nom_usu2" value=<?php echo $usuario['nom_usu']; ?> required>
                    </div>
                </div> <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label dat">Apellido</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="ape_usu2" value=<?php echo $usuario['ape_usu']; ?> required>
                    </div>
                </div> <br>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label dat">Tipo de documento</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1" name="tdo_usu2" value=<?php echo $usuario['tdo_usu']; ?> required>
                        <option value="">SELECCIONE</option>
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                        <option value="TI">TI</option>
                        <option value="PT">PT</option>
                        </select>
                    </div>
                </div> <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label dat">Numero de documento</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" id="staticEmail" name="ndo_usu2" value=<?php echo $usuario['ndo_usu']; ?> required>
                    </div>
                </div> <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label dat">Telefono</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="tel_usu2" value=<?php echo $usuario['tel_usu']; ?> required>
                    </div>
                </div> <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label dat">Usuario</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="usu_usu2" value=<?php echo $usuario['usu_usu']; ?> required>
                    </div>
                </div> <br>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label dat">Rol usuario</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1" name="rol_usu2" value=<?php echo $usuario['rol_usu']; ?> required>
                        <option value="">SELECCIONE</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="operario">Operario</option>
                        </select>
                    </div>
                </div> <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label dat">Foto </label>
                    <div class="col-sm-8">
                    <input type="file" class="form-control" id="staticEmail" name="fot_usu" width="100" height="100" alt="foto de usuario" required> 
                    </div>
                </div> <br>
                 <button type=submit class="btn btn-primary">Actualizar</button>


            </div>
            </form>


    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>