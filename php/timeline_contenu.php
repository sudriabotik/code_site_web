<?php
	//On importe la base de donnée "data" depuis mysql. UTF-8 , identifiant et mot de passe.
	$bddBotik = new PDO('mysql:host=localhost;dbname=data;charset=utf8', 'root', '');
	// On affiche toutes les données disponibles pour chaque série.
	$rep = $bddBotik->query('SELECT * FROM sudriabotik ORDER BY date_event DESC');
	//On affiche pour chaques évenement: son image, son titre, sa date et l'article associé.
	$count = 0; //Ce compteur permet d'attribuer la classe "selected" au premier élément chargé.
	while($frep = $rep->fetch())
	{
		if($count == 0)
		{
			echo 
			'<li class="selected" data-date="'.$frep['date_event'].'">
				<h2>'.$frep['titre'].'</h2>
				<em>'.$frep['date_event'].'</em>
				<p>'
					.$frep['article'].
				'</p>
			</li>';
			$count++;
		}
		else
		{
			echo 
			'<li data-date="'.$frep['date_event'].'">
				<h2>'.$frep['titre'].'</h2>
				<em>'.$frep['date_event'].'</em>
				<p>'
					.$frep['article'].
				'</p>
			</li>';
		}
	}
?>		