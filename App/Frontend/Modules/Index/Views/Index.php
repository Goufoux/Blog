<header>
	<h2 class="col-12"> Dernière Publication </h2>
</header>
<?php
	if(!empty($billet))
	{
		foreach($billet as $bat)
		{
			?>
				<article class="col-12 col-md-8 col-sm-12 billet">
					<h3> <a href="billet-<?php echo $bat->getId(); ?>"> <?php echo $bat->getTitre(); ?> </a> </h3>
					<div class="content">
						<?php echo nl2br($bat->getContenu()); ?>
					</div>
					<ul>
						<li> Publié le: <?php echo date('d-m-Y', $bat->getDatePub()); ?> </li>
						<?php
							if($bat->getDateMod())
							{
								?>
									<li> Modifié il y a : <?php echo $style->styleDate($bat->getDateMod()); ?> </li>
								<?php
							}
						?>
					</ul>
				</article>
			<?php
		}
	}
	else
	{
		?>
			<h3> Aucune Publication ! </h3>
		<?php
	}