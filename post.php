<?php 
require ('model.php');

if(isset($_GET['postId']) && $_GET['postId'] > 0) 
{
	$post = getPost($_GET['postId']);
	$comments = getComments($_GET['postId']);
	require('postView.php');
} else {
	echo 'Erreur : aucun identifiant ' . $post . 'de billet envoyé';
}