# Pokemon GO Servers API
Uma api para http://www.mmoserverstatus.com/pokemongo que busca o status dos servidores!
##Exemplo de uso
```sh
$dom = new DOMDocument();
$dom->loadHTMLFile('http://www.mmoserverstatus.com/pokemongo');
$ListaDeNomes = array("Google Login", "Poke Club Login", "United States", "Mexico", "Peru" , "Venezuela", "Canada", "Portugal", "Spain", "Argentina", "Brazil", "Chile");
foreach($ListaDeNomes as $Nome)
{
	$Srv = new Servidor($Nome, $dom);
	if($Srv->ServerRodando !== false)
	{
		echo $Nome . " - " . $Srv->ServerPing . " Online<br>";
	}else{
		echo $Nome . " - " . $Srv->ServerStatus . " <br>";
	}
}
```
