<link rel="stylesheet" href="../css/backend/connect.css" />
<form action="#" method="post" class="formConnect">
	<input type="text" id="uLogin" class="uLogin" placeholder="Pseudo ou Email" name="uLogin" required />
	<input type="password" id="uPass" class="uPass" placeholder="Pass" name="uPass" required />
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