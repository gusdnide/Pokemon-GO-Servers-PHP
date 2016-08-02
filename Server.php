libxml_use_internal_errors(true);
class Servidor{
	public $ServerName = "";
	public $ServerPing = "";
	public $ServerRodando = false;
	public $ServerStatus = "";
	public function __construct($Nome, $Dom){
		$this->ServerName = $Nome;
		$this->BuscarInfo($Dom);
	}
	public function BuscarInfo($dom)
	{
		$ResultadoTag = $dom->getElementsByTagName('li');
		foreach($ResultadoTag as $el)
		{
			if(strpos($el->getAttribute('class'), 'white') !== false){
				if(strpos($el->nodeValue, $this->ServerName) !== false){
					$this->ServerPing = $el->getElementsByTagName('span')[0]->nodeValue;
					$Classe = $el->getElementsByTagName('span')[0]->getElementsByTagName('i')[0]->getAttribute('class');
					if(strpos($Classe, "fa fa-check green") !== false || strpos($Classe, "fa fa-exclamation orange") !== false)
					{
						$this->ServerRodando = true;
						$this->ServerStatus = "Online";
					}else{
						$this->ServerStatus = $el->getElementsByTagName('span')[0]->nodeValue;
						if(strpos($this->ServerStatus, "Soon") !== false ||$this->ServerStatus === ""){
							$this->ServerStatus = "Em breve!";
						}else{
							$this->ServerStatus = "Offline " . $this->ServerStatus ;
						}
					}
				}
			}
		}
	}
}
