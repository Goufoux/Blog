<h1> Page d'accueil Frontend </h1>
<?php
	if(!empty($billet))
	{
		foreach($billet as $bat)
		{
			?>
				<div class="col-12">
					<h3> <a href="billet-<?php echo $bat->getId(); ?>"> <?php echo $bat->getTitre(); ?> </a> </h3>
					<p>
						<?php echo nl2br($bat->getContenu()); ?>
					</p>
					<span> ID: <?php echo $bat->getId(); ?> </span>
					<span> PUB: <?php echo $bat->getDatePub(); ?> </span>
					<span> MOD: <?php echo $bat->getDateMod(); ?> </span>
				</div>
			<?php
		}
	}
	else
	{
		?>
			<h3> Aucune News ! </h3>
		<?php
	}