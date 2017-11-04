<?php
	//On importe la base de donnée "data" depuis mysql. UTF-8 , identifiant et mot de passe.
	$bddBotik = new PDO('mysql:host=localhost;dbname=data;charset=utf8', 'root', '');
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

?>