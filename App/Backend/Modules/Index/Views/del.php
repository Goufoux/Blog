<link rel="stylesheet" href="../css/backend/add.css" />
<?php
	if(!empty($billet))
	{
		?>
			<h3> Supprimer un billet </h3>
				<article class="billet col-8">
					<h3><?php echo $billet->getTitre(); ?></h3>
					<p><?php echo nl2br($billet->getContenu()); ?></p>
				</article>
				<form action="#" method="post" class="formAdd">
					<input type="hidden" value="del" name="delBillet" />
					<input type="submit" value="Supprimer" />
				</form>
		<?php
	}
	if(!empty($success))
	{
		?>
			<h4> <?php echo $success; ?> </h4>
		<?php
	}
	?>