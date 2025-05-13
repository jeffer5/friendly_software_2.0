<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fotoNombre = null;

    if (isset($_FILES['fot_usu']) && $_FILES['fot_usu']['error'] == 0) {
        $fotoNombre = time() . '_' . $_FILES['fot_usu']['name']; // nombre único
        move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $fotoNombre);
    }

    $data = [
        'nom_usu' => $_POST['nom_usu'],
        'ape_usu' => $_POST['ape_usu'],
        'tdo_usu' => $_POST['tdo_usu'],
        'ndo_usu' => $_POST['ndo_usu'],
        'tel_usu' => $_POST['tel_usu'],
        'usu_usu' => $_POST['usu_usu'],
        'pass_usu' => $_POST['pass_usu'],
        'rol_usu' => $_POST['rol_usu'],
        'fot_usu' => $fotoNombre
    ];

    $this->usuario->create($data); // Llamar al modelo para crear el usuario
    header('Location: index.php?action=index');
}