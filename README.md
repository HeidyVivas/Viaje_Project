# Proyecto ligero — TravelNow (HTML, CSS, PHP para XAMPP)

## Contenido
- `index.html` — Iniciar sesión (formulario).
- `registro.html` — Formulario de registro de usuarios.
- `reservas.html` — Formulario para crear reservas (requiere iniciar sesión).
- `css/style.css` — Estilos base.
- `php/` — Archivos PHP: `conexion.php`, `login.php`, `registro.php`, `reserva.php`, `cerrar_sesion.php`.
- `bd/viajes.sql` — Script SQL para importar en phpMyAdmin.

## Instrucciones rápidas (XAMPP)
1. Copia la carpeta `viajes_light_project` dentro de `C:\xampp\htdocs\` (Windows) o la ruta `htdocs` de tu XAMPP/Laragon.
2. Abre `http://localhost/phpmyadmin` y crea/importa el archivo `bd/viajes.sql`.
3. Abre en el navegador `http://localhost/viajes_light_project/index.html`.
4. Regístrate en `registro.html` y luego inicia sesión.
5. `php/conexion.php` asume `root` sin contraseña. Si tu MySQL usa otra credencial, edita ese archivo.

## Seguridad (nota)
- Este proyecto es un ejemplo para desarrollo local/educativo. No usar tal cual en producción.
- Se usan sentencias preparadas y `password_hash`/`password_verify`.
- En producción:
  - Usa HTTPS, valida entradas con más rigor, sanitiza salidas, y aplica controles CSRF.

## Soporte
Si quieres, puedo:
- Añadir panel de administración (CRUD de usuarios y reservas).
- Listar reservas del usuario.
- Preparar un `.htaccess` y VirtualHost para facilitar la URL.
