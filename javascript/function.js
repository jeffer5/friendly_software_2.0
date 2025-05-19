function eliminar(value){

let confimation = confirm ("Esta seguro de eliminar el registro?")

    if (confimation){

         window.location.href = 'index.php?action=eliminar&id=' + value; // Redirige a la acción de eliminar

    }

}


function llenarInputs(){
    
    // Obtiene el id de la orden seleccionada
    const id = document.getElementById('orden').value;

    // Si existen datos para el id seleccionado, los llena en los campos
    if (ordenes[id]) {
        document.getElementById('nro_ord').value = ordenes[id]['nro_ord'];
        document.getElementById('fec_ent').value = ordenes[id]['fec_ent'];
        document.getElementById('nom_pro').value = ordenes[id]['nom_pro'];
        document.getElementById('can_tot').value = ordenes[id]['can_tot'];
        document.getElementById('pro_ord').value = ordenes[id]['pro_ord'];
    } else {
        // Si no hay datos, vacía los campos
        document.getElementById('nro_ord').value = '';
        document.getElementById('fec_ent').value = '';
        document.getElementById('nom_pro').value = '';
        document.getElementById('can_tot').value = '';
        document.getElementById('pro_ord').value = '';
    }
    
 
}


function llenarInputst(){
    
    // Obtiene el id de la orden seleccionada
    const id = document.getElementById('promedio').value;

    // Si existen datos para el id seleccionado, los llena en los campos
    if (prom[id]) {
        document.getElementById('pro_pro').value = prom[id]['pro_pro'];
        document.getElementById('act_pro').value = prom[id]['act_pro'];
    } else {
        // Si no hay datos, vacía los campos
        document.getElementById('pro_pro').value = '';
        document.getElementById('act_pro').value = '';
       
    }
    
 
}
