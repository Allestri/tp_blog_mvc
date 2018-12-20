<?php $title ="Mon blog"; ?>
<?php ob_start(); ?>


<?php
    while ($data = $posts->fetch())
    {
    ?>
	<div class="billet">
		<h3>
			<?php echo htmlspecialchars($data['title']) ?>
			<em>posté le <?php echo htmlspecialchars ($data['creation_date_fr']) ?></em>
		</h3>

		<p>
			<?php echo(htmlspecialchars($data['content'])) ?>
		</p>
		<a href="post.php?postId=<?php echo $data['id']; ?>">Commentaires</a>
	</div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean();?>
<?php require ('template.php'); ?>