<?php 

require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");

if(internauteEstConnecte()) header("location:profil.php");

if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
	session_destroy();
}

if(isset($_POST['connexion'])){

	// rajout de or $_POST['email'] pour gerer le cas où c'est l email qui est rentrer
	$resultat = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' OR email='$_POST[mail]'");

	$membre = $resultat->fetch(PDO::FETCH_ASSOC);
	

	if(!$membre){
		echo "Pseudo incorrect";
	}else{

		if(password_verify($_POST['password'],$membre['mdp'])){
			foreach ($membre as $key => $value) {

			
				if($key != 'mdp')
				{
					$_SESSION['membre'][$key] = $value;
				}
			}


			header("location:profil.php");
		}else{
			echo "Mot de passe incorrect";
		}
		

	}
	

}

// reinitialistaion du mot de passe





?>
		<div class="card" style="width:18rem;">
	  		<div class="card-body" >
	   			<h5 class="card-title">Connexion</h5>
	   			<form method="post" action="" >
				   
					  <div class="form-group ">
					    <label for="exampleInputPseudo1">Pseudo</label>
						<input type="text" name="pseudo" class="form-control" id="exampleInputPseudo1" placeholder="Entrer votre pseudo">
					  </div>
					  <div class="form-group  ">
					    <label for="exampleInputPseudo1">Email</label>
						<input type="text" name="mail" class="form-control" id="exampleInputPseudo1" placeholder="Entrer votre pseudo">
					  </div>
				
					 
					  <div class="form-group " >
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					  </div>
					 
					  
					  
						<?php if(!isset($_GET['action'])){?>

						<button type="submit" class="btn btn-primary" name="connexion">Connexion</button>

						<div class="form-group font-weight-bold mt-1">

					    	<a href="?action=reinitianiser_mdp">J ai oublié mon mot de passe</a>
						
					  </div>
					  
					
					<?php }elseif($_GET['action']=="reinitianiser_mdp"){

						echo '<button type="submit" class="btn btn-primary" name="enregistre" >Enregistre </button>';
						
						if(!isset($_POST['enregistre']))
						// test de verification de l identité de la personne 
						
						{	
							
							$idmembre=executeRequete("SELECT id_membre FROM membre WHERE pseudo='$_POST[pseudo]'")->fetch(PDO::FETCH_ASSOC);


							$test=executeRequete("SELECT question,reponse FROM infomembre WHERE id_membre='$idmembre[id_membre]'")->fetch(PDO::FETCH_ASSOC);

							echo '<h5>Test de verification de l identité</h5><form><label>Question</label><input type="text" value="'.$test['question']

							.'"><label>Réponse</label><input type="text" ><input type="submit" value="valider" name="valider_test"> </form>';

								if(isset($_POST['valider_test']) && $test['reponse']===$_POST['reponse']){

									echo '<div class="form-group"> rentrer un nouveau mot de passe </div>';
								}
								else{
									echo 'Vous n\'êtes pas le detenteur du compte';
								}
							
								
							
						}

					
						else
						{
						
							$mot=password_hash($_POST['password'], PASSWORD_DEFAULT);
					
							executeRequete("UPDATE membre SET mdp='$mot' WHERE pseudo='$_POST[pseudo]'");


							echo"<script>window.location.href='connexion.php'</script>";

							
						}
					} ?>
						
					</form>
						
					<?php echo $content ;?>
	  		</div>
		</div>		

<?php require_once('inc/bas.inc.php') ;?>