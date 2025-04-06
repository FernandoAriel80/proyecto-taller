# 🚗 A&M Service - Aplicación Web de Gestión de Taller Mecánico

Bienvenido al sistema **A&M Service**, una aplicación de taller online web completa que permite a clientes y empleados interactuar de manera organizada, rápida y eficiente dentro de un taller mecánico digitalizado.

---

## ✨ Funcionalidades Principales

### 🧑‍🔧 Para Clientes

- 🔍 **Explorar servicios**: visualización de todos los servicios disponibles en el taller.
- 📝 **Registro de cuenta**: creación de cuenta personal para acceder a funcionalidades exclusivas.
- 📅 **Reservar turnos**: gestión de citas para llevar vehículos al taller.
- 🚘 **Registrar vehículos**: los clientes pueden registrar uno o más vehículos, y si ya fueron cargados previamente, no necesitan volver a hacerlo.
- 🔧 **Seguimiento del vehículo**: acceso al estado actual del vehículo dentro del taller y detalles del mismo.

---

### 🛠️ Para Empleados y Administración

- 👥 **Gestión de clientes**: visualización de una lista completa de clientes registrados.
- 👤 **Creación de empleados**: los administradores pueden agregar nuevos empleados al sistema.
- 🗓️ **Visualización de reservaciones**: acceso a la agenda con los turnos solicitados por los clientes.
- 🏷️ **Registro de vehículos en taller**: ingreso formal del vehículo al taller al momento de su llegada.
- 👨‍🔧 **Asignación de responsables**: se puede asignar un empleado específico para atender a cada vehículo registrado.
- 📄 **Informe general**: el empleado designado puede generar un informe completo sobre el estado del vehículo.
- 📝 **Notas con imágenes**: los empleados pueden adjuntar imágenes y observaciones para mantener informado al cliente en tiempo real.
- ✅ **Dar de alta un vehículo**: una vez finalizado el servicio, se puede marcar el vehículo como finalizado o retirado del taller.

---

## 🔐 Roles del Sistema

- **Cliente**: puede visualizar servicios, registrar turnos y vehículos, y hacer seguimiento de los mismos.
- **Empleado**: tiene acceso a tareas técnicas relacionadas con los vehículos asignados.
- **Administrador**: gestiona clientes, empleados, y controla la actividad general del taller.

---

## ⚙️ Tecnologías Utilizadas

- **Backend**: PHP 8.2 (Laravel 11)
- **Frontend**: Blade (Laravel templating)
- **Diseño**: CSS (Tailwind 3.1.0)
- **Base de datos**: MySQL
- **Autenticación**: Laravel Auth (breeze 2.3)
- **Gestión de archivos**: Subida y manejo de imágenes para las notas
- **Control de versiones**: Git

---


## 🚀 Instalación (Modo desarrollo)

1. Cloná el repositorio:
   ```bash
   git clone https://github.com/FernandoAriel80/proyecto-taller.git
   cd proyecto-taller
