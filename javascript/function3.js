function configurarBoton() {
    const boton = document.querySelector('.btn.btn-primary.buton');
    boton.addEventListener('click', function () {
        boton.classList.add('pressed');
    });
}

// Puedes llamarla así si quieres ejecutarla de inmediato:
configurarBoton();