<h1 class="col-12"> Dernière Publication </h1>
<?php
	if(!empty($billet))
	{
		foreach($billet as $bat)
		{
			$date = getDate($bat->getDatePub());
			?>
				<article class="col-6 billet">
					<h3> <a href="billet-<?php echo $bat->getId(); ?>"> <?php echo $bat->getTitre(); ?> </a> </h3>
					<div class="content">
						<?php echo nl2br($bat->getContenu()); ?>
					</div>
					<ul>
						<li> Publié le: <?php echo $date['mday'] . "/" . $date['mon'] . "/" . $date['year']; ?> </li>
						<?php
							if($bat->getDateMod())
							{
								$act = getDate();
								$diff = getDate($act[0] - $bat->getDateMod());
								?>
									<li> Modifié il y a : <?php echo $diff['hours'] . ':' . $diff['minutes'] . ':' . $diff['seconds']; ?> </li>
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