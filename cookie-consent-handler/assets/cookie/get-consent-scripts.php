<?php
require_once __DIR__ . '/cookie-scripts.php';

header('Content-Type: application/json');

if (!isset($_GET['name'])) {
	echo json_encode(['error' => 'No cookie name provided.']);
	exit;
}

$name = $_GET['name'];
$all  = sbwscf_get_cookie_scripts();

foreach ($all as $script) {
	if ($script['name'] === $name) {
		echo json_encode(['code' => $script['code']]);
		exit;
	}
}

echo json_encode(['error' => 'Script not found.']);