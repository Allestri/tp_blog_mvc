<?php $title ="Mon blog"; ?>
<?php ob_start(); ?>

<p>Derniers billets du blog</p>
	
<a href="index.php?action=listPosts">Retour à la liste des billets</a>
			
<div class="billet">
	<h3>
		<?php echo htmlspecialchars($post['title']); ?>
		<em>posté le <?php echo htmlspecialchars($post['creation_date_fr']); ?></em>
	</h3>
	
	<p>
		<?php echo htmlspecialchars($post['content']); ?>
	</p>
</div>
			
<h2>Commentaires</h2>
<?php 
	while($comment = $comments->fetch())
	{
	?>
	<div class="commentaire">
		<p><strong><?php echo htmlspecialchars ($comment['author']);?></strong>
		le<?php echo ($comment['comment_date_fr']);?></p>
		<p><?php echo ($comment['comment']);?></p>
	</div>
	<?php
	}
	?>
<?php $content = ob_get_clean();?>
<?php require ('template.php'); ?>

<!-- Formulaire commentaire
			<form action="commentaires_post.php?postId= echo $_GET['postId'];" method="POST" id="commentform">
				<p><label>Nom<input type="text" name="auteur"/></label>
				<input type="submit" value="Envoyer"></p>
			</form>
			<textarea cols="40" rows="5" placeholder="Commentez ici ..." name="commentaire" form="commentform"></textarea>	
			
-->
