<?php 

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{

	$postManager = new PostManager(); // Creation objet
	$posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
	
	require('view/listPostsView.php');
	
	
}

function post()
{

	$postManager = new PostManager();
	$commentManager = new CommentManager();
	
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);
	
	require ('view/postView.php');

}

function addComment($postId, $author, $comment)
{
	
	$commentManager = new CommentManager();
	
	$affectedLines = $commentManager->postComment($postId, $author, $comment);
	
	if ($affectedLines === false) {
		// Erreur gerée. Elle sera remntée jusqu'au bloc try du routeur !
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}
