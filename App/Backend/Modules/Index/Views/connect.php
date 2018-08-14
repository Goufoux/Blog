<form action="#" method="post">
	<input type="text" id="uLogin" class="uLogin" placeholder="Pseudo ou Email" name="uLogin" required />
	<input type="password" id="uPass" class="uPass" placeholder="Pass" name="uPass" />
	<input type="submit" value="Connexion" />
</form>
<?php
	if(!empty($success))
		var_dump($success);
?>