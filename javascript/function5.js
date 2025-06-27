function eliminar(value){

let confimation = confirm ("Esta seguro de eliminar el registro?")

    if (confimation){

         window.location.href = 'index.php?action=eliminarOrdenAsignada&id=' + value; // Redirige a la acción de eliminar

    }

}


function llenarInputs(){
        // Obtiene el id de la orden seleccionada
        const id = document.getElementById('nro_ord').value;

        // Si existen datos para el id seleccionado y no es la opción "Escoja"
        if (id && ordencitas[id]) { // Agregamos 'id' para evitar errores si "Escoja" es seleccionado
            // Asegúrate que 'pro_ord' es la clave correcta en tus datos de $orden
            document.getElementById('proceso').value = ordencitas[id]['pro_ord'];
        } else {
            // Si no hay datos o se selecciona "Escoja", vacía los campos
            document.getElementById('proceso').value = '';
        }
    }

    // Añadir el event listener para que la función se ejecute al cambiar la selección
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('nro_ord');
        if (selectElement) {
            selectElement.addEventListener('change', llenarInputs);
            // Opcional: Llama a la función al cargar la página si ya hay una opción preseleccionada
            // llenarInputs();
        }
    });



