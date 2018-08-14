<h4> Lecture du Billet : </h4>
<div class="col-12">
	<h3> <a href="billet-<?php echo $billet->getId(); ?>"> <?php echo $billet->getTitre(); ?> </a> </h3>
	<p>
		<?php echo nl2br($billet->getContenu()); ?>
	</p>
	<span> ID: <?php echo $billet->getId(); ?> </span>
	<span> PUB: <?php echo $billet->getDatePub(); ?> </span>
	<span> MOD: <?php echo $billet->getDateMod(); ?> </span>
</div>
<div class="comment">
	<h3> Liste des commentaires : </h3>
		<?php
			if(!empty($listComment))
			{
				foreach($listComment as $comment)
				{
					?>
						<div>
							<span> Pseudo: <?php echo $comment->getName(); ?> </span><br />
							<span> Date Pub: <?php echo $comment->getDatePub(); ?> </span><br />
							<p>
								<?php echo nl2br($comment->getContenu()); ?>
							</p>
							<span> Nb de signalement : <?php echo $comment->getSignaler(); ?> </span>
							<form action="#" method="post">
								<button class="btSignaler" value="comment_<?php echo $comment->getId(); ?>" name="btSignaler"> Signaler </button>
							</form>
						</div>
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
<?php
	if(!empty($success))
	{
		var_dump($success);
	}
	if(!empty($error))
		var_dump($error);
?>
<form action="#" method="post">
	<input type="name" id="cName" class="cName" name="cName" placeholder="Nom" />
	<input type="email" id="cEmail" class="cEmail" name="cEmail" placeholder="Email" />
	<input type="hidden" name="bId" value="<?php echo $billet->getId();?>" />
	<textarea class="cDesc" id="cDesc" name="cDesc" placeholder="Commentaire..."></textarea>
	<input type="submit" value="Commenter" />
</form>