<link rel="stylesheet" href="../css/backend/add.css" />
<!-- Inclusion du plugin TinyMCE -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f4dp9wawlw7lf2eguscb58wx6b7v18y76xypimmcsb77gewa"></script>
<script src="../js/admin/index.js"></script>
<?php
	if(!empty($billet))
	{
		?>
			<h2> Modif d'un billet </h2>
				<form action="#" method="post" class="formAdd">
					<input type="text" name="bTitle" placeholder="Titre" id="bTitle" class="col-12" value="<?php echo $billet->getTitre(); ?>" required />
					<textarea name="bDesc" placeholder="Contenu" class="col-12" id="bDesc" required ><?php echo nl2br($billet->getContenu()); ?></textarea>
					<input type="submit" value="Modifier" />
				</form>
		<?php
	}
	?>
<p>
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
				<h4> Le billet a bien été modifié ! </h4>
			<?php
		}
	?>
</p>