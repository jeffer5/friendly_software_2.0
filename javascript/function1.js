
function eliminarU(value){

let confimation = confirm ("Esta seguro de eliminar el registro?")

    if (confimation){

         window.location.href = 'index.php?action=delete&id=' + value; // Redirige a la acción de eliminar

    }

}