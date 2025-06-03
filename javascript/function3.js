function toggleSubmenu(id, element) {
    const submenu = document.getElementById(id);
    const icon = element.querySelector('.toggle-icon');

    if (submenu.style.display === "block") {
      submenu.style.display = "none";
      icon.classList.remove('rotate');
    } else {
      submenu.style.display = "block";
      icon.classList.add('rotate');
    }
  }

          
    let imagenes = [
      'img/estandar.jpg',
      'img/orden1.png',
      'img/orden.jpg',

    ];
    
    let vuelta = 0;

    function mostrarImagen() {
      const cambioImagen = document.getElementById('carrusel');
      cambioImagen.src = imagenes[vuelta];
    }

    function adelante() {
      vuelta++;
      if (vuelta >= imagenes.length) vuelta = 0;
      mostrarImagen();
    }

    function atras() {
      vuelta--;
      if (vuelta < 0) vuelta = imagenes.length - 1;
      mostrarImagen();
    }

    // Esta función se ejecutará al cargar la página para iniciar el carrusel automático
    window.onload = function () {
      setInterval(adelante, 6000); // cambia cada 5 segundos
    };
 