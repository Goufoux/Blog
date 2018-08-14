<link rel="stylesheet" href="css/frontend/connect.css" />
<h3> Connexion </h3>
<form action="#" method="post" class="formConnect col-4">
	<input type="text" id="uLogin" class="uLogin" placeholder="Pseudo ou Email" name="uLogin" />
	<input type="password" id="uPass" class="uPass" placeholder="Pass" name="uPass" />
	<input type="submit" value="Connexion" />
</form>
<?php
	if(!empty($error))
	{
		?>
			<article class="error">
				<p>
					<?php echo $error; ?>
				</p>
			</article>
		<?php
	}
?>