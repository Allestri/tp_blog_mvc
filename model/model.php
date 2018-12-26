<?php
// Connexion BDD
function dbConnect()
{
	$db = new PDO('mysql:host=localhost;dbname=tp_blog_mvc;charset=utf8', 'root', '');
	return $db;
}

function getPosts()
{

	$db = dbConnect();
	// Recuperation billets
	$request = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT 0, 10');

    return $request;
}

function getPost($postId)
{
	$db = dbConnect();
	// Recuperation billet
	$request = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
	AS creation_date_fr FROM posts WHERE id = ?');
	$request->execute(array($postId));
	$post = $request->fetch();
	if(empty($post))
	{
		echo "<p>Le billet n'existe pas</p>";
	}
	else 
	{
		echo '<p>Le billet existe</p>';
	
	}

return $post;
}


function getComments($postId)
{
	$db = dbConnect();
	//Recupération commentaires
	$comments = $db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
	AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
	$comments->execute(array($postId));
	
	
return $comments;
}


function postComment($postId, $author, $comment)
{
	$db = dbConnect();
	$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date ) VALUES(?, ?, ?, NOW())');
	$affectedLines = $comments->execute(array($postId, $author, $comment));
	
	return $affectedLines;
}



?>