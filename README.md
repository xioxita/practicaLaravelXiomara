# 📚 Biblio Los Enlaces - Plataforma de Gestión Comunitaria

Proyecto desarrollado para la asignatura de Desarrollo Web en Entorno Servidor. Se trata de una aplicación integral de gestión bibliotecaria con un enfoque colaborativo (Tablón Comunitario).

## Tecnologías Utilizadas
* **Backend**: Laravel 11 / PHP 8.2
* **Frontend**: Blade, Tailwind CSS, DaisyUI
* **Base de Datos**: SQLite
* **Librerías Externas**: SweetAlert2 (Alertas interactivas)

## Estructura del Proyecto y Ficheros Clave

### 1. Sistema de Traducción
Se ha implementado un sistema multi-idioma dinámico (ES, EN, FR) utilizando:
* `app/Http/Middleware/SetLocale.php`: Gestiona el cambio de idioma en cada petición.
* `lang/en.json`, `lang/es.json`, `lang/fr.json`: Diccionarios de datos para la traducción de la interfaz.
* `bootstrap/app.php`: Registro del Middleware global.

### 2. Modelo de Datos y Persistencia
* `app/Models/Book.php`: Modelo Eloquent que gestiona la tabla de libros/notas.
* `database/migrations/..._create_books_table.php`: Definición de la estructura de la base de datos.
* `database/seeders/BookSeeder.php`: Alimentación masiva de datos iniciales para el Tablón Comunitario.

### 3. Lógica de Negocio (Controlador)
* `app/Http/Controllers/BookController.php`: Contiene los métodos del CRUD:
    - `index()`: Lista notas con paginación de 10 elementos.
    - `store()`: Almacena nuevas reseñas comunitarias.
    - `update()`: Modifica comentarios existentes.
    - `destroy()`: Eliminación lógica y física de registros.

### 4. Interfaz de Usuario (Vistas Blade)
* `resources/views/components/layouts/layout.blade.php`: Plantilla base con el Footer y Navbar.
* `resources/views/projects/index.blade.php`: Vista principal del tablón con tablas dinámicas y modales (DaisyUI) para el CRUD.
* `resources/views/main.blade.php`: Dashboard de bienvenida con control de acceso mediante `@auth` y `@guest`.

## Instalación y Despliegue

1. **Instalar dependencias de PHP**:
   ```bash
   composer install
   ```

2. **Instalar dependencias de Frontend**:
   ```bash
   npm install && npm run build
   ```

3. **Configurar el entorno**:
   * Copia el archivo de ejemplo: `cp .env.example .env`
   * Genera la clave de aplicación: `php artisan key:generate`

4. **Configurar la Base de Datos**:
   * Crea un archivo vacío en `database/database.sqlite`.
   * Ejecuta las migraciones y el seeder para tener datos de prueba:
   ```bash
   php artisan migrate:fresh --seed
   \```

5. **Iniciar el servidor**:
   ```bash
   php artisan serve
   \```

---

### 📂 Estructura y Funcionalidades Principales

#### Estructura MVC
* **Modelos**: Localizados en `app/Models/`, definen la estructura de los Libros y Usuarios.
* **Controladores**: `BookController.php` gestiona toda la lógica del CRUD y la paginación.
* **Vistas**: Desarrolladas con \**Blade**, utilizando componentes de diseño en `resources/views/components/`.

#### Funcionalidades
**CRUD Completo**: Sistema para crear, leer, editar y eliminar notas de lectura en tiempo real.
**Tablón Comunitario**: Un espacio compartido donde todos los alumnos pueden ver y comentar libros.
**Multi-idioma**: Soporte completo para Español, Inglés y Francés mediante archivos JSON y un Middleware personalizado.
**Interfaz Moderna**: Diseño responsivo utilizando **Tailwind CSS** y **DaisyUI**, con alertas interactivas de **SweetAlert2**.
**Paginación**: Gestión eficiente de grandes volúmenes de notas.
   

