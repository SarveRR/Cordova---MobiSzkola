<?php

require('simple_html_dom.php');

$baza = new SQLite3("baza.db");
$html = new simple_html_dom();
$baza->exec('CREATE TABLE godziny(id CHAR(10),od CHAR(10),do CHAR(10));');

$html->load_file('http://plan.d2.pl/plany/o12.html');

$ret = $html->find('.tabela');

$trki = $ret[0]->find('tr');

$demokracja = 0;

for($x=0 ; $x<=6 ; $x++){
	$socjalizm[$demokracja] = " ";
	foreach($trki as $tr) 
	{
		 $socjalizm[$demokracja] = $socjalizm[$demokracja].$tr->children($x)." ";  
	}
	$demokracja++;
}
	
$html->load($socjalizm[1]);
$godziny = $html->find('td');
$id = 0;

foreach ($godziny as $spam) {
	$czesc = explode("-", $spam);

	$ok1 = strip_tags($czesc[0]);
	$ok2 = strip_tags($czesc[1]);

	$baza->exec("INSERT INTO godziny (id,od,do) VALUES ('$id','$ok1','$ok2')");

	$id++;
}