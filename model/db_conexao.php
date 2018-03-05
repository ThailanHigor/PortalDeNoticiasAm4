<?php
	define ('SERVIDOR',"localhost");
	define ('USERNAME',"root");
	define ('PASSWORD',"");
	define ('DBNOME',"portaldenoticias");
	define ('DIRIMAGEM',"imagens/");
	$conector = new mysqli(SERVIDOR, USERNAME, PASSWORD, DBNOME);

?>