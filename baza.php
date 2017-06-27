<?php

	require('simple_html_dom.php');

	$baza = new SQLite3("baza.db");
	$html = new simple_html_dom();
	$html2 = new simple_html_dom();

	$baza->exec('CREATE TABLE plan(klasa CHAR(5),przedmiot VARCHAR(30),dzien VARCHAR(30),godzina VARCHAR(20),nauczyciel CHAR(10),sala CHAR(10));');

	for ($i=1; $i < 20 ; $i++) 
	{ 
		$html -> load_file('http://plan.d2.pl/plany/o'.$i.'.html');
		$html2 -> load_file('http://plan.d2.pl/plany/o'.$i.'.html');
		
		$ret = $html->find('.tabela');
		$trki=$ret[0]->find('tr');
		
		$demokracja = 0;
		
		for($x=0 ; $x<=6 ; $x++)
		{
			$socjalizm[$demokracja] = " ";
		    
		    foreach($trki as $tr) 
			{
				 $socjalizm[$demokracja] = $socjalizm[$demokracja].$tr->children($x)." ";  
			}
			$demokracja++;
		}
	
		//PONIEDZIALEK
		$html -> load($socjalizm[2]);
		$poniedzialek = $html->find('.l');
		
		$tak=0;
		 
		foreach($poniedzialek as $spam) 
		{
			$czesc = strip_tags($spam);		

			$przed = $spam->find('.p');
			
			$przedmiot  = " ";
			
			if(isset($przed[0]))
			{
				$przedmiot = $przed[0]->plaintext;
								
				if(isset($przed[1]))
				{
					$przedmiot = $przed[0]->plaintext." ".$przed[1]->plaintext;
				}
			}

			$nauczyciel  = " ";
			$sala = " ";

			if ($czesc!="&nbsp;") 
			{	
				$wtf = $spam->find('.n');
				$skin = $spam->find('.s');

				if(isset($wtf[0]))
				{
					$sala = $skin[0]->plaintext;
					$nauczyciel = $wtf[0]->plaintext;
								
					if(isset($wtf[1]))
					{
						$sala = $skin[0]->plaintext." ".$skin[1]->plaintext;
						$nauczyciel = $wtf[0]->plaintext." ".$wtf[1]->plaintext;
					}
				}
			}

			$nazwa = $html2->find('.tytulnapis');
			$nazwa3 = $nazwa[0]->plaintext." ";
			$nazwa2 = explode(" ", $nazwa3);
			$dzialaj =  $nazwa2[0];
				
			$dzien=1;

			$baza->exec("INSERT INTO plan (klasa,przedmiot,dzien,godzina,nauczyciel,sala) VALUES ('$dzialaj','$przedmiot','$dzien','$tak','$nauczyciel','$sala')");			 
					
			$tak++;
		} 
		
		//WTOREK			
	    $html -> load($socjalizm[3]);
		$wtorek = $html->find('.l');

		$tak=0;
		
		foreach($wtorek as $spam) 
	    {
		    $czesc = strip_tags($spam);

		    $przed = $spam->find('.p');
			
			$przedmiot  = " ";
			
			if(isset($przed[0]))
			{
				$przedmiot = $przed[0]->plaintext;
								
				if(isset($przed[1]))
				{
					$przedmiot = $przed[0]->plaintext." ".$przed[1]->plaintext;
				}
			}

		    $nauczyciel  = " ";
			$sala = " ";
			
			if ($czesc!="&nbsp;") 
			{	
				$wtf = $spam->find('.n');
				$skin = $spam->find('.s');

				if(isset($wtf[0]))
				{
					$sala = $skin[0]->plaintext;
					$nauczyciel = $wtf[0]->plaintext;
								
					if(isset($wtf[1]))
					{
						$sala = $skin[0]->plaintext." ".$skin[1]->plaintext;
						$nauczyciel = $wtf[0]->plaintext." ".$wtf[1]->plaintext;
					}
				}
			}

		    $nazwa = $html2->find('.tytulnapis');
			$nazwa3 = $nazwa[0]->plaintext." ";
			$nazwa2 = explode(" ", $nazwa3);
			$dzialaj =  $nazwa2[0];

			$dzien=2;

			$baza->exec("INSERT INTO plan (klasa,przedmiot,dzien,godzina,nauczyciel,sala) VALUES ('$dzialaj','$przedmiot','$dzien','$tak','$nauczyciel','$sala')");	
			$tak++;
		}
		
		//SRODA		
		$html -> load($socjalizm[4]);
		$sroda = $html->find('.l');

		$tak=0;

		foreach($sroda as $spam) 
		{
		    $czesc = strip_tags($spam);

		    $przed = $spam->find('.p');
			
			$przedmiot  = " ";
			
			if(isset($przed[0]))
			{
				$przedmiot = $przed[0]->plaintext;
								
				if(isset($przed[1]))
				{
					$przedmiot = $przed[0]->plaintext." ".$przed[1]->plaintext;
				}
			}

		    $nauczyciel  = " ";
			$sala = " ";
			
			if ($czesc!="&nbsp;") 
			{	
				$wtf = $spam->find('.n');
				$skin = $spam->find('.s');

				if(isset($wtf[0]))
				{
					$sala = $skin[0]->plaintext;
					$nauczyciel = $wtf[0]->plaintext;
								
					if(isset($wtf[1]))
					{
						$sala = $skin[0]->plaintext." ".$skin[1]->plaintext;
						$nauczyciel = $wtf[0]->plaintext." ".$wtf[1]->plaintext;
					}
				}
			}

		    $nazwa = $html2->find('.tytulnapis');
			$nazwa3 = $nazwa[0]->plaintext." ";
			$nazwa2 = explode(" ", $nazwa3);
			$dzialaj =  $nazwa2[0];
	 
			$dzien=3;

			$baza->exec("INSERT INTO plan (klasa,przedmiot,dzien,godzina,nauczyciel,sala) VALUES ('$dzialaj','$przedmiot','$dzien','$tak','$nauczyciel','$sala')");	
			
			$tak++;
		}
				
		//CZWARTEK
		$html -> load($socjalizm[5]);
		$czwartek = $html->find('.l');

		$tak=0;

		foreach($czwartek as $spam) 
		{
		    $czesc = strip_tags($spam);

		    $przed = $spam->find('.p');
			
			$przedmiot  = " ";
			
			if(isset($przed[0]))
			{
				$przedmiot = $przed[0]->plaintext;
								
				if(isset($przed[1]))
				{
					$przedmiot = $przed[0]->plaintext." ".$przed[1]->plaintext;
				}
			}

			$nauczyciel  = " ";
			$sala = " ";
			
			if ($czesc!="&nbsp;") 
			{	
				$wtf = $spam->find('.n');
				$skin = $spam->find('.s');

				if(isset($wtf[0]))
				{
					$sala = $skin[0]->plaintext;
					$nauczyciel = $wtf[0]->plaintext;
								
					if(isset($wtf[1]))
					{
						$sala = $skin[0]->plaintext." ".$skin[1]->plaintext;
						$nauczyciel = $wtf[0]->plaintext." ".$wtf[1]->plaintext;
					}
				}
			}

		    $nazwa = $html2->find('.tytulnapis');
			$nazwa3 = $nazwa[0]->plaintext." ";
			$nazwa2 = explode(" ", $nazwa3);
			$dzialaj =  $nazwa2[0];

		    $dzien=4;

			$baza->exec("INSERT INTO plan (klasa,przedmiot,dzien,godzina,nauczyciel,sala) VALUES ('$dzialaj','$przedmiot','$dzien','$tak','$nauczyciel','$sala')");	
			
			$tak++;
		}
				
		//PIATEK
		$html -> load($socjalizm[6]);
		$piatek = $html->find('.l');

		$tak=0;

		foreach($piatek as $spam) 
		{
			$czesc = strip_tags($spam);

			$przed = $spam->find('.p');
			
			$przedmiot  = " ";
			
			if(isset($przed[0]))
			{
				$przedmiot = $przed[0]->plaintext;
								
				if(isset($przed[1]))
				{
					$przedmiot = $przed[0]->plaintext." ".$przed[1]->plaintext;
				}
			}

		    $nauczyciel  = " ";
			$sala = " ";
			
			if ($czesc!="&nbsp;") 
			{	
				$wtf = $spam->find('.n');
				$skin = $spam->find('.s');

				if(isset($wtf[0]))
				{
					$sala = $skin[0]->plaintext;
					$nauczyciel = $wtf[0]->plaintext;
								
					if(isset($wtf[1]))
					{
						$sala = $skin[0]->plaintext." ".$skin[1]->plaintext;
						$nauczyciel = $wtf[0]->plaintext." ".$wtf[1]->plaintext;
					}
				}
			}

		 	$nazwa = $html2->find('.tytulnapis');
			$nazwa3 = $nazwa[0]->plaintext." ";
			$nazwa2 = explode(" ", $nazwa3);
			$dzialaj =  $nazwa2[0];

			$dzien=5;
					 
			$baza->exec("INSERT INTO plan (klasa,przedmiot,dzien,godzina,nauczyciel,sala) VALUES ('$dzialaj','$przedmiot','$dzien','$tak','$nauczyciel','$sala')");	
			
			$tak++;
		}	
	}
?>