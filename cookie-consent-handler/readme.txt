Cookie consent handler
https://github.com/CeBla/cookie-consent-handler


Resumen de Funcionalidades Clave y Puntos de Interés
Este manejador de consentimiento de cookies y scripts de seguimiento es una solución ligera y configurable para integrar la gestión de la privacidad directamente en sitios web HTML/PHP. A diferencia de las soluciones basadas en plugins, ofrece a los desarrolladores un control granular y mayor flexibilidad.
________________


Control Total sobre el Consentimiento
* Panel de Preferencias en la Primera Visita: Los usuarios verán un panel de consentimiento intuitivo con opciones claras la primera vez que visiten el sitio, asegurando el cumplimiento desde el inicio.
* Gestión Persistente: El consentimiento se guarda en el localStorage, lo que significa que las preferencias del usuario se recuerdan en visitas futuras.
* Reconfiguración Fácil: Un botón flotante minimizado permite a los usuarios reabrir el panel completo en cualquier momento para revisar o cambiar sus preferencias.
________________


Flexibilidad para Desarrolladores
* Categorización Dinámica de Scripts: Define y organiza fácilmente diferentes tipos de scripts (analíticas, marketing, etc.) a través de un archivo PHP (cookie-scripts.php).
* Inyección Condicional de Scripts: El sistema carga y elimina scripts de seguimiento solo si el usuario ha dado su consentimiento, garantizando la privacidad y optimizando el rendimiento.
* Sin Dependencias de Plugins: Ideal para proyectos que buscan evitar el "bloat" de plugins o que requieren una solución más personalizada y de bajo nivel.
* Integración Directa: Diseñado para una integración sencilla en flujos de trabajo de desarrollo HTML y PHP, sin complejidad adicional.
________________


Experiencia de Usuario Transparente
* Controles Claros: Botones dedicados para "Aceptar", "Denegar" y "Preferencias" hacen que la gestión del consentimiento sea clara y accesible.
* Descripción Detallada: Cada categoría de cookie incluye una descripción para que los usuarios entiendan qué tipo de datos se recopilan y con qué fin.
* Siempre Activo para Funcionalidad Esencial: Las cookies funcionales se mantienen activas por defecto, garantizando que el sitio web funcione correctamente sin requerir consentimiento explícito para lo esencial.
________________


Ideal para Proyectos a Medida
Si buscas una solución de consentimiento que te dé control total, sea eficiente y se integre sin problemas en tu stack HTML/PHP, este manejador es perfecto. Es una alternativa robusta a las soluciones preconstruidas, permitiéndote adaptar la gestión de consentimiento a las necesidades específicas de tu proyecto.






├── index.php
└── assets/
    └── cookie/
        ├── cookie-scripts.php  (contiene la función sbwscf_get_cookie_scripts())
        ├── get-consent-scripts.php
        ├── cookies.css
        └── cookies.js