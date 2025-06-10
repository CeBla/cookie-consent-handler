<?php
/**
 * Devuelve todos los scripts de cookies configurados.
 *
 * @return array
 */
function sbwscf_get_cookie_scripts() {
	return [
		[
			'name'        => 'Google Tag Manager',
			'description' => 'Se utiliza para gestionar etiquetas de seguimiento y análisis.',
			'code'        => "<!-- Google tag (gtag.js) --><script async src='https://www.googletagmanager.com/gtag/js?id=AW-16698709227'></script><script>window.dataLayer = window.dataLayer || [];function gtag() { dataLayer.push(arguments) } gtag('js', new Date()); gtag('config', 'AW-16698709227'); </script>"
		]
		/* ,[
			'name'        => 'Google Analytics',
			'description' => 'Se utiliza para recopilar datos de uso del sitio web.',
			'code'        => "<!-- Google Analytics --><script async src='https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-X'></script><script>window.dataLayer = window.dataLayer || [];function gtag() { dataLayer.push(arguments) } gtag('js', new Date()); gtag('config', 'UA-XXXXXXXXX-X');</script>"
		] */
	];
}