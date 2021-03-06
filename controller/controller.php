<?php 

require('model/model.php');

function listPosts()
{

	$posts = getPosts();
	require('view/listPostsView.php');
	
}

function post()
{

	$post = getPost($_GET['id']);
	$comments = getComments($_GET['id']);
	
	require ('view/postView.php');

}

function addComment($postId, $author, $comment)
{
	$affectedLines = postComment($postId, $author, $comment);
	
	if ($affectedLines === false) {
		// Erreur gerée. Elle sera remntée jusqu'au bloc try du routeur !
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}
