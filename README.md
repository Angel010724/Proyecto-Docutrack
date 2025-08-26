# 📋 DocuTrack - Sistema de Certificados de Nacimiento

Sistema web full-stack desarrollado para la gestión e impresión de certificados de nacimiento con búsqueda por cédula de identidad.

## 🚀 Características

- ✅ **Búsqueda inteligente** por número de cédula
- ✅ **Generación automática** de certificados de nacimiento
- ✅ **Interfaz moderna** y responsiva
- ✅ **API REST** robusta para consultas
- ✅ **Base de datos optimizada** con PostgreSQL
- ✅ **Sistema de autenticación** seguro
- ✅ **Impresión de certificados** en formato PDF
- ✅ **Dashboard administrativo** para gestión

## 🛠️ Stack Tecnológico

### Backend
- **Framework:** Laravel 11.x
- **Base de Datos:** PostgreSQL 17
- **Servidor Web:** Apache (XAMPP)
- **Esquemas BD:** Laravel Blueprint
- **API:** RESTful con Laravel Sanctum

### Frontend
- **Framework:** Next.js 14.x
- **Styling:** Tailwind CSS
- **UI Components:** React Components
- **Estado:** React Hooks / Context API
- **HTTP Client:** Axios / Fetch API

### Herramientas de Desarrollo
- **Control de Versiones:** Git & GitHub
- **IDE:** Visual Studio Code
- **Base de Datos GUI:** pgAdmin 4
- **API Testing:** Postman / Thunder Client

## 📦 Instalación

### Prerrequisitos

- **PHP** >= 8.2
- **Composer** (Gestor de dependencias PHP)
- **Node.js** >= 18.x y npm/yarn
- **PostgreSQL** 17
- **Apache** (XAMPP recomendado)
- **Git**

### 🔧 Configuración del Backend (Laravel)

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
   
   Editar `.env` con tus configuraciones:
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

4. **Generar clave de aplicación:**
   ```bash
   php artisan key:generate
   ```

5. **Ejecutar migraciones:**
   ```bash
   php artisan migrate
   ```

6. **Poblar base de datos con datos de prueba:**
   ```bash
   php artisan db:seed --class=PersonSeeder
   ```

7. **Iniciar servidor de desarrollo:**
   ```bash
   php artisan serve
   ```
   Backend disponible en: `http://localhost:8000`

### 🎨 Configuración del Frontend (Next.js)

1. **Navegar a la carpeta frontend:**
   ```bash
   cd frontend
   # o crear proyecto Next.js si no existe
   npx create-next-app@latest frontend --typescript --tailwind --eslint
   ```

2. **Instalar dependencias:**
   ```bash
   npm install
   # o
   yarn install
   ```

3. **Configurar variables de entorno (.env.local):**
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
   Frontend disponible en: `http://localhost:3000`

## 🗄️ Estructura de Base de Datos

### Tablas principales:
- `persons` - Información personal de individuos
  - `id`, `cedula`, `nombre`, `apellidos`, `fecha_nacimiento`, `lugar_nacimiento`
- `birth_certificates` - Datos de certificados de nacimiento
  - `id`, `person_id`, `numero_certificado`, `fecha_expedicion`, `registrador`
- `users` - Usuarios del sistema administrativo
- `migrations` - Control de versiones de BD

### Relaciones:
- `persons` → `birth_certificates` (1:N)
- `users` → `birth_certificates` (1:N) [quien generó]

## 🔗 API Endpoints

### Certificados
```bash
GET    /api/certificate/{cedula}     # Buscar por cédula
POST   /api/certificate             # Generar nuevo certificado
GET    /api/certificates             # Listar todos
PUT    /api/certificate/{id}        # Actualizar certificado
DELETE /api/certificate/{id}        # Eliminar certificado
```

### Personas
```bash
GET    /api/persons                 # Listar personas
POST   /api/persons                 # Crear persona
GET    /api/person/{cedula}         # Buscar persona por cédula
PUT    /api/person/{id}             # Actualizar persona
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

## 🚀 Despliegue en Producción

### Render.com (Recomendado)

#### Backend (Laravel):
1. **Crear Web Service en Render**
2. **Build Command:** `composer install --optimize-autoloader --no-dev`
3. **Start Command:** `php artisan serve --host=0.0.0.0 --port=$PORT`

#### Frontend (Next.js):
1. **Crear Static Site en Render**
2. **Build Command:** `npm run build`
3. **Publish Directory:** `out` o `dist`

#### Base de Datos:
1. **Crear PostgreSQL service en Render**
2. **Configurar variables de entorno en producción**

### Variables de entorno para producción:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-app.onrender.com

DB_CONNECTION=pgsql
DB_HOST=dpg-xxxxx-a.oregon-postgres.render.com
DB_PORT=5432
DB_DATABASE=render_db_name
DB_USERNAME=render_user
DB_PASSWORD=render_password
```

## 📱 Funcionalidades

### Para Usuarios:
- 🔍 Búsqueda rápida por cédula
- 📄 Visualización de certificados
- 🖨️ Impresión en PDF
- 📱 Interfaz responsive

### Para Administradores:
- 👥 Gestión de personas
- 📋 Gestión de certificados
- 📊 Dashboard con estadísticas
- 🔐 Control de acceso

## 📝 Roadmap

### Fase 1 (Actual)
- [x] ✅ Configuración inicial del proyecto
- [x] ✅ Conexión Laravel + PostgreSQL
- [x] ✅ Estructura de base de datos
- [ ] 🔄 API de búsqueda por cédula
- [ ] 🔄 Frontend con Next.js

### Fase 2
- [ ] 📄 Generación de PDF para certificados
- [ ] 🔐 Sistema de autenticación completo
- [ ] 📊 Dashboard administrativo
- [ ] 🎨 Diseño UI/UX mejorado

### Fase 3
- [ ] 📱 Aplicación móvil (React Native)
- [ ] 🔔 Sistema de notificaciones
- [ ] 📈 Analytics y reportes
- [ ] 🌐 Integración con APIs gubernamentales

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
```

### Frontend (Next.js):
```bash
npm run dev               # Servidor desarrollo
npm run build             # Build para producción
npm run start             # Servidor producción
npm run lint              # Linter
```

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver archivo `LICENSE` para más detalles.

## 👨‍💻 Desarrollador

**Angel010724**
- GitHub: [@Angel010724](https://github.com/Angel010724)
- Proyecto: [DocuTrack](https://github.com/Angel010724/Proyecto-Docutrack)

## 📞 Soporte

Si encuentras algún problema o tienes sugerencias:
- 🐛 [Reportar Bug](https://github.com/Angel010724/Proyecto-Docutrack/issues)
- 💡 [Solicitar Feature](https://github.com/Angel010724/Proyecto-Docutrack/issues)
- 📧 Contacto directo

## 🏆 Estado del Proyecto

![Status](https://img.shields.io/badge/Status-En%20Desarrollo-yellow)
![Laravel](https://img.shields.io/badge/Laravel-11.x-red)
![Next.js](https://img.shields.io/badge/Next.js-14.x-black)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-17-blue)

---

⭐ **¡Si este proyecto te es útil, considera darle una estrella en GitHub!**
