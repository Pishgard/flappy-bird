<?php

header('Content-Type: application/json');

if (empty($_GET['score']) || !ctype_digit($_GET['score'])) {
	echo json_encode(['ok' => false]);
	die;
}

session_start();

if (!isset($_SESSION['score'])) {
	$_SESSION['score'] = 0;
}
if ($_GET['score'] > $_SESSION['score'] + 1) {
	echo json_encode(['ok' => false]);
	die;
}

$_SESSION['score'] = $_GET['score'];
$response = ['ok' => true];
if ($_GET['score'] == 1) {
	$response['message'] = 'Keep going!';
} elseif ($_GET['score'] == 1000) {
	$response['message'] = 'ShafieeDiscovery{MIGraTInG_THE_FlaPPY_BIRD}';
}
echo json_encode($response);
