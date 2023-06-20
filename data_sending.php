<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message = '';
foreach ($_POST as $key => $value) {
	$message .= "$key => $value" . "\r\n";
}

$headers[] = 'Content-Type: text/plain; charset=utf-8' . '\r\n';

mail(
    "contact@bpt-finances.com", 
    "mail automatique depuis page " . $_POST['page_name'],
    $message,
    implode("\n", $headers),
);

$_SESSION['flash'] = 'Message envoyé avec succès';

header("Location: " . $_POST['url']);
die();
?>