<?php
	$bdd = new PDO('mysql:host=localhost;dbname=autoecole','root','');
?>
<?php
if (isset($_POST['Inscription']))
	{	
		
		$idcandidat = htmlspecialchars(trim($_POST['idcandidat']));		
		$nomEcole = htmlspecialchars(trim($_POST['nom_Ecole']));
		$villeEcole = htmlspecialchars(trim($_POST['ville_Ecole']));
		$Nomcandidat = htmlspecialchars(trim($_POST['Nomcandidat']));
		$Prenomcandidat = htmlspecialchars(trim($_POST['Prenomcandidat']));
		$email = htmlspecialchars(trim($_POST['email']));
		$adresse = htmlspecialchars(trim($_POST['adresse']));
		$cp = htmlspecialchars(trim($_POST['cp']));
		$ville = htmlspecialchars(trim($_POST['ville']));
		$datenaiss = htmlspecialchars(trim($_POST['datenaiss']));
		$telephone = htmlspecialchars(trim($_POST['telephone']));
		$mdp = htmlspecialchars(trim($_POST['mdp']));
		$repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));
		
		
	
		if($idcandidat&&$email&&$Nomcandidat&&$Prenomcandidat&&$adresse&&
		$cp&&$ville&&$datenaiss&&$telephone&&$mdp&&$villeEcole&&$nomEcole)
		{
			
					
				if ($mdp == $repeatpassword)
				{
					$insertEtudiant = $bdd->prepare ("insert into etudiant(idcandidat,nom_Ecole,ville_Ecole,Nomcandidat,Prenomcandidat
					,email,cp,ville,adresse,datenaiss,telephone,mdp) values(?,?,?,?,?,?,?,?,?,?,?,?)");
					$insertEtudiant->execute(array($idcandidat, $nomEcole, $villeEcole, $Nomcandidat, $Prenomcandidat
					, $email, $cp, $ville, $adresse, $datenaiss, $telephone, $mdp));
					
					
					
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
<p>Compte étudiant:</p>  
<div id="formulaire">
<br>
	<form method="post" action="compte_etudiant.php">
			<label for="idcandidant"> Identifiant: <input type="text" name="idcandidat"/></label><br/>
			<label for="email">Email: <input type="mail" name="email"/></label><br/>
			<label for="Nomcandidat">Nom: <input type="text" name="Nomcandidat"/></label><br/>
			<label for="Prenomcandidat">Prénom: <input type="text" name="Prenomcandidat"/></label><br/>
			<label for="adresse">Adresse: <input type="text" name="adresse"/></label><br/>
			<label for="cp">Code postal: <input type="text" name="cp"/></label><br/>
			<label for="ville">Ville: <input type="text" name="ville"/></label><br/>
			<label for="datenaiss">Date de naissance: <input type="date" name="datenaiss"/></label><br/>
			<label for="telephone">Telephone: <input type="text" name="telephone"/></label><br/>
			<label for="nom_Ecole">Le nom de votre ecole: <input type="text" name="nom_Ecole"/></label><br/>
			<label for="ville_Ecole">La ville où se trouve votre ecole: <input type="text" name="ville_Ecole"/></label><br/>
			<label for="ville_Ecole">Mot de passe: <input type="password" name="mdp"/></label><br/>
			<label for="repeatpassword">Répéter votre mot de passe: <input type="password" name="repeatpassword"/></label><br/>
		<br>
		<input type="reset" name="Annuler" value="Annuler"/>
		<input type="submit" name="Inscription" value="Inscription"/>
	</form>
</div>
</body>
</html>
