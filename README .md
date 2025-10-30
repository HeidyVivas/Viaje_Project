# 🌍 Viaje_Project

## 📖 Descripción
**Viaje_Project** es una aplicación web desarrollada para gestionar viajes y reservas turísticas.  
Permite a los usuarios registrarse, iniciar sesión, explorar destinos, realizar reservas y gestionar su información personal.  
El sistema está desarrollado con **PHP**, **HTML**, **CSS**, **JavaScript** y una base de datos **MySQL**.

---

## 🧱 Estructura del proyecto

```
Viaje_Project/
│
├── assets/
│   ├── css/            → Estilos del sitio
│   └── js/             → Scripts JavaScript
│
├── img/                → Imágenes del proyecto
│
├── includes/           → Archivos comunes (header, footer, conexión BD, etc.)
│
├── reservas/           → Funcionalidad de reservas
│
├── vistas/             → Vistas HTML/PHP
│
├── index.php           → Página principal
├── login.php           → Inicio de sesión
├── registrar.php       → Registro de usuario
├── usuario.php         → Perfil del usuario
└── lugares.php         → Listado de destinos turísticos

```

---

## ⚙️ Tecnologías utilizadas

| Tipo | Herramienta / Lenguaje |
|------|--------------------------|
| Backend | PHP |
| Frontend | HTML5, CSS3, JavaScript |
| Base de datos | MySQL |
| Servidor local | XAMPP / Laragon |
| Control de versiones | Git y GitHub |

---

## 💾 Base de datos

### Nombre sugerido:
`viaje_db`

### Tablas principales:
#### 🧍‍♀️ usuarios
| Campo | Tipo | Descripción |
|--------|------|-------------|
| id_usuario | INT (PK, AI) | Identificador único |
| nombre | VARCHAR(100) | Nombre del usuario |
| correo | VARCHAR(100) | Correo electrónico |
| contraseña | VARCHAR(255) | Contraseña encriptada |
| rol | ENUM('cliente','admin') | Rol del usuario |

#### 🏖️ lugares
| Campo | Tipo | Descripción |
|--------|------|-------------|
| id_lugar | INT (PK, AI) | Identificador del lugar |
| nombre | VARCHAR(100) | Nombre del destino |
| descripcion | TEXT | Descripción cultural/turística |
| imagen | VARCHAR(255) | Ruta de la imagen |

#### 📅 reservas
| Campo | Tipo | Descripción |
|--------|------|-------------|
| id_reserva | INT (PK, AI) | Identificador único |
| id_usuario | INT (FK) | Usuario que reserva |
| id_lugar | INT (FK) | Lugar reservado |
| fecha_reserva | DATE | Fecha de la reserva |
| estado | ENUM('pendiente','confirmada','cancelada') | Estado de la reserva |

Relaciones:
- Un **usuario** puede tener muchas **reservas**.  
- Cada **reserva** pertenece a un **lugar**.

---

## 🚀 Instalación y configuración

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/HeidyVivas/Viaje_Project.git
   ```

2. **Mover el proyecto al servidor local**
   - Copia la carpeta `Viaje_Project` dentro de `htdocs` (XAMPP) o `www` (Laragon).

3. **Configurar la base de datos**
   - Crea una base llamada `viaje_db`.
   - Importa el script SQL con las tablas anteriores (o crea manualmente en phpMyAdmin).

4. **Configurar conexión**
   - En `includes/config.php`, coloca tus credenciales:
     ```php
     $conn = new mysqli("localhost", "root", "", "viaje_db");
     ```

5. **Iniciar el servidor**
   - Abre [http://localhost/Viaje_Project](http://localhost/Viaje_Project) en tu navegador.

---

## 🧭 Uso del sistema

- 📝 **Registro:** Crea una cuenta nueva desde `registrar.php`.  
- 🔐 **Inicio de sesión:** Accede con tus credenciales en `login.php`.  
- 🌆 **Explorar lugares:** Visualiza destinos turísticos en `lugares.php`.  
- 📆 **Reservar:** Elige un destino y realiza tu reserva.  
- 👤 **Perfil:** Consulta o edita tu información personal.  
- 🚪 **Cerrar sesión:** Sal del sistema de manera segura.

---

## 🧩 Buenas prácticas

- Mantén la lógica PHP separada del diseño (HTML/CSS).
- Valida los formularios en cliente (JavaScript) y servidor (PHP).
- Usa `password_hash()` y `password_verify()` para las contraseñas.
- Crea commits descriptivos con cada cambio realizado.
- Prueba las rutas y la base de datos antes de publicar.

---

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas!  
Para colaborar:

1. Haz un *fork* del proyecto.  
2. Crea una rama nueva:  
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3. Realiza tus cambios y haz *commit*:  
   ```bash
   git commit -m "Agrega nueva funcionalidad"
   ```
4. Sube tu rama y crea un *Pull Request*.

---

## 📜 Licencia
Este proyecto se distribuye bajo la licencia **MIT**.  
Puedes modificarlo, compartirlo o mejorarlo libremente, citando la fuente original.

---

## 📧 Contacto
Proyecto desarrollado por 
**Heidy Vivas**  
**Saira Argon**

📩 [Repositorio en GitHub](https://github.com/HeidyVivas/Viaje_Project)

---

