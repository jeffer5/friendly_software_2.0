<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indicadores</title>
    <link rel="stylesheet" href="styles/stylesindica.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>


        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1040; /* Z-index mayor para overlay */
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1050; /* Z-index mayor para modal */
            width: 90%;
            height: 50%;
            max-width: 500px;
            box-sizing: border-box;
            color: #333; /* Color de texto para el modal */
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .modal-header h2 {
            margin: 0;
            color: #333;
        }

        .close-button {
            cursor: pointer;
            font-size: 24px;
            color: #aaa;
            background: none;
            border: none;
        }

        .close-button:hover {
            color: #333;
        }

        .modal-body {
            line-height: 1.6;
            color: #555;
        }

        .modal-body p strong {
            color: #333;
        }

        .modal-footer {
            text-align: right;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }

        .modal-footer button {
            background-color: #6c757d; /* Color de botón de Bootstrap secondary */
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .modal-footer button:hover {
            background-color: #5a6268;
        }
        /* NUEVOS ESTILOS: Específicos para el formulario dentro del modal de edición */
        #editModal .form-group {
            margin-bottom: 15px;
        }
        #editModal label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        #editModal input[type="number"],
        #editModal input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #editModal button[type="submit"] {
            background-color: #007bff; /* Color de Bootstrap primary */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        #editModal button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="mybody">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand mi-fri" href="#">Friendly software</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php?action=supervisor_dashboard">Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 mit">
    <h1>Indicadores</h1>
</div>

<div class="container yo">
    <form action="index.php?action=buscarIndicadorId" method="POST">
        Buscar por id <input type="number" placeholder="ingrese el id" name="id" class="id">
        <input type="submit" value="buscar" class="btn btn-primary">
    </form>
</div>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cantidad realizada</th>
            <th scope="col">Tiempo gastado</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th> <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($indicadores): ?>
            <?php
            // Tu lógica existente para manejar un solo resultado o múltiples
            if (isset($indicadores['id_ind']) && !isset($indicadores[0])) {
                $indicadores = [$indicadores];
            }
            ?>
            <?php foreach ($indicadores as $indi): ?>
                <tr>
                    <td><?php echo htmlspecialchars($indi['id_ind']); ?></td>
                    <td><?php echo htmlspecialchars($indi['can_rea']); ?></td>
                    <td><?php echo htmlspecialchars($indi['tie_gas']); ?></td>
                    <td><?php echo htmlspecialchars($indi['fec_ind']); ?></td>
                    <td>
                        <button class="btn btn-info btn-sm"
                            onclick="openModal(
                                '<?php echo htmlspecialchars($indi['id_ind']); ?>',
                                '<?php echo htmlspecialchars($indi['can_rea']); ?>',
                                '<?php echo htmlspecialchars($indi['tie_gas']); ?>',
                                '<?php echo htmlspecialchars($indi['fec_ind']); ?>'
                            )">Ver
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="openEditModal(
                                '<?php echo htmlspecialchars($indi['id_ind']); ?>',
                                '<?php echo htmlspecialchars($indi['can_rea']); ?>',
                                '<?php echo htmlspecialchars($indi['tie_gas']); ?>',
                                '<?php echo htmlspecialchars($indi['fec_ind']); ?>'
                            )">Editar
                        </button>
                    </td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminarU(this.value)" value="<?php echo htmlspecialchars ($indi['id_ind']); ?>">Eliminar</button></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No se encontraron resultados.</td></tr> <?php endif; ?>
    </tbody>
</table>

<div id="modalOverlay" class="modal-overlay"></div>
<div id="viewModal" class="modal">
    <div class="modal-header">
        <h2>Detalles del Indicador</h2>
        <button class="close-button" onclick="closeModal()">&times;</button>
    </div>
    <div class="modal-body">
        <p><strong>ID:</strong> <span id="modalId"></span></p>
        <p><strong>Cantidad Realizada:</strong> <span id="modalCanRea"></span></p>
        <p><strong>Tiempo Gastado:</strong> <span id="modalTieGas"></span></p>
        <p><strong>Fecha:</strong> <span id="modalFecInd"></span></p>
    </div>
    <div class="modal-footer">
        <button onclick="closeModal()">Cerrar</button>
    </div>
</div>

<div id="editModal" class="modal">
    <div class="modal-header">
        <h2>Editar Indicador</h2>
        <button class="close-button" onclick="closeEditModal()">&times;</button>
    </div>
    <div class="modal-body">
        <form action="index.php?action=updateIndicador" method="POST">
            <input type="hidden" id="editId" name="id_ind"> <div class="form-group">
                <label for="editCanRea">Cantidad Realizada:</label>
                <input type="number" id="editCanRea" name="can_rea" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editTieGas">Tiempo Gastado:</label>
                <input type="number" id="editTieGas" name="tie_gas" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editFecInd">Fecha:</label>
                <input type="date" id="editFecInd" name="fec_ind" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
    <div class="modal-footer">
        <button onclick="closeEditModal()">Cancelar</button>
    </div>
</div>

<script>
    // Referencias a elementos del DOM para el modal de VISTA (existente)
    const modalOverlay = document.getElementById('modalOverlay');
    const viewModal = document.getElementById('viewModal');
    const modalId = document.getElementById('modalId');
    const modalCanRea = document.getElementById('modalCanRea');
    const modalTieGas = document.getElementById('modalTieGas');
    const modalFecInd = document.getElementById('modalFecInd');

    // NUEVO: Referencias a elementos del DOM para el modal de EDICIÓN
    const editModal = document.getElementById('editModal');
    const editId = document.getElementById('editId');
    const editCanRea = document.getElementById('editCanRea');
    const editTieGas = document.getElementById('editTieGas');
    const editFecInd = document.getElementById('editFecInd');

    // Función para abrir el modal de VISTA (EXISTENTE, sin cambios)
    function openModal(id, canRea, tieGas, fecInd) {
        modalId.textContent = id;
        modalCanRea.textContent = canRea;
        modalTieGas.textContent = tieGas;
        modalFecInd.textContent = fecInd;

        modalOverlay.style.display = 'block';
        viewModal.style.display = 'block';
    }

    // Función para cerrar el modal de VISTA (EXISTENTE, sin cambios)
    function closeModal() {
        modalOverlay.style.display = 'none';
        viewModal.style.display = 'none';
    }

    // NUEVO: Función para abrir el modal de EDICIÓN
    function openEditModal(id, canRea, tieGas, fecInd) {
        // Llenar los campos del formulario en el modal de edición
        editId.value = id; // El ID va en un campo oculto
        editCanRea.value = canRea;
        editTieGas.value = tieGas;
        // Asumiendo que fecInd viene en formato YYYY-MM-DD para input type="date"
        editFecInd.value = fecInd;

        // Mostrar el overlay y el modal de edición
        modalOverlay.style.display = 'block';
        editModal.style.display = 'block';
    }

    // NUEVO: Función para cerrar el modal de EDICIÓN
    function closeEditModal() {
        modalOverlay.style.display = 'none';
        editModal.style.display = 'none';
    }

    // Cerrar el modal de VISTA o EDICIÓN al hacer clic fuera de él (en el overlay)
    modalOverlay.addEventListener('click', () => {
        // Cierra ambos por si acaso, solo uno estará visible normalmente
        closeModal();
        closeEditModal();
    });

    // Función para confirmar la eliminación (EXISTENTE, ajustada para tu action)
    function eliminarU(id) {
        const confirmacion = confirm("¿Estás seguro de que deseas eliminar este indicador con ID: " + id + "?");
        if (confirmacion) {
            // Redirige a la URL de eliminación que ya tienes en tu controlador
            window.location.href = "index.php?action=borrarIndicador&id=" + id; // Usando tu acción 'borrarIndicador'
        } else {
            console.log("Eliminación cancelada para el ID:", id);
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>