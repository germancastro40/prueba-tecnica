# Prueba técnica para ingeniero junior

Este proyecto implementa las funcionalidades solicitadas para la **prueba técnica para ingeniero junior**, incluyendo un sistema de login seguro, un menú dinámico basado en datos de una base de datos y operaciones CRUD para las entidades "Personas" y "Departamentos".

## Funcionalidades implementadas

1. **Login seguro**
   - interfaz para inicio de sesión con validación de credenciales contra la base de datos.
   - contraseñas protegidas con un hash seguro utilizando `password_hash` y `password_verify`.

2. **Menú dinámico**
   - generación de un menú de navegación dinámico desde la base de datos.
   - soporte para submenús (opcional) gestionados mediante una jerarquía en la tabla del menú.

3. **CRUD de personas y departamentos**
   - operaciones para crear, leer, actualizar y eliminar personas y departamentos.
   - relación entre personas y departamentos para realizar consultas específicas.

---

## Tecnologías utilizadas

- **Lenguaje**: PHP 8.2
- **Base de datos**: MySQL
- **Entorno local**: XAMPP
- **Diseño**: Bootstrap 5 para diseño responsive.

---

## Instalación

### Requisitos previos

1. instalar [XAMPP](https://www.apachefriends.org/index.html) (PHP 8.2 y MySQL).
2. clonar el repositorio del proyecto.

### Pasos

1. **Clonar el repositorio**:
   ```bash
   git clone https://github.com/germancastro40/prueba-tecnica
   cd prueba-tecnica 
   ```
2. **Poblar la base de datos**
    - Iniciar XAMPP: Abre el Panel de Control de XAMPP y asegúrate de que Apache y MySQL estén iniciados
    - Copia la carpeta del proyecto (prueba-tecnica) a la carpeta htdocs de XAMPP. La ruta suele ser algo así como C:\xampp\htdocs\prueba-tecnica
    - Abre el archivo config/database.php en un editor de texto.Configura los valores de conexión según la configuración de tu base de datos
    - Abre tu navegador y accede a http://localhost/prueba-tecnica/initialize.php

### Credenciales de acceso de prueba
- ** email: usuario@example.com
- ** contraseña: usuario123 


## Autor
- ** German David Castro Bonilla
