<link rel="stylesheet" href="../css/backend/add.css" />
<!-- Inclusion du plugin TinyMCE -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f4dp9wawlw7lf2eguscb58wx6b7v18y76xypimmcsb77gewa"></script>
<script src="../js/admin/index.js"></script>
<h3> Ajout d'un billet </h3>
<form action="#" method="post" class="formAdd">
	<input type="text" name="bTitle" placeholder="Titre" id="bTitle" class="col-12" />
	<textarea name="bDesc" placeholder="Contenu" id="bDesc" class="col-12"></textarea>
	<input type="submit" value="Ajouter" />
</form>
	<?php
		if(!empty($error))
		{
			?>
				<h4> Erreurs détéctées </h4>
				<p>
			<?php
				for($i = 0; $i < count($error); $i++)
				{
					echo $error[$i] . "<br />";
				}
			?>
				</p>
			<?php
		}
		if(!empty($success))
		{
			?>
				<h4> Le billet a bien été ajouté ! </h4>
			<?php
		}
	?>