<link rel="stylesheet" href="../css/backend/add.css" />
<!-- Inclusion du plugin TinyMCE -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f4dp9wawlw7lf2eguscb58wx6b7v18y76xypimmcsb77gewa"></script>
<script src="../js/admin/index.js"></script>
<h2> Ajout d'un billet </h2>
<form action="#" method="post">
	<input type="text" name="bTitle" placeholder="Titre" id="bTitle" />
	<textarea name="bDesc" placeholder="Contenu" id="bDesc"></textarea>
	<input type="submit" value="Ajouter" />
</form>
<p>
	<?php
		if(!empty($error))
		{
			?>
				<h4> Des erreurs ont été détéctées </h4>
			<?php
				for($i = 0; $i < count($error); $i++)
				{
					echo "Erreur " . ($i+1) . " " . $error[$i] . "<br />";
				}
		}
		if(!empty($success))
		{
			?>
				<h4> Formulaire en cours de vérification... </h4>
					<p>
						<?php var_dump($e); ?>
					</p>
			<?php
		}
		if(!empty($req))
		{
			?>
				<h4> Requête : <?php echo $req . " (" . $method . ")"; ?> </h4>
			<?php
		}
	?>
</p>