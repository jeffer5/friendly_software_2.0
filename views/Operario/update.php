<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles16.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bodicito">


    <?php


        $ordenes = []; // Creamos un array para usarlo en JS
        foreach ($orden as $item) {
        $ordenes[$item['id_det']] = $item;
        
        }

    ?>

    <?php
    
        $prom = []; // Creamos un array para usarlo en JS
        foreach ($promedios as $items) {
        $prom[$items['id_pro']] = $items;
        
        }
    ?>


    <div class="container mt-5 mit">
        <a href="index.php?action=getindi" class="btn btn-danger mt-3 cerrar">Volver</a>
    </div>

        

    <h2 id="tittle">Actualizar Indicador</h2>

    <div class="form-container">
            <img id="logo" src="img/logo.png" alt="" class="kenburns-top">
            <form action="index.php?action=updateindi&id=<?= $indicador['id_ind'] ?>" method="POST" enctype="multipart/form-data" class="reg"> <!--enctype="multipart/form-data" permite que los datos del formulario se dividan en múltiples partes, y cada parte puede contener un tipo de dato diferente (texto o archivo).-->
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Cantidad realizada</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" id="staticEmail" name="can_rea2" value=<?php echo $indicador['can_rea']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Tiempo gastado</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" id="staticEmail" name="tie_gas2" value=<?php echo $indicador['tie_gas']; ?> required>
                    </div>
                </div>
                <br>
                 <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Fecha</label>
                    <div class="col-sm-8">
                    <input type="date" class="form-control" id="staticEmail" name="fec_ind2" value=<?php echo $indicador['fec_ind']; ?> required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Detalle orden</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="orden" name="id_det_fk2"  required  onchange="llenarInputs()">
                        <option value="">SELECCIONE</option>
                        <?php foreach ($orden as $item): ?>
                        <option value="<?= $item['id_det']; ?>"><?= $item['id_det']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Numero orden:</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="nro_ord" name="nro_ord">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Fecha de entrega:</label>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" id="fec_ent" name="fec_ent" disabled>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Producto</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="nom_pro" name="nom_pro" disabled>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Cantidad total</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="can_tot" name="can_tot">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Proceso</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="pro_ord" name="pro_ord">
                    </div>
                </div>
                
                <script>
                    
                    // Pasamos los datos PHP a JavaScript
                    const ordenes = <?= json_encode($ordenes); ?>;
                </script>
            
                <br>
               <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Estandar</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="promedio" name="id_pro_fk2"  required  onchange="llenarInputst()">
                        <option value="">SELECCIONE</option>
                        <?php foreach ($promedios as $items): ?>
                        <option value="<?= $items['id_pro']; ?>"><?= $items['id_pro']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <br>

                <script>
                    // Pasamos los datos PHP a JavaScript
                    const prom = <?= json_encode($prom); ?>;
                </script>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Producto estandar</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="pro_pro" name="tel_usu" disabled>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Proceso estandar</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="act_pro" name="usu_usu" disabled>
                    </div>
                </div>
                <br>


                <button type=submit class="btn btn-primary">Actualizar</button>

            </form>  

    </div>
    

    <script src="javascript/function.js"></script>
</body>
</html>