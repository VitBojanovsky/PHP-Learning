<?php
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];
if ($method === 'POST') {
	if ($name === '') {
		$errors[] = 'Name is required.';
	}

	if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'A valid email is required.';
	}

	if ($message === '') {
		$errors[] = 'Message cannot be empty.';
	}
}

$submitted = $method === 'POST' && count($errors) === 0;
?>

<?php

$viewPath = __DIR__ . DIRECTORY_SEPARATOR . 'response.view.php';
if (file_exists($viewPath)) {
    include $viewPath;
} else {
    echo 'Response view not found.';
}
?>
