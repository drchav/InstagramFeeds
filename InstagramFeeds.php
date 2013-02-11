<?php
  
	// 'http://instagr.am/tags/%s/feed/recent.rss' (LINK DA API)

	$url = 'http://instagr.am/tags/php/feed/recent.rss';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$resultado = curl_exec($ch);
	curl_close($ch);

	$xml = new SimpleXMLElement($resultado);
		foreach($xml->channel as $feed){
			foreach($feed->item as $feeds){
				$instagram[] = array(
					'titulo' => (string)$feeds->title,
					'imagem' => (string)$feeds->link
				);
			}
		}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Recurepando imagens do instagram pela #hashtag</title>
	<style type="text/css">
		section{
			width:200px;
			height:200px;
			float:left;
			margin:25px;
			background:#f4f4f4;
			border:1px solid #CCC;
			padding:5px;
			-webkit-transition:background 0.2s ease-in-out;
		}
		section:hover{
			background:#CCC;
		}
	</style>
</head>
<body>
	<?php
		foreach($instagram as $feed):
	?>
	<section>
		<img src="<?php print $feed[imagem] ?>" width="200" height="200" />
	</section>
	<?php endforeach; ?>
</body>
</html>


