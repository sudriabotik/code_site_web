<?php
	$today = date("Y-m-d");
	$count=0;
	$nb_element=0;
	$element_futur = false;

	$bddBotik = new PDO('mysql:host=sudriaboxdbotik.mysql.db;dbname=sudriaboxdbotik;charset=utf8', 'sudriaboxdbotik', 'B0tik01Sudria');
	$rep = $bddBotik->query('SELECT * FROM sudriabotik ORDER BY english_date');


	while($frep=$rep->fetch())
	{
		if ($today<= $frep['english_date'])
		{
			$element_futur= true;
			
		}
		$nb_element++;
	}

	$rep = null;
	$frep = null;

	$rep = $bddBotik->query('SELECT * FROM sudriabotik ORDER BY english_date');

	for ($i=$nb_element; $i>0; $i--)
	{
		$frep = $rep->fetch();

		if($element_futur == true) //on a au moins 1 element a venir
		{ //echo 'element+';
			if(($today <= $frep['english_date']) && ($count == 0)) 
			{
				echo '<li><a href=#0 data-date="'.$frep['date_event'].'" class="selected">'.$frep['intitule'].'</a></li>
				';
				$count++;
			}
			else{
				echo '<li><a href=#0 data-date="'.$frep['date_event'].'">'.$frep['intitule'].'</a></li>
				';
			}
		}
		else //il n'y a pas d'evenement a venir
		{ //echo 'element-';
			if ($i == 1)
				echo '<li><a href=#0 data-date="'.$frep['date_event'].'" class="selected">'.$frep['intitule'].'</a></li>
			';
			else
				echo '<li><a href=#0 data-date="'.$frep['date_event'].'">'.$frep['intitule'].'</a></li>
			';
		}

	}
/*
echo $nb_element;
	$rep = null;
	$frep = null;

	$rep = $bddBotik->query('SELECT * FROM sudriabotik ORDER BY english_date');

	for ($i=$nb_element; $i>0; $nb_element--)
	{
		$frep = $rep->fetch();
		if ($i == 1)
			echo '<li><a href=#0 data-date="'.$frep['date_event'].'" class="selected">'.$frep['intitule'].'</a></li>
			';
		else
			echo '<li><a href=#0 data-date="'.$frep['date_event'].'">'.$frep['intitule'].'</a></li>
			';
	}
*/
/*
	//On importe la base de donnée "data" depuis mysql. UTF-8 , identifiant et mot de passe.
	$bddBotik = new PDO('mysql:host=sudriaboxdbotik.mysql.db;dbname=sudriaboxdbotik;charset=utf8', 'sudriaboxdbotik', 'B0tik01Sudria');
	// On affiche toutes les données dates disponibles du tableau sudriabotik, de la colonne date_event.
	$rep = $bddBotik->query('SELECT * FROM sudriabotik ORDER BY english_date');
	$count = 0; //Ce compteur permet d'attribuer la classe "selected" au premier élément chargé.
	$today = date("Y-m-d");
	while($frep = $rep->fetch())
	{
		if(($today <= $frep['english_date']) && ($count == 0)) 
		{
			echo '<li><a href=#0 data-date="'.$frep['date_event'].'" class="selected">'.$frep['intitule'].'</a></li>
			';
			$count++;
		}
		else{
			echo '<li><a href=#0 data-date="'.$frep['date_event'].'">'.$frep['intitule'].'</a></li>
			';
		}

	}
*/
?>