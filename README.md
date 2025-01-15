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
- **Panel de administración**: Herramienta centralizada para gestionar usuarios, incidencias, máquinas, secciones, entre otros.

---

## Posibles innovaciones

- **Columna "imagen" en la tabla "incidencia"**: Añadir una columna para permitir adjuntar imágenes junto con la descripción de la incidencia. Esto facilitaría la comprensión y resolución de las incidencias, ya que las imágenes pueden proporcionar un contexto visual útil para los técnicos y operarios.

---

## Estructura del proyecto

*(falta por hacer)*

---

## Tecnologías utilizadas

- 🌐 **Frontend**: Vue y Laravel, desarrollados con Visual Studio Code y PhpStorm.
- ⚙️ **Backend**: Vue y Laravel, desarrollados con Visual Studio Code y PhpStorm.
- 🗄️ **Base de datos**: MySQL
- 🎨 **Estilo y diseño**: Bootstrap CSS
- 🧪 **Pruebas**: LocalHost
- 🚀 **Despliegue**: OpenNebula

---

## Instalación y configuración

*(falta por hacer)*

---

## Uso

- **Operarios**: Reportan incidencias a través de un formulario en la aplicación. Además, solo podrán ver las incidencias que ellos mismos han reportado.
- **Docentes/Alumnado**: Mismos permisos básicos que todos los operarios; es decir, creación y visualización parcial de las incidencias.
- **Técnicos**: Mismos permisos básicos que todos los operarios, además, pueden visualizar todas las incidencias existentes y seleccionar aquellas que desean solucionar.
- **Administrador**: Mismos permisos que los técnicos, además de poder gestionar usuarios, incidencias, máquinas, secciones y demás.

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