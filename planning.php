<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=autoecole', 'root', 'root');

if (isset($_GET['id']))
{	
	$getid = $_GET['id'];
	$requete = $bdd->prepare('Select * from candidat where idcandidat=?');
	$requete->execute(array($getid));
	$userinfo = $requete->fetch();
	 
?>



<html>
<head>
	<meta charset = "utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<title> CASTELLANE </title> 
</head>

<body>
	<header>Castellane Auto</header>
<center>

<br><br><br><h1> Profil de <?php echo $userinfo[1]?> </h1>
<h3> Planning <h3>
<table>
<?php
	if(isset($_SESSION['idcandidat']) AND $userinfo[0] == $_SESSION['idcandidat'])
	{
		$req = $bdd->prepare("Select date_cours, etat, heure from planning");
		$req->execute(array('date','etat','heure'));
		$resultat = $req->fetchAll();
		print_r($resultat);
		
?>
</table>
	<a href="deconnexion.php">Se Déconnecter</a>
<?php
	}
?>
</center>
</html>
<?php
}
?>
