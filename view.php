<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>
 
        
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
				<a href="#">Commentaires</a>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </body>
</html>