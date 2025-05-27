

const circulo = document.getElementById('circulo');
const porcentaje = eficiencia; // Porcentaje deseado (en este caso, 75%)

// Calcula el tamaño del círculo basado en el porcentaje
const tamaño = (porcentaje / 100) * circulo.offsetWidth;

// Aplica el cambio de tamaño al círculo
circulo.style.width = tamaño + 'px';
circulo.style.height = tamaño + 'px';

// (Opcional) Puedes usar el porcentaje para crear texto dentro del círculo
const texto = document.createElement('p');
texto.textContent = porcentaje + '%';
texto.style.position = 'absolute';
texto.style.top = '50%';
texto.style.left = '50%';
texto.style.transform = 'translate(-50%, -50%)';
circulo.appendChild(texto);
