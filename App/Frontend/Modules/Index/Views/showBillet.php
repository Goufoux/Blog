<link rel="stylesheet" href="css/frontend/showBillet.css" />
<?php
	if(!empty($billet))
	{
		if(!empty($_SESSION['auth']) AND $_SESSION['auth'] AND $_SESSION['membre']->getAccessLevel() >= 3)
		{
			?>
				<nav class="navAdmin">
					<a href="admin/upd-<?php echo $billet->getId(); ?>"> <button> Modifier </button> </a>
					<a href="admin/del-<?php echo $billet->getId(); ?>"> <button> Supprimer </button> </a>
				</nav>
			<?php
		}
		?>
			<article class="col-12 col-md-10 col-lg-8 billet">
				<h3> <?php echo $billet->getTitre(); ?> </h3>
				<div class="content">
					<?php echo nl2br($billet->getContenu()); ?>
				</div>
				<ul>
					<?php
						$date = getDate($billet->getDatePub());
					?>
					<li> Publié le: <?php echo $date['mday'] . "/" . $date['mon'] . "/" . $date['year']; ?> </li>
						<?php
							if($billet->getDateMod())
							{
								$act = getDate();
								$diff = getDate($act[0] - $billet->getDateMod());
								?>
									<li> Modifié il y a : <?php echo $diff['hours'] . ':' . $diff['minutes'] . ':' . $diff['seconds']; ?> </li>
								<?php
							}
						?>
			</article>
			<section class="boxComment col-12">
				<?php
					if(!empty($_SESSION['auth']))
					{
						?>
							<form action="#" method="post" class="col-lg-3 col-md-8 col-sm-12 formComment">
								<h4> Laissez un commentaire ! </h4>
								<input type="hidden" name="bId" value="<?php echo $billet->getId();?>" />
								<textarea class="cDesc col-12" id="cDesc" name="cDesc" placeholder="Commentaire..." required></textarea>
								<input type="submit" value="Commenter" />
							</form>
						<?php
					}
				?>
				<div class="comment col-lg-7 col-md-8 col-sm-12">
					<h3> Liste des commentaires : </h3>
						<?php
							if(!empty($listComment))
							{
								foreach($listComment as $comment)
								{
									$date = getDate($comment->getDatePub());
									?>
										<article class="col-6">
											<p>
												<?php echo nl2br($comment->getContenu()); ?>
											</p>
											<ul>
												<li> Par <?php echo $comment->getName(); ?> </li>
												<li> Le <?php echo $date['mday'] . '/' . $date['mon'] . '/' . $date['year'] . ' à ' . $date['hours'] . 'h:' . $date['minutes'] . 'min'; ?> </li>
											</li>
											<?php
												if(!empty($_SESSION['auth']))
												{
													?>
														<form action="#" method="post">
															<button class="btSignaler" value="comment_<?php echo $comment->getId(); ?>" name="btSignaler"> Signaler </button>
														</form>
													<?php
													if($_SESSION['membre']->getAccessLevel() >= 4)
													{
														?>
																<a href="admin/?delComment=<?php echo $comment->getId(); ?>"> <button> Supprimer </button> </a>
														<?php
													}
												}
											?>
										</article>
									<?php
								}
							}
							else
							{
								?>
									<p> Aucun commentaire pour le moment. </p>
								<?php
							}
						?>
					</div>
			</section>
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
?>