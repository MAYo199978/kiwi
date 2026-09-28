# Kiwi - Sistema de Gestión de Multisesiones

Un sistema web moderno implementado en Laravel que demuestra la gestión avanzada de sesiones de usuario, incluyendo inicio de sesión único (Single Session Login), cookies seguras y recuperación de sesiones.

## 🚀 Características Principales

### ✅ Single Session Login
- Solo una sesión activa por usuario simultáneamente
- Al iniciar sesión desde otro dispositivo/navegador, la sesión anterior se cierra automáticamente
- Middleware personalizado que verifica la validez de la sesión en cada request

### ✅ Cookies Seguras
- Cookies HTTPOnly activadas para prevenir acceso desde JavaScript
- Configuración `secure` y `same_site` para protección CSRF
- Opción "Remember Me" con tokens seguros

### ✅ Recuperación de Sesiones
- Sistema de "Remember Me" integrado
- Sesiones expiran según configuración (120 minutos por defecto)
- Manejo automático de expiración y renovación

### ✅ Interfaz Moderna
- Diseño responsivo con Bootstrap 5
- Gradientes dinámicos y animaciones CSS
- Elementos interactivos con JavaScript
- Verificación de fortaleza de contraseña en tiempo real

## 📋 Requisitos del Sistema

- PHP 8.1 o superior
- Composer
- MySQL/MariaDB
- Node.js y NPM (opcional, para assets)

## 🛠️ Instalación y Configuración

### 1. Clonar el Repositorio
```bash
git clone <url-del-repositorio>
cd kiwi
```

### 2. Instalar Dependencias
```bash
composer install
```

### 3. Configurar Entorno
```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` con tus configuraciones de base de datos:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kiwi
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

### 4. Ejecutar Migraciones y Seeders
```bash
php artisan migrate:fresh --seed
```

### 5. Iniciar el Servidor
```bash
php artisan serve
```

### 6. Acceder a la Aplicación
- **Página principal**: http://127.0.0.1:8000/
- **Registro**: http://127.0.0.1:8000/register
- **Login**: http://127.0.0.1:8000/login

## 👥 Credenciales de Prueba

Después de ejecutar los seeders, tendrás estos usuarios disponibles:

| Email | Contraseña | Rol |
|-------|------------|-----|
| usuario1@example.com | password123 | Usuario normal |
| usuario2@example.com | password123 | Usuario normal |
| admin@example.com | admin123 | Administrador |

## 🧪 Probar Single Session Login

1. **Paso 1**: Inicia sesión con `usuario1@example.com` en una ventana del navegador
2. **Paso 2**: Abre una nueva ventana privada (o diferente navegador)
3. **Paso 3**: Inicia sesión con las mismas credenciales (`usuario1@example.com` / `password123`)
4. **Resultado**: La primera sesión se cerrará automáticamente y mostrarás un mensaje de error

## 📁 Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/Auth/
│   │   ├── LoginController.php
│   │   └── RegisterController.php
│   └── Middleware/
│       └── CheckSingleSession.php
├── Models/
│   └── User.php
database/
├── migrations/
│   ├── *_create_users_table.php
│   ├── *_add_session_id_to_users_table.php
│   └── *_create_sessions_table.php
└── seeders/
    └── DatabaseSeeder.php
resources/views/
├── welcome.blade.php
├── dashboard.blade.php
└── auth/
    ├── login.blade.php
    └── register.blade.php
routes/
└── web.php
config/
├── auth.php
└── session.php
```

## 🔧 Configuración de Seguridad

### Cookies Seguras (config/session.php)
```php
'secure' => env('SESSION_SECURE_COOKIE'),
'http_only' => true,
'same_site' => 'lax',
```

### Middleware de Sesión Única
- Registrado en `app/Http/Kernel.php`
- Se ejecuta en cada request del grupo 'web'
- Verifica que la sesión del usuario sea la más reciente

## 🎨 Tecnologías Utilizadas

- **Laravel 10**: Framework PHP
- **Bootstrap 5**: Framework CSS
- **MySQL**: Base de datos
- **Blade Templates**: Motor de plantillas
- **JavaScript**: Interactividad del frontend

## 📚 Documentación Adicional

- [Documentación de Laravel](https://laravel.com/docs)
- [Guía de Autenticación de Laravel](https://laravel.com/docs/authentication)
- [Middleware en Laravel](https://laravel.com/docs/middleware)

## 🤝 Contribuir

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE](LICENSE) para más detalles.

---

**Desarrollado con ❤️ usando Laravel**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
