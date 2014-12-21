<?php 

///CHARACTER SEARCH

$isCharacter = false; $isGuild = false;
if (!empty($_POST) && isset($_POST['search-characters'])) {
	$isCharacter = true;
	$characterName = $_POST['characterName'];

	$url = "http://us.battle.net/api/wow/character/Bleeding-Hollow/".$characterName."?fields=guild";

	$data = json_decode(file_get_contents($url), true);

	$avatarBase = $data['thumbnail'];
	$avatarUrlString = "<img src='http://us.battle.net/static-render/us/". $avatarBase . "'>";

}


///GUILD SEARCH

if (!empty($_POST) && isset($_POST['search-guilds'])) {
	$isGuild = true;
	$guildName = $_POST['guildName'];
	$guildName = str_replace(' ','%20',$guildName);

	$url = "http://us.battle.net/api/wow/guild/Bleeding-Hollow/".$guildName."?fields=members";

	$data = json_decode(file_get_contents($url),true);

	$charList = array();
	$iLevelList = array();
	$thumList = array();

	foreach ($data["members"] as $key => $members) {
		//print_r($members["character"]["name"]);
		$charList[] = $members["character"]["name"];
		$thumbList[] = $members["character"]["thumbnail"];
	}

	$numResults = count($charList);

	
}

?>

<?php 
	$title = 'World of Warcraft Search API Testing';
	include('php/header.php'); 
?>


	<div id="main">
	<h1>Interacting with the World of Warcraft RESTful API</h1>

	<h2>Character Search</h2>
	<?php 
	if ($isCharacter) {
		echo $avatarUrlString;
		echo '<br>';
		echo $data['name'];
		echo ' is level ';
		echo $data['level'];
	}

	?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<input type="text" name="characterName">
		<input type="submit">
		<input type="hidden" name="search-characters" value="search">
	</form>

	<h2>Guild Search</h2>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<input type="text" name="guildName">
		<input type="submit">
		<input type="hidden" name="search-guilds" value="search">
	</form>

	<?php 
		if ($isGuild) {
			echo $data['name'].' : Level ';
			echo $data['level'] . '<br>';

			

		for ($x = 0; $x <= $numResults; $x++) {
			$url = "http://us.battle.net/api/wow/character/Bleeding-Hollow/".$charList[$x]."fields=items";

			$data = json_decode(file_get_contents($url), true);

			$iLevel = $data['items']['averageItemLevel'];
			echo $iLevel;
			
		}

		//http://us.battle.net/api/wow/character/Bleeding-Hollow/Daarknstormy?fields=items

		//display avatars
		// for ($x = 0; $x <= $numResults; $x++) {
		// 	$thumbUrl = "<img alt='".$charList[$x]."' src='http://us.battle.net/static-render/us/". $thumbList[$x] . "'>";
		// 	echo $thumbUrl;
		// }
			
		}
	?>
	</div>

<!--
	<script type="text/javascript">
		function foo(data) {
			$("#result").html(data.name);


			var base = "http://us.battle.net/static-render/us/";
			var urlString = "<img src='" + base + data.thumbnail + "'>";
			$("#avatar").html(urlString);
			console.log(urlString);
		}
 
		$(document).ready(
		function(){
			$.ajax({
			  url: "http://us.battle.net/api/wow/character/Bleeding-Hollow/Daarknstormy?fields=guild&jsonp=foo",
			  type: 'GET',
			  dataType: 'jsonp'
			});
		});
	</script>

	<div id="avatar"></div>
	<div id="result"></div>
-->

</body>
</html>