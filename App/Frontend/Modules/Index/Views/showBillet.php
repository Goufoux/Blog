<link rel="stylesheet" href="css/frontend/showBillet.css" />
<?php
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
<article class="col-10 billet">
	<h3> <?php echo $billet->getTitre(); ?> </h3>
	<div class="content">
		<?php echo nl2br($billet->getContenu()); ?>
	</div>
	<ul>
	<li> PUB: <?php echo $billet->getDatePub(); ?> </li>
	<li> MOD: <?php echo $billet->getDateMod(); ?> </li>
</article>
<section class="boxComment col-12">
	<form action="#" method="post" class="col-3 formComment">
		<h4> Laissez un commentaire ! </h4>
		<input type="name" id="cName" class="cName col-12" name="cName" placeholder="Nom" />
		<input type="email" id="cEmail" class="cEmail col-12" name="cEmail" placeholder="Email" />
		<input type="hidden" name="bId" value="<?php echo $billet->getId();?>" />
		<textarea class="cDesc col-12" id="cDesc" name="cDesc" placeholder="Commentaire..."></textarea>
		<input type="submit" value="Commenter" />
	</form>
	<div class="comment col-8">
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
								<form action="#" method="post">
									<button class="btSignaler" value="comment_<?php echo $comment->getId(); ?>" name="btSignaler"> Signaler </button>
								</form>
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
	if(!empty($success))
	{
		var_dump($success);
	}
	if(!empty($error))
		var_dump($error);
?>