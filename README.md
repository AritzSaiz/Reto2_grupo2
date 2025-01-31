# Gestión de Mantenimiento por Ordenador (GMAO)

---

## Introducción
Este proyecto consiste en el desarrollo de una aplicación web para la gestión de incidencias y mantenimiento de los equipos del Departamento de Mekatrónica de Egibide. La aplicación tiene como objetivo optimizar y modernizar el flujo de trabajo, sustituyendo el sistema tradicional basado en cuadernos y llamadas telefónicas.

---

## Características principales
- 🛠️ **Creación de incidencias**: Todos los usuarios (operarios) pueden reportar incidencias sobre las máquinas que usan.
- 🗂️ **Gestión de incidencias**: Asignación de incidencias a técnicos disponibles, seguimiento del estado y resolución.
- 🔄 **Mantenimientos preventivos**: Registro y programación periódica de mantenimientos preventivos.
- 👤 **Gestión de usuarios**: Creación y administración de usuarios (docentes, alumnado, técnicos y administradores, todos considerados operarios).
- 📉 **Reducción de carga administrativa**: Automatización de procesos para facilitar el trabajo del responsable de taller.

---

## Funcionalidades principales

- **Reporte de incidencias**: Los operarios deben poder reportar incidencias de forma sencilla a través de la aplicación.
- **Sistema de asignación manual**: Permite a los técnicos elegir las incidencias que desean resolver.
- **Gestión del estado de las incidencias**: Las incidencias deben poder gestionarse en estados como "abiertas" y "resueltas".
- **Registro del histórico de incidencias**: Cada incidencia debe contar con un historial detallado, que incluya:
  - Fecha y hora de reporte.
  - Listado de técnicos que participaron en la resolución de la incidencia.
  - Tiempos asociados a cada etapa en la que ha participado cada técnico.
- **Creación y gestión de mantenimientos preventivos periódicos**: Posibilidad de programar y administrar mantenimientos preventivos de manera periódica.
- **Panel de administración**: Herramienta centralizada para gestionar usuarios (operarios, técnicos y técnicos-administradores), incidencias, mantenimientos preventivos, máquinas, secciones, campus, entre otros.

---

## Posibles innovaciones

*(La primera implementación, a pesar de estar completamente desarrollada en código, no pudo ser ejecutada debido a la incompatibilidad de un paquete que, tras diversas investigaciones, no logramos instalar. En cuanto a la segunda propuesta, no se llegó a materializar en código, quedando únicamente en fase de conceptualización.)*

- **Descarga de un archivo Excel con registros**: Implementación de la funcionalidad para la descarga de un archivo Excel que contenga los datos y registros de algunas tablas de la base de datos. Este archivo incluirá información consolidada obtenida a partir de consultas con múltiples `SELECT` de varias tablas, permitiendo así una visión más completa y detallada de los datos almacenados.
- **Creación de una línea temporal por cada incidencia**: Desarrollo de una visualización esquemática o en formato de diagrama para representar el historial de una incidencia. Este diagrama mostrará la evolución de la incidencia a lo largo del tiempo, organizándola en distintas fases con los técnicos implicados, lo que facilitará su análisis y comprensión.

---

## Estructura del proyecto

- 📂 **`laravel_reto2`**: Proyecto backend desarrollado con Laravel, encargado de gestionar la lógica del negocio, la base de datos y la API para la comunicación con el frontend.
- 🎨 **`vue_reto2`**: Proyecto frontend desarrollado con Vue.js, encargado de la interfaz de usuario y la interacción con la API proporcionada por Laravel.

/Reto2_grupo2

│── laravel_reto2/        # Backend - API en Laravel  
│   ├── app/              # Código fuente de Laravel (modelos, controladores, middleware, etc.)  
│   ├── bootstrap/        # Configuración de arranque del framework  
│   ├── config/           # Archivos de configuración del sistema  
│   ├── database/         # Migraciones y seeders de la base de datos  
│   ├── public/           # Archivos accesibles públicamente (index.php, imágenes, etc.)  
│   ├── resources/        # Vistas, archivos de idioma y assets  
│   ├── routes/           # Definición de rutas de la API y web  
│   ├── storage/          # Archivos generados por Laravel (logs, caché, etc.)  
│   ├── tests/            # Pruebas automatizadas  
│   ├── .env              # Variables de entorno del proyecto  
│   └── composer.json     # Dependencias del proyecto Laravel  
│  
│── vue_reto2/            # Frontend - Aplicación en Vue.js  
│   ├── src/              # Código fuente de la aplicación Vue  
│   │   ├── assets/       # Recursos estáticos como imágenes y estilos  
│   │   ├── components/   # Componentes reutilizables de Vue  
│   │   ├── router/       # Configuración de rutas de Vue  
│   │   ├── store/        # Gestión del estado con Vuex o Pinia (si aplica)  
│   │   ├── views/        # Vistas principales de la aplicación  
│   │   ├── App.vue       # Componente raíz de la aplicación  
│   │   └── main.js       # Punto de entrada de la aplicación Vue  
│   ├── public/           # Archivos públicos (index.html, favicon, etc.)  
│   ├── .env              # Variables de entorno para Vue  
│   ├── package.json      # Dependencias del proyecto Vue  
│   ├── vite.config.js    # Configuración de Vite (compilador)  
│   └── README.md         # Documentación del proyecto frontend  
│  
└── README.md             # Documentación principal del repositorio

### 📖 Documentación
- 📌 `README.md` en la raíz del repositorio contiene la documentación general del proyecto.
- 📌 Cada subproyecto (`laravel_reto2` y `vue_reto2`) tiene su propio `README.md` con detalles específicos para su instalación y configuración.

---

## Tecnologías utilizadas

- 🌐 **Frontend**: Vue y Laravel, desarrollados con Visual Studio Code y PhpStorm.
- ⚙️ **Backend**: Laravel, desarrollados con Visual Studio Code y PhpStorm.
- 🗄️ **Base de datos**: MySQL
- 🎨 **Estilo y diseño**: Bootstrap CSS
- 🧪 **Pruebas**: LocalHost
- 🚀 **Despliegue**: LocalHost (a falta de conocimientos para poder desplegar con OpenNebula)

---

## Instalación y configuración

Sigue los pasos detallados a continuación para configurar y ejecutar nuestra aplicación en tu entorno local:

### 1. Clonar el Repositorio

1. Abre una terminal y navega a la carpeta donde deseas clonar el repositorio.
2. Crea una carpeta llamada `Reto` dentro de `htdocs`:
- `cd C:\xampp\htdocs`
- `mkdir Reto`
- `cd Reto`
3. Clona el repositorio:
- `git clone https://github.com/AritzSaiz/Reto2_grupo2.git`

### 2. Configurar Apache y MySQL con XAMPP

1. Abre **XAMPP**.
2. Inicia los servicios de **Apache** y **MySQL** desde el panel de control de XAMPP.

### 3. Configurar Laravel y Vue

#### Laravel
1. Navega a la carpeta de Laravel (`laravel_reto2`) desde una consola:
- `cd laravel_reto2`
2. Instala las dependencias necesarias:
- `composer install`
3. Inicia el servidor de desarrollo:
- `php artisan serve`
4. Si es necesario, copia el archivo de configuración `.env` y configúralo:
- `cp .env.example .env`
- Abre el archivo `.env` en un editor de texto y modifica los datos necesarios (como el número de puerto).

#### Vue
1. Navega a la carpeta de Vue (`vue_reto2`) desde otra consola:
- `cd vue_reto2`
2. Instala las dependencias necesarias:
- `npm install`
3. Inicia el servidor de desarrollo:
- `npm run dev`

### 4. Configurar la Base de Datos

1. En **PhpStorm**, crea una nueva **Data Source**:
- Ve a la parte superior derecha de la pestaña "Database".
- Configura la conexión con tu base de datos.

2. Ejecuta las migraciones desde la carpeta de Laravel:
- `php artisan migrate`

3. Si aparece un error de clave de cifrado en la ventana que se ha creado mediante el comando `php artisan serve` anterior, genera una nueva:
- `php artisan key:generate`

4. Si aparece un error de clave de implementación de JWT (secret) en la ventana que se ha creado mediante el comando `php artisan serve` anterior, hay que ejecutar:
- `php artisan jwt:secret`

5. Población de datos iniciales:
- `php artisan db:seed`

Con esto, la aplicación estará lista para usarse. Si tienes algún problema, revisa las configuraciones o consulta la documentación adicional.

---

## Uso

- **Operarios**: Reportan incidencias a través de un formulario en la aplicación. Además, solo podrán ver las incidencias que ellos mismos han reportado.
- **Docentes/Alumnado**: Mismos permisos básicos que todos los operarios; es decir, creación y visualización de las incidencias propias.
- **Técnicos**: Mismos permisos básicos que todos los operarios, además, pueden visualizar todas las incidencias existentes y seleccionar aquellas que desean solucionar.
- **Administrador**: Mismos permisos que los técnicos, además de poder gestionar usuarios, incidencias derivadas de mantenimientos, máquinas, secciones y demás.

---

## Autores

- 👨‍💻 [@Aritz Saiz González](https://github.com/AritzSaiz)
- 👨‍💻 [@Julen Corpas Domínguez](https://github.com/JulenCorpas2004)
- 👩‍💻 [@Lorena Arbé Sánchez](https://github.com/Lorena-Arbe-Sanchez)

---

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

---

> 🚀 **¡Gracias por usar nuestra aplicación!**  
> 💡 *Si tienes preguntas o sugerencias, no dudes en contactarnos.*