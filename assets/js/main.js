// Datos de ejemplo (pueden venir del backend)
// valor inicial por si tarda la respuesta
let usuario = {
	nombre: "Invitado",
	correo: "",
	imagen: "https://i.pravatar.cc/150?img=68"
};

async function cargarUsuario() {
	try {
		const res = await fetch('inicio_sesion.php', {
			method: 'GET',
			credentials: 'same-origin', // incluye cookies de sesión
			headers: { 'Accept': 'application/json' }
		});
		if (!res.ok) throw new Error('Respuesta no OK');
		const data = await res.json(); // espera { nombre, correo, imagen }
		if (data && data.nombre) usuario = data;
	} catch (err) {
		console.warn('Error cargando usuario:', err);
	} finally {
		// actualizar DOM si ya existe
		const elName = document.getElementById("profileName");
		if (elName) {
			document.getElementById("profileName").textContent = usuario.nombre || "";
			const email = document.getElementById("profileEmail");
			if (email) email.textContent = usuario.correo || "";
			const img = document.getElementById("profileImage");
			if (img) img.src = usuario.imagen || "";
			const nombreUsuario = document.getElementById("nombreUsuario");
			if (nombreUsuario) nombreUsuario.textContent = usuario.nombre || "";
		}
	}
}

// lanzar la carga (actualizará la UI cuando termine)
cargarUsuario();

// Asignar datos al cargar
window.addEventListener("DOMContentLoaded", function () {
  document.getElementById("profileName").textContent = usuario.nombre;
  document.getElementById("profileEmail").textContent = usuario.correo;
  document.getElementById("profileImage").src = usuario.imagen;
  document.getElementById("nombreUsuario").textContent = usuario.nombre;
});

// Referencias
const modal = document.getElementById("modalReserva");
const reservarBtn = document.getElementById("reservarBtn");
const cancelarBtn = document.getElementById("cancelarBtn");
const formReserva = document.getElementById("formReserva");
const contenido = document.getElementById("contenido");

// Mostrar modal
reservarBtn.addEventListener("click", function () {
  modal.classList.remove("hidden");
  modal.classList.add("flex");
});

// Cerrar modal
cancelarBtn.addEventListener("click", function () {
  modal.classList.add("hidden");
});

// Enviar reserva
formReserva.addEventListener("submit", function (e) {
  e.preventDefault();
  const fecha = document.getElementById("fecha").value;
  const hora = document.getElementById("hora").value;
  const descripcion = document.getElementById("descripcion").value;

  if (!fecha || !hora || !descripcion) {
    alert("Por favor completa todos los campos.");
    return;
  }

  modal.classList.add("hidden");
  contenido.innerHTML = `
    <div class="p-4 border-l-4 border-green-600 bg-green-50 rounded">
      <h3 class="text-lg font-semibold text-green-800">Reserva Confirmada</h3>
      <p class="text-gray-700 mt-2">📅 Fecha: ${fecha}</p>
      <p class="text-gray-700">⏰ Hora: ${hora}</p>
      <p class="text-gray-700">📝 Descripción: ${descripcion}</p>
    </div>
  `;
});

// Simular cerrar sesión
document.getElementById("logoutBtn").addEventListener("click", function () {
  alert("Sesión cerrada correctamente.");
});
