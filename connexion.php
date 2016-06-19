<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=autoecole', 'root', '');
if(isset($_POST['submit']))
{	
	$idcandidat = htmlspecialchars($_POST['idcandidat']);
	$mdp = htmlspecialchars($_POST['mdp']);
	if(!empty($_POST['idcandidat'] AND !EMPTY($_POST['mdp'])))
	{

		$requser = $bdd->prepare("SELECT * FROM candidat WHERE idcandidat = ? AND mdp = ?");
		$requser->execute(array($idcandidat, $mdp));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['idcandidat'] = $userinfo[0];
			
			header("Location: planning.php?id=".$_SESSION['idcandidat']);
			
		}	
		else
		{
			echo "mauvais identifiant ou mauvais mot de passe";
		}	
	}	
	else
	{
		echo "Completer tous les champs";
	}
}	
?>
<html>
<head>
<meta charset = "utf-8"/>
<title>Castellane Auto-Ecole</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<header>Castellane Auto</header>
<div id="main"> 
  <ul class="topnav" id="topnav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="inscription.php">Inscription</a></li>
    <li><a href="connexion.php">Connexion</a></li>
  </ul>
  <br>
<p>Si vous avez déjà un compte:</p>
<br>
<div id="formulaire">
<Form method ="post" action="connexion.php">
	Votre Identifiant : <input type="text" name="idcandidat"><br/>
	Mot de passe : <input type="password" name="mdp"><br><br/>
	<input type="submit" name="submit" value="se connecter"><br/>
</form>
</div>
</body>
</html>