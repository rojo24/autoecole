<?php
	$bdd = new PDO('mysql:host=localhost;dbname=autoecole','root','');
?>
<?php

if (isset($_POST['Inscription']))
	{	
		
		$idcandidat = htmlspecialchars(trim($_POST['idcandidat']));
		$email = htmlspecialchars(trim($_POST['email']));
		$Nomcandidat = htmlspecialchars(trim($_POST['Nomcandidat']));
		$Prenomcandidat = htmlspecialchars(trim($_POST['Prenomcandidat']));
		$adresse = htmlspecialchars(trim($_POST['adresse']));
		$cp = htmlspecialchars(trim($_POST['cp']));
		$ville = htmlspecialchars(trim($_POST['ville']));
		$datenaiss = htmlspecialchars(trim($_POST['datenaiss']));
		$telephone = htmlspecialchars(trim($_POST['telephone']));
		$mdp = htmlspecialchars(trim($_POST['mdp']));
		$repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));
		$villeEntreprise = htmlspecialchars(trim($_POST['villeEntreprise']));
		$nomEntreprise = htmlspecialchars(trim($_POST['nomEntreprise']));
		
	
		if($idcandidat&&$email&&$Nomcandidat&&$Prenomcandidat&&$adresse&&
		$cp&&$ville&&$datenaiss&&$telephone&&$mdp&&$villeEntreprise&&$nomEntreprise)
		{
		
				if ($mdp == $repeatpassword)
				{
					$insertSalarie = $bdd->prepare ("insert into salarie(idcandidat,Nomcandidat,Prenomcandidat
					,email,cp,ville,adresse,datenaiss,telephone,mdp,Entreprise,ville_Entreprise) values(?,?,?,?,?,?,?,?,?,?,?,?)");
					$insertSalarie->execute(array($idcandidat, $Nomcandidat, $Prenomcandidat
					, $email, $cp, $ville, $adresse, $datenaiss, $telephone, $mdp, $nomEntreprise, $villeEntreprise));
					die("<br/>insertion reussie<a href='connexion.php'>me connecter</a>");
				}	
				else  echo "les mots de passes sont differents";
			
				
		
		}else echo "veuillez saisir tous les champs";
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
<p>Compte salarié:</p>  
<div id="formulaire">
<br>
	<form method="post" action="compte_salarie.php">
			<label>identifiant: <input type="text" name="idcandidat"/></label><br/>
			<label>email: <input type="text" name="email"/></label><br/>
			<label>Nom: <input type="text" name="Nomcandidat"/></label><br/>
			<label>Prénom: <input type="text" name="Prenomcandidat"/></label><br/>
			<label>Adresse: <input type="text" name="adresse"/></label><br/>
			<label>Code postal: <input type="text" name="cp"/></label><br/>
			<label>Ville: <input type="text" name="ville"/></label><br/>
			<label>Date de naissance: <input type="date" name="datenaiss"/></label><br/>
			<label>telephone: <input type="text" name="telephone"/></label><br/>
			<label>Le nom de votre entreprise: <input type="text" name="nomEntreprise"/></label><br/>
			<label>La ville où se trouve votre entreprise: <input type="text" name="villeEntreprise"/></label><br/>
			<label>mot de passe: <input type="password" name="mdp"/></label><br/>
			<label>Répéter votre mot de passe: <input type="password" name="repeatpassword"/></label><br/>
		<br>
		<input type="reset" name="Annuler" value="Annuler"/>
		<input type="submit" name="Inscription" value="Inscription"/>
	</form>
</div>
</body>
</html>
