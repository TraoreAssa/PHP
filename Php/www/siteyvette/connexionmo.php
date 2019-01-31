<?php 

require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");

if(internauteEstConnecte()) header("location:profil.php");

if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	session_destroy();
}

if($_POST){

	$resultat = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' AND mdp = '$_POST[password]' ");

	$membre = $resultat->fetch(PDO::FETCH_ASSOC);

	if($membre){

		foreach ($membre as $key => $value) {
			if($key != 'mdp')
			{
				$_SESSION['membre'][$key] = $value;
			}
		}

		header("location:profil.php");
	} else {
		$content .= '<div class="alert alert-danger" role="alert">Pseudo et/ou Mot de passe incorrect</div>';
	}
}

?>
		<div class="card" style="width: 18rem;">
	  		<div class="card-body">
	   			<h5 class="card-title">Connexion</h5>
	   			<form method="post" action="">
					  <div class="form-group">
					    <label for="exampleInputPseudo1">Pseudo</label>
					    <input type="text" name="pseudo" class="form-control" id="exampleInputPseudo1" placeholder="Entrer votre pseudo">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					  </div>
					  <button type="submit" class="btn btn-primary">Connexion</button>
					</form>

					<?php echo $content ;?>
	  		</div>
		</div>		

<?php require_once('inc/bas.inc.php') ;?>