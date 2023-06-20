<?php 
    ini_set('display_errors', 1);
    $db = (($_SERVER['REMOTE_ADDR'] == '127.0.0.1') || ($_SERVER['REMOTE_ADDR'] == "::1")) ? new \PDO('mysql:host=localhost;dbname=assurmf;charset=utf8', 'root', '') : new \PDO('mysql:host=mk134330-001.privatesql;dbname=mkkhali;port=35322', 'mk134330-ovh', '21051978Kali');

    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $db->exec("SET NAMES utf8");

?>