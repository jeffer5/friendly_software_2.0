<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles9.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bodicito">

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
    
    <h2 id="tittle">Registro Nuevo Operario</h2>

    <div class="form-container">
            <img id="logo" src="img/logo.png" alt="" class="kenburns-top">
            <form action="index.php?action=create" method="POST" enctype="multipart/form-data" class="reg"> <!--enctype="multipart/form-data" permite que los datos del formulario se dividan en múltiples partes, y cada parte puede contener un tipo de dato diferente (texto o archivo).-->
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="nom_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Apellido</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="ape_usu" required>
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
                    <input type="number" class="form-control" id="staticEmail" name="ndo_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">correo electronico</label>
                    <div class="col-sm-8">
                    <input type="email" class="form-control" id="staticEma" name="ema_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Telefono</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="tel_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Usuario</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="staticEmail" name="usu_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Contrasena</label>
                    <div class="col-sm-8">
                    <input type="password" class="form-control" id="staticEmail" name="pass_usu" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Rol usuario</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="exampleFormControlSelect1" name="rol_usu" required>
                        <option value="">SELECCIONE</option>
                        <option value="operario">Operario</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Foto </label>
                    <div class="col-sm-8">
                    <input type="file" class="form-control" id="staticEmail" name="fot_usu" required>
                    </div>
                </div>
                <br>

                <button type=submit class="btn btn-primary">Registrar</button>
            </form>  

    </div>
    




<style>

   

</style>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



