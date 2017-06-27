<?php
	$db = new SQLite3('baza.db');
	require('simple_html_dom.php');
	$html = new simple_html_dom();
	$html -> load_file('http://plan.d2.pl/lista.html');
	$db -> exec("CREATE TABLE klasy(id TEXT PRIMARY KEY, profil TEXT);");
	$db -> exec("CREATE TABLE nauczyciele(numer INT PRIMARY KEY, imie TEXT, inicjal TEXT)");
	$db -> exec("CREATE TABLE sale(numer INT PRIMARY KEY, dzial TEXT);"); 
	$db -> exec("CREATE TABLE dzien(id INT, nazwa TEXT);");

	$dni_tygodnia = array(' ','Poniedzialek', 'Wtorek', 'Sroda', 'Czwartek', 'Piatek', 'Sobota', 'Niedziela');
	for ($i=1; $i <= 7; $i++) { 
		$db-> exec("INSERT INTO dzien(id, nazwa) VALUES('$i', '$dni_tygodnia[$i]');");
	}
	
	
	function parseStr($str)
	{
		$wynik = $str." ";
		return $wynik;
	}
	$id=1;
	$nauczyciele = $html -> find('ul'); 

	 for($lista = 0 ; $lista<=2 ; $lista++){
	
		foreach($nauczyciele[$lista]->find('li') as $li) 
		   {
				 foreach($li->find('a') AS $aski)
				 {			 
					 $dane = parseStr($li->plaintext);
					 $dane = explode(" ", $dane);
					 
					 if($lista==0)
					 {
						 $dane[1] = mb_substr("$dane[1]", 1, strlen($dane[1])-1);
						 $db->exec("INSERT INTO klasy(id, profil) VALUES('$dane[0]','$dane[1]')");	
					 }
					 else if($lista==1)
					 {
						 $dane[1] = mb_substr("$dane[1]", 1, 2);
						 $db->exec("INSERT INTO nauczyciele(numer, imie, inicjal) VALUES('$id','$dane[0]', '$dane[1]')");	
					 }
					 else if($lista==2)
					 {
						 if(isset($dane[2]))
						 {
							 $dane[1]=$dane[1]." ".$dane[2];
						 }
						 $db->exec("INSERT INTO sale(numer, dzial) VALUES('$dane[0]','$dane[1]')");	
					 } 
					 $id++;
				 }
		   }
		   echo "<br/><br/><br/><br/>";
		   $id=1; } 	
?>
