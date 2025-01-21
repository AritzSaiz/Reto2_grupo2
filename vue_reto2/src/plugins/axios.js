// Importar Axios, una biblioteca para realizar solicitudes HTTP.
import axios from 'axios';

// Crear una instancia de Axios con una configuración personalizada.
const api = axios.create({
    // Definir la URL base para las solicitudes API (para que todas las rutas sean relativas a esta base).
    baseURL: 'http://localhost:8000/api',
    // Establecer los encabezados predeterminados para las solicitudes HTTP (los datos enviados serán de tipo JSON).
    headers: {
        'Content-Type': 'application/json',
    },
});

// Exportar la instancia de Axios para que pueda ser utilizada en otros archivos.
export default api;