<form method="post" action=""><h2>Upraviť článok</h2>
<?php
if (isset($_POST['param1'])) 
{
	$uprav_id = $_POST['param1'];
	$clanok = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."napisali WHERE id='$uprav_id'");
	if($clanok)
	{
		$nazov = htmlspecialchars($clanok->nazov, ENT_QUOTES);
		$datum = $clanok->datum;
		$odkaz = htmlspecialchars($clanok->odkaz, ENT_QUOTES);
		$server = htmlspecialchars($clanok->server, ENT_QUOTES);
		$os = array("Zive.sk", "Zive.cz", "DSL.sk", "ITNews.sk", "SME.sk", "Pocitace.sme.sk", "Inet.sk", "JasnaPaka", "Lupa.cz");
		if (in_array($server, $os) == false) {
			$server_iny = $server; $server = "-";  
		}

		$excerpt = htmlspecialchars($clanok->excerpt, ENT_QUOTES);
		require_once("napisali-upravit-inc.php");
	}
	else die ("Osudová chyba: Také ID tu nemám.");
}
?>
	<div class="submit">
		<input type="submit" name="ok-submit" value="Potvrdiť zmeny &raquo;" />
	</div>
	<input id="todo" name="todo" type="hidden" value="upravit-ok"/>
	<input id="param1" name="param1" type="hidden" value="<?php echo $uprav_id ?>"/>
</form>
