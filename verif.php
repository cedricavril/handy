<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LCLSPACEMAN</title>
</head>

<body>

<?php 
/*erreur warnning sur les header "Cannot modify header information - headers already sent by" : mettre le codephp avant toute fonction */
//$users_id=$_POST['p0'];
//$pass=$_POST['pwd'];
echo "test";

session_start();

	ini_set('display_errors', 1);
    $db = (($_SERVER['REMOTE_ADDR'] == '127.0.0.1') || ($_SERVER['REMOTE_ADDR'] == "::1")) ? new \PDO('mysql:host=localhost;dbname=bptfi2143330_1szoph;charset=UTF8', 'root', '') : new \PDO('mysql:host=localhost;dbname=bptfi2143330_1szoph', 'bptfi2143330', 'France24@@');

    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $db->exec("SET CHARACTER SET utf8");

	// Vérification de conflit de dates, et suppression des vieilles prédictions le cas échéant.
	$requete = $db->prepare("SELECT iduser FROM INFO_CLIENT ") or die ("plantage 1");
	$requete->execute();

	while($row=$requete->fetch(PDO::FETCH_OBJ)) {
var_dump($row);	}



die();













if(!empty($_POST) && !empty($_POST['leuser']) && !empty($_POST['lepas'])){
    
			
	require 'connection.php';
			
	
    $req = $db->prepare('SELECT * FROM tbl_user WHERE (user_id = :username) ');
    $req->execute(['username' => $_POST['leuser']]);
    $user = $req->fetch();
    if($user == null){
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
		header ('Location: y1qError.html');
		
    }elseif($_POST['lepas']==$user["password"]){
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
		
		
				$_SESSION['username'] = $user["username"];
				$_SESSION['Soldey'] = $user["Soldey"];
				$_SESSION['idcli'] = $user["user_id"];
				
			
				
		header ('Location: cork/html/vertical-dark-menu/index2.php');
		
        
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
		header ('Location: y1qError.html');
		
    }
}






?>

</body>
</html>