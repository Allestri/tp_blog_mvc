<?php 
require('controller/controller.php');

try { // Test
	if (isset($_GET['action'])){
		if($_GET['action'] == 'listPosts') {
			listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			}
			else {
				// Erreur on arrête tout, envoie d'exception
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		} 
		elseif ($_GET['action'] == 'addComment') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				if(!empty($_POST['author']) && !empty($_POST['comment'])) {
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else {
					// Autre exception
					throw new Exception('Tous les champs ne sont pas remplis');
				}
			}
			else {
				// Autre exception
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
	}
	else {
		listPosts();
	}
}
catch(Exception $e){ // S'il y a une erreur, alors ... 
	echo 'Erreur : ' . $e->getMessage();
}