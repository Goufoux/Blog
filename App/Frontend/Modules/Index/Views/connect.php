<link rel="stylesheet" href="css/frontend/connect.css" />
<h3> Connexion / Inscription </h3>
<form action="#" method="post" class="formConnect col-12">
	<input type="text" id="uLogin" class="uLogin" placeholder="Pseudo" name="uLogin" required />
	<input type="password" id="uPass" class="uPass" placeholder="Pass" name="uPass" required />
	<input type="submit" value="Connexion / Inscription" />
</form>
<?php
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