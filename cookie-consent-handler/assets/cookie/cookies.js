document.addEventListener('DOMContentLoaded', function () {
	const panel = document.getElementById('smile-cookies-panel');
	const btnAccept = document.querySelector('.smile-cookies-accept');
	const btnDeny = document.querySelector('.smile-cookies-deny');
	const btnPreferences = document.querySelector('.smile-cookies-preferences');
	const btnManage = document.getElementById('sbwscf-manage-consent-btn');
	const manageContainer = document.getElementById('sbwscf-manage-consent-container');
	const categoriesBox = document.getElementById('sbwscf-cookie-categories');

	// Mostrar panel y categorías si no hay decisión guardada
	if (!localStorage.getItem('sbwscf_cookie_consent')) {
		panel.style.display = 'flex';
		categoriesBox.style.display = 'block';
	}

	// Mostrar panel desde el botón flotante
	if (btnManage) {
		btnManage.addEventListener('click', () => {
			panel.style.display = 'flex';
			categoriesBox.style.display = 'none';
			manageContainer.style.display = 'none';
		});
	}

	// Botón "Preferencias" muestra/oculta el bloque de categorías
	if (btnPreferences) {
		btnPreferences.addEventListener('click', function () {
			if (categoriesBox.style.display === 'none' || categoriesBox.style.display === '') {
				categoriesBox.style.display = 'block';
			} else {
				categoriesBox.style.display = 'none';
			}
		});
	}

	// ACEPTAR: guardar consentimiento y cargar scripts
	btnAccept.addEventListener('click', function () {
		const selected = getSelectedScripts();
		localStorage.setItem('sbwscf_cookie_consent', JSON.stringify(selected));
		injectScripts(selected);
		hidePanel();
	});

	// DENEGAR: eliminar consentimiento y scripts
	btnDeny.addEventListener('click', function () {
		localStorage.removeItem('sbwscf_cookie_consent');
		removeInjectedScripts();
		uncheckAllCookies();
		hidePanel();
	});

	// Si ya aceptó, inyectar scripts y ocultar categorías
	const saved = localStorage.getItem('sbwscf_cookie_consent');
	if (saved) {
		try {
			const selected = JSON.parse(saved);
			injectScripts(selected);
			panel.style.display = 'none';
			categoriesBox.style.display = 'none';
			manageContainer.style.display = 'block';
		} catch (e) {
			console.warn('Cookie consent data corrupted.');
		}
	}

	function getSelectedScripts() {
		const checkboxes = document.querySelectorAll('#sbwscf-cookie-categories input[type="checkbox"]:not(:disabled)');
		return Array.from(checkboxes)
			.filter(cb => cb.checked)
			.map(cb => cb.getAttribute('data-name'));
	}

	function injectScripts(names) {
		if (!names || !names.length) return;
		names.forEach(name => {
			if (!document.querySelector(`script[data-cookie="${name}"]`)) {
				fetch('assets/cookie/get-consent-scripts.php?name=' + encodeURIComponent(name))
					.then(response => response.json())
					.then(data => {
						if (data && data.code) {
							const container = document.createElement('div');
							container.innerHTML = data.code;

							container.querySelectorAll('script').forEach(scriptTag => {
								const newScript = document.createElement('script');
								if (scriptTag.src) {
									newScript.src = scriptTag.src;
									newScript.async = scriptTag.async;
								} else {
									newScript.textContent = scriptTag.textContent;
								}
								newScript.dataset.cookie = name;
								document.head.appendChild(newScript);
							});
						}
					})
					.catch(error => console.error('Error fetching script:', error));
			}
		});
	}

	function removeInjectedScripts() {
		document.querySelectorAll('script[data-cookie]').forEach(script => script.remove());
	}

	function uncheckAllCookies() {
		document.querySelectorAll('#sbwscf-cookie-categories input[type="checkbox"]:not(:disabled)').forEach(cb => {
			cb.checked = false;
		});
	}

	function hidePanel() {
		panel.style.display = 'none';
		categoriesBox.style.display = 'none';
		manageContainer.style.display = 'block';
	}
});
