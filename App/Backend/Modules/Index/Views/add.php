<link rel="stylesheet" href="../css/backend/add.css" />
<h2> Ajout d'un billet </h2>
<form action="#" method="get">
	<input type="text" name="bTitle" placeholder="Titre" id="bTitle" />
	<textarea name="bDesc" placeholder="Contenu" id="bDesc"></textarea>
	<input type="submit" value="Ajouter" />
</form>
<p>
	Requête URL: <?php var_dump($req); ?> 
</p>