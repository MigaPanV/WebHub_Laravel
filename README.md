# WebHub – Gestión de estudiantes

Sistema web para la gestión de información de estudiantes, desarrollado con Laravel y MySQL. Permite realizar operaciones CRUD (crear, consultar, actualizar y eliminar registros), además de incorporar herramientas de búsqueda, filtrado y ordenamiento.

El proyecto surge como una migración de una aplicación desarrollada inicialmente con PHP tradicional hacia el framework Laravel, con el propósito de organizar mejor el código y aplicar el patrón de arquitectura MVC.

## Tecnologías utilizadas

- **PHP 8.2:** lenguaje de programación del proyecto.
- **Laravel 12:** framework para el desarrollo de la aplicación.
- **MySQL:** sistema de gestión de bases de datos.
- **Blade:** motor de plantillas de Laravel.
- **Bootstrap 5:** framework para el diseño de interfaces.
- **CSS3:** personalización de estilos.
- **JavaScript:** funcionalidades e interacciones de la interfaz.
- **XAMPP:** entorno de desarrollo local.

## Funcionalidades

### Gestión de estudiantes

- Registrar nuevos estudiantes.
- Consultar el listado de estudiantes.
- Editar la información de los registros existentes.
- Eliminar estudiantes.
- Validar los datos ingresados en los formularios.
- Evitar el registro de documentos y correos electrónicos duplicados.

### Búsqueda y organización

- Buscar estudiantes por número de documento.
- Filtrar por nombre y apellido.
- Filtrar por correo electrónico.
- Filtrar por programa académico.
- Ordenar los registros alfabéticamente de forma ascendente o descendente.
- Limpiar los filtros aplicados.

### Interfaz de usuario

- Diseño oscuro personalizado.
- Navegación entre las diferentes secciones.
- Notificaciones para informar el resultado de las operaciones.
- Diseño adaptable a diferentes tamaños de pantalla.

## Estructura del proyecto

El proyecto utiliza la estructura de directorios de Laravel, organizando sus componentes de la siguiente manera:

```text
example-app/
│
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── webhub_db.sql
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── EstudianteController.php
│   │
│   └── Models/
│       └── Estudiante.php
│
├── public/
│   └── css/
│       └── estudiantes.css
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       │
│       └── estudiantes/
│           ├── index.blade.php
│           ├── list.blade.php
│           └── edit.blade.php
│
├── routes/
│   └── web.php
│
├── .env.example
├── artisan
└── composer.json
```

## Configurar la base de datos

Iniciar Apache y MySQL desde XAMPP.

Ingresar a phpMyAdmin.

Crear una base de datos llamada webhub_db.

Seleccionar la base de datos y acceder a la pestaña Importar.

Seleccionar el archivo database/webhub_db.sql.

Ejecutar la importación.

Una vez completado el proceso, la tabla estudiantes estará disponible para utilizar la aplicación.

Nota: el archivo SQL contiene la estructura de la tabla, pero no incluye registros de estudiantes. Los registros se pueden crear desde el formulario de la aplicación.

## Instalación y configuración

Para ejecutar el proyecto en un entorno local, sigue estos pasos:

### 1. Clonar el repositorio

```bash
git clone https://github.com/MigaPanV/WebHub_Laravel.git
```

### 2. Ingresar al directorio

```bash
cd WebHub_Laravel
```

### 3. Instalar las dependencias

```bash
composer install
```

### 4. Configurar el archivo de entorno

Crear el archivo `.env` a partir del archivo de ejemplo:

```bash
copy .env.example .env
```

Configurar las variables de conexión a la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webhub_db
DB_USERNAME=root
DB_PASSWORD=
```

Ajustar las credenciales según la configuración local de MySQL.

### 5. Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 6. Configurar la base de datos

Crear la base de datos `webhub_db` en MySQL e importar la estructura de la tabla `estudiantes` y sus datos, si se desea conservar registros existentes.

**Importante:** la tabla `estudiantes` utiliza una estructura propia y una clave primaria personalizada (`ID`). No se debe ejecutar `php artisan migrate:fresh` sobre una base de datos con información que se quiera conservar.

### 7. Iniciar el servidor

```bash
php artisan serve
```

Abrir la aplicación en el navegador:

```text
http://127.0.0.1:8000
```

## Arquitectura

El proyecto utiliza el patrón **Modelo-Vista-Controlador (MVC)** proporcionado por Laravel:

- **Modelo:** administra la interacción con la tabla `estudiantes` mediante Eloquent ORM.
- **Vista:** presenta los formularios y el listado de estudiantes utilizando Blade.
- **Controlador:** procesa las solicitudes, valida la información y coordina las operaciones del sistema.

## Estado del proyecto

Proyecto en desarrollo. Se está realizando la migración progresiva de una aplicación PHP tradicional hacia Laravel, conservando las funcionalidades principales y mejorando la organización y mantenimiento del código.

---

Desarrollado como proyecto académico y práctico para fortalecer conocimientos en desarrollo web, bases de datos y arquitectura MVC.
