<link rel="stylesheet" href="css/frontend/list.css" />
<h3> Billet Simple pour l'Alaska </h3>
<blockquote class="col-12">
	Liste de tous les billets !
</blockquote>
<?php
	if(!empty($list))
	{
		foreach($list as $billet)
		{
			$date = getDate($billet->getDatePub());
			?>
				<a href="billet-<?php echo $billet->getId(); ?>"> <article class="billet col-6 col-sm-6 col-md-5 col-lg-4">
					<h3> <?php echo $billet->getTitre(); ?> </h3>
					<ul class="col-12">
						<li> Publié le: <?php echo $date['mday'] . '/' . $date['mon'] . '/' . $date['year']; ?> </li>
					</ul>
				</article> </a>
			<?php
		}
	}
	else
	{
		?>
			<h4> Aucun billet pour le moment... </h4>
		<?php
	}
?>