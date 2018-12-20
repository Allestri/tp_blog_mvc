<?php
function getPosts()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=tp_blog_mvc;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
	
	// Recuperation billets
	$request = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT 0, 10');

    return $request;
}

function getPost($postId)
{
	
	try
    {
        $db = new PDO('mysql:host=localhost;dbname=tp_blog_mvc;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
	
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
	
	try
    {
        $db = new PDO('mysql:host=localhost;dbname=tp_blog_mvc;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
	
	//Recupération commentaires
	$comments = $db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
	AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
	$comments->execute(array($postId));
	
	
return $comments;
}

