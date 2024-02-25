# Proyecto Laravel

CRUD Laravel

## Requisitos previos

- PHP >= 7.3
- Composer (para instalar las dependencias de PHP)
- Node.js >= 14.x
- npm (Administrador de paquetes de Node.js)

## Instalación

1. **Clona este repositorio:**

    ```bash
    git clone https://github.com/Raumid/laravel-test.git
    ```

2. **Accede al directorio del proyecto:**

    ```bash
    cd laravel-test
    ```

3. **Instala las dependencias de PHP con Composer:**

    ```bash
    composer install
    ```

4. **Instala las dependencias de JavaScript con npm:**

    ```bash
    npm install
    ```

5. **Copia el archivo de configuración `.env.example` y renómbralo a `.env`:**

    ```bash
    cp .env.example .env
    ```

6. **Genera una nueva clave de aplicación:**

    ```bash
    php artisan key:generate
    ```

## Configuración

Edita el archivo `.env` y configura las variables de entorno según sea necesario, como la configuración de la base de datos y otros ajustes de la aplicación.

## Migraciones y Semillas

Ejecuta las migraciones de la base de datos para crear las tablas necesarias:

1. **Ejecuta la Migracion:**

```bash
php artisan migrate
```

2. **Ejecuta las Semillas:**

```bash
php artisan db:seed --class=InitialSchemaSeeder
```

## Ejecucion

Una vez completados los pasos anteriores, puedes iniciar el servidor de desarrollo de Laravel ejecutando el siguiente comando:

```bash
php artisan serve
```