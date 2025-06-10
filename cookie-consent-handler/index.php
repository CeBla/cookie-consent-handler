<?php
// Inicia la sesión PHP.
// Es crucial para el manejo de sesiones, aunque no directamente usado en la lógica de cookies aquí,
// es una buena práctica si tu sitio usa sesiones.
session_start();

// Incluye el archivo que define la función sbwscf_get_cookie_scripts().
// Asegúrate de que la ruta sea correcta desde la raíz de tu proyecto.
require_once __DIR__ . '/assets/cookie/cookie-scripts.php';

// Obtiene la configuración de los scripts de cookies.
// Esta función debe devolver un array con los scripts y sus propiedades (nombre, descripción).
$cookie_scripts = sbwscf_get_cookie_scripts();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manejador de Cookies y Consentimiento</title>

	<link href="assets/cookie/cookies.css" rel="stylesheet">

	<script src="assets/cookie/cookies.js"></script>

	<style>
	body {
		font-family: Arial, sans-serif;
		line-height: 1.6;
		margin: 20px;
		padding-bottom: 100px;
		/* Para dejar espacio al botón flotante */
	}

	h1 {
		color: #333;
	}

	p {
		color: #666;
	}

	.main-content {
		max-width: 800px;
		margin: 0 auto;
		padding: 20px;
		border: 1px solid #ddd;
		border-radius: 8px;
		background-color: #fff;
	}
	</style>
</head>

<body>
	<div class="main-content">
		<h1>Bienvenido a Nuestro Sitio Web</h1>
		<p>Este es el contenido principal de tu página. Aquí puedes colocar toda la información, imágenes y secciones que desees que los usuarios vean.</p>
		<p>Nuestro objetivo es proporcionarte la mejor experiencia posible, y parte de eso incluye la gestión de tu privacidad.</p>
		<p>Explora nuestras secciones y descubre todo lo que tenemos para ofrecerte. Si tienes alguna pregunta sobre las cookies o tu privacidad, puedes gestionarlo fácilmente a través del botón de "Configurar Cookies" que verás en la parte inferior de la pantalla.</p>
		<p>¡Gracias por visitarnos!</p>
	</div>

	<div id="smile-cookies-panel" class="smile-cookies-panel" role="dialog" aria-live="polite">
		<div class="smile-cookies-box">
			<div class="smile-cookies-header">
				<strong class="smile-cookies-title">Configuración de Cookies</strong>
			</div>
			<div class="smile-cookies-message">
				Para ofrecerte una mejor experiencia, utilizamos cookies propias y de terceros. Puedes aceptar todas las cookies o configurarlas según tus preferencias.
			</div>

			<div id="sbwscf-cookie-categories" class="sbwscf-cookie-categories">
				<strong class="smile-cookies-title">Preferencias</strong>

				<details class="sbwscf-cookie-category" open>
					<summary class="sbwscf-cookie-summary">
						<span class="sbwscf-cookie-title">Funcional</span>
						<span class="sbwscf-cookie-checkbox">
							<input type="checkbox" checked disabled aria-disabled="true">
							<label>Siempre activo</label>
						</span>
					</summary>
					<div class="sbwscf-cookie-description">
						Estas cookies son necesarias para el funcionamiento del sitio web y no pueden ser desactivadas en nuestros sistemas. Por lo general, solo se configuran en respuesta a acciones realizadas por ti, como establecer tus preferencias de privacidad, iniciar sesión o completar formularios.
					</div>
				</details>

				<?php foreach ( $cookie_scripts as $i => $script ) : ?>
				<details class="sbwscf-cookie-category">
					<summary class="sbwscf-cookie-summary">
						<span class="sbwscf-cookie-title"><?php echo htmlspecialchars( $script['name'] ); ?></span>
						<span class="sbwscf-cookie-checkbox">
							<input type="checkbox" data-name="<?php echo htmlspecialchars( $script['name'] ); ?>" id="sbwscf-optin-<?php echo $i; ?>">
							<label for="sbwscf-optin-<?php echo $i; ?>">Aceptar</label>
						</span>
					</summary>
					<div class="sbwscf-cookie-description">
						<?php echo htmlspecialchars( $script['description'] ); ?>
					</div>
				</details>
				<?php endforeach; ?>

			</div>

			<div class="smile-cookies-buttons">
				<button class="smile-cookies-preferences">Preferencias</button>
				<button class="smile-cookies-deny">Denegar</button>
				<button class="smile-cookies-accept">Aceptar</button>
			</div>
		</div>
	</div>

	<div id="sbwscf-manage-consent-container" class="sbwscf-manage-consent-container sbwscf-position-center" style="display:none;">
		<button id="sbwscf-manage-consent-btn" class="sbwscf-manage-consent-button">Configurar Cookies</button>
	</div><br>
	<footer class="footer-attribution">
		Desarrollado por <a href="https://cesarbla.com/" target="_blank" rel="noopener noreferrer">César Bla</a>.
		Conecta conmigo en
		<a href="https://www.linkedin.com/in/cesarbla/" target="_blank" rel="noopener noreferrer">LinkedIn</a> o
		<a href="https://www.instagram.com/cesarbla/" target="_blank" rel="noopener noreferrer">Instagram</a>.
	</footer>

</body>

</html>