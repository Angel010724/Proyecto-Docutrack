# 📋 DocuTrack - Sistema de Certificados de Nacimiento

Sistema web full-stack desarrollado para la gestión e impresión de certificados de nacimiento con búsqueda por cédula de identidad.

## 🚀 Características

✅ Búsqueda inteligente por número de cédula  
✅ Generación automática de certificados de nacimiento  
✅ Interfaz moderna y responsiva  
✅ API REST robusta para consultas  
✅ Base de datos optimizada con PostgreSQL  
✅ Sistema de autenticación seguro  
✅ Impresión de certificados en formato PDF  
✅ Dashboard administrativo para gestión  

## 🛠️ Stack Tecnológico

### Backend
- **Framework:** Laravel 11.x
- **Base de Datos:** PostgreSQL 17
- **Servidor Web:** Apache (XAMPP)
- **API:** RESTful con Laravel Sanctum
- **ORM:** Eloquent

### Frontend
- **Framework:** Next.js 14.x (App Router)
- **Lenguaje:** TypeScript
- **Styling:** Tailwind CSS
- **UI Components:** React Components
- **Estado:** React Hooks / Context API
- **HTTP Client:** Axios / Fetch API

### Herramientas de Desarrollo
- **Control de Versiones:** Git & GitHub
- **IDE:** Visual Studio Code
- **Base de Datos GUI:** pgAdmin 4 / DBeaver
- **API Testing:** Postman / Thunder Client

## 📦 Instalación

### Prerrequisitos
- PHP >= 8.2
- Composer (Gestor de dependencias PHP)
- Node.js >= 18.x y npm/yarn
- PostgreSQL 17
- Apache (XAMPP recomendado)
- Git

## 🔧 Configuración del Backend (Laravel)

1. **Clonar el repositorio:**
```bash
git clone https://github.com/Angel010724/Proyecto-Docutrack.git
cd Proyecto-Docutrack
```

2. **Instalar dependencias PHP:**
```bash
composer install
```

3. **Configurar variables de entorno:**
```bash
cp .env.example .env
```

4. **Editar `.env` con tus configuraciones:**
```env
APP_NAME="DocuTrack"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5433
DB_DATABASE=ProyectoDocuTrack
DB_USERNAME=postgres
DB_PASSWORD=tu_password

SANCTUM_STATEFUL_DOMAINS=localhost:3000,127.0.0.1:3000
SESSION_DOMAIN=localhost
```

5. **Generar clave de aplicación:**
```bash
php artisan key:generate
```

6. **Ejecutar migraciones:**
```bash
php artisan migrate
```

7. **Poblar base de datos con datos de prueba:**
```bash
php artisan db:seed --class=PersonSeeder
```

8. **Iniciar servidor de desarrollo:**
```bash
php artisan serve
```

**Backend disponible en:** http://localhost:8000

## 🎨 Configuración del Frontend (Next.js)

1. **Navegar a la carpeta frontend:**
```bash
cd frontend
```

2. **Instalar dependencias:**
```bash
npm install
# o
yarn install
```

3. **Configurar variables de entorno (`.env.local`):**
```env
NEXT_PUBLIC_API_URL=http://localhost:8000/api
NEXT_PUBLIC_APP_URL=http://localhost:3000
```

4. **Iniciar servidor de desarrollo:**
```bash
npm run dev
# o
yarn dev
```

**Frontend disponible en:** http://localhost:3000

## 🗄️ Estructura de Base de Datos

### Tablas principales:

#### `users` - Usuarios del sistema
```sql
id, name, email, password, created_at, updated_at
```

#### `persons` - Información personal de individuos
```sql
id, cedula, nombre, apellidos, fecha_nacimiento, lugar_nacimiento, created_at, updated_at
```

#### `birth_certificates` - Datos de certificados de nacimiento
```sql
id, person_id, numero_certificado, fecha_expedicion, registrador, created_at, updated_at
```

### Relaciones:
- `persons` → `birth_certificates` (1:N)
- `users` → `birth_certificates` (1:N) [quien generó]

## 🔗 API Endpoints

### Autenticación
```http
POST   /api/login                   # Iniciar sesión
POST   /api/register               # Registrar usuario
POST   /api/logout                 # Cerrar sesión
```

### Certificados
```http
GET    /api/certificate/{cedula}     # Buscar por cédula
POST   /api/certificate             # Generar nuevo certificado
GET    /api/certificates             # Listar todos
PUT    /api/certificate/{id}        # Actualizar certificado
DELETE /api/certificate/{id}        # Eliminar certificado
```

### Personas
```http
GET    /api/persons                 # Listar personas
POST   /api/persons                 # Crear persona
GET    /api/person/{cedula}         # Buscar persona por cédula
PUT    /api/person/{id}             # Actualizar persona
DELETE /api/person/{id}             # Eliminar persona
```

### Respuesta exitosa de búsqueda:
```json
{
  "status": "success",
  "data": {
    "person": {
      "id": 1,
      "cedula": "8-123-4567",
      "nombre": "Juan Carlos",
      "apellidos": "Pérez González",
      "fecha_nacimiento": "1990-01-15",
      "lugar_nacimiento": "David, Chiriquí"
    },
    "certificate": {
      "id": 1,
      "person_id": 1,
      "numero_certificado": "CN-001-2024",
      "fecha_expedicion": "2024-08-26",
      "registrador": "Tribunal Electoral"
    }
  }
}
```

## 📱 Funcionalidades

### Para Usuarios:
- 📄 Visualización de certificados
- 🖨️ Impresión en PDF
- 📱 Interfaz responsive
- 🔐 Sistema de login/registro

### Para Administradores:
- 👥 Gestión de personas
- 📋 Gestión de certificados
- 🔐 Control de acceso
- 👤 Gestión de usuarios

## 📝 Roadmap

### ✅ Fase 1 - Base del Sistema
- ✅ Configuración inicial del proyecto
- ✅ Conexión Laravel + PostgreSQL
- ✅ Estructura de base de datos
- ✅ Sistema de autenticación
- ✅ Frontend con Next.js + TypeScript

### 🔄 Fase 2 - Funcionalidades Core
- 🔄 API de búsqueda por cédula
- 🔄 Navegación entre formularios login/register
- 🔄 Dashboard administrativo
- 🔄 Gestión CRUD completa

### 📋 Fase 3 - Características Avanzadas
- 📄 Generación de PDF para certificados
- 🎨 Diseño UI/UX mejorado
- 📊 Analytics y reportes
- 🔔 Sistema de notificaciones

### 🚀 Fase 4 - Optimizaciones
- 📈 Optimización de rendimiento
- 🔍 Búsqueda avanzada con filtros
- 📱 Mejoras responsive
- 🌐 Integración con APIs externas

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -m '✨ Añadir nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📋 Scripts Disponibles

### Backend (Laravel):
```bash
php artisan serve          # Servidor desarrollo
php artisan migrate        # Ejecutar migraciones
php artisan db:seed        # Poblar base de datos
php artisan make:controller # Crear controlador
php artisan route:list     # Ver todas las rutas
php artisan tinker         # Consola interactiva
```

### Frontend (Next.js):
```bash
npm run dev               # Servidor desarrollo
npm run build             # Build para producción
npm run start             # Servidor producción
npm run lint              # Linter
npm run type-check        # Verificar tipos TypeScript
```

## 🛠️ Comandos Útiles

### Base de Datos:
```sql
-- Ver todos los usuarios registrados
SELECT * FROM users;

-- Ver todas las personas
SELECT * FROM persons;

-- Ver certificados con información de persona
SELECT p.cedula, p.nombre, p.apellidos, c.numero_certificado 
FROM persons p 
JOIN birth_certificates c ON p.id = c.person_id;
```

### Laravel Artisan:
```bash
php artisan migrate:fresh --seed  # Reiniciar BD con datos
php artisan make:model Person     # Crear modelo
php artisan make:migration create_table_name # Crear migración
```

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver archivo LICENSE para más detalles.

## 👨‍💻 Desarrollador

**Angel010724**
- GitHub: [@Angel010724](https://github.com/Angel010724)
- Proyecto: DocuTrack

## 📞 Soporte

Si encuentras algún problema o tienes sugerencias:
- 🐛 [Reportar Bug](https://github.com/Angel010724/Proyecto-Docutrack/issues)
- 💡 [Solicitar Feature](https://github.com/Angel010724/Proyecto-Docutrack/issues)
- 📧 Contacto directo via GitHub

## 🏆 Estado del Proyecto

![Laravel](https://img.shields.io/badge/Laravel-11.x-red)
![Next.js](https://img.shields.io/badge/Next.js-14.x-black)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-17-blue)
![TypeScript](https://img.shields.io/badge/TypeScript-5.x-blue)
![Status](https://img.shields.io/badge/Status-En%20Desarrollo-yellow)

---

⭐ **¡Si este proyecto te es útil, considera darle una estrella en GitHub!**
