<h1> Bonjour <?php echo $_SESSION['membre']->getPseudo(); ?> </h1>
<?php
	if(!empty($report))
	{
		$nb = count($report);
		?>
			<h4> <?php echo $nb . ' commentaire(s) signalé(s)'; ?> </h4>
				<section class="boxComment">
					<?php
						foreach($report as $comment)
						{
							$act = getDate();
							$diff = getDate($act[0] - $comment->getDatePub());
							?>
								<article class="comment col-lg-4 col-md-6 col-sm-8 col-8">
									<p>
										<?php echo nl2br($comment->getContenu()); ?>
									</p>
									<ul>
										<li> Il y a <?php echo $diff['hours'].':'.$diff['minutes'].':'.$diff['seconds']; ?></li>
										<li> <?php echo $comment->getSignaler(); ?> signalement(s) </li>
									</ul>
									<a href="?delComment=<?php echo $comment->getId(); ?>"> <button> Supprimer </button> </a>
								</article>
							<?php
						}
					?>
				</section>
		<?php
	}
	else
	{
		?>
			<h4> Aucun commentaire signalé. </h4>
		<?php
	}
if(!empty($error))
{
	?>
		<article class="error">
				<img src="img/croix.png" class="croix" alt="Fermer ?" title="Fermer ?" />
				<h4> <?php echo $error; ?> </h4>
			</article>
	<?php
}