<?php
	//On importe la base de donnée "data" depuis mysql. UTF-8 , identifiant et mot de passe.
	$bddBotik = new PDO('mysql:host=localhost;dbname=data;charset=utf8', 'root', '');
	// On affiche toutes les données disponibles pour chaque série.
	$rep = $bddBotik->query('SELECT * FROM sudriabotik ORDER BY english_date');
	//On affiche pour chaques évenement: son image, son titre, sa date et l'article associé.
	$count = 0; //Ce compteur permet d'attribuer la classe "selected" au premier élément chargé.
	$today = date("Y-m-d");
	while($frep = $rep->fetch())
	{
		if(($today <= $frep['english_date']) && ($count == 0))
		{
			echo 
			'<li class="selected" data-date="'.$frep['date_event'].'">
				<div class="timeline_resume">
					<h2>'.$frep['titre'].'</h2>
					<em>'.$frep['date_event'].'</em>
					<em>'.$frep['dates cr'].'</em>
					<p>'.$frep['classement'].'</p>
					<p>'.$frep['article'].'</p>
					<p>'.$frep['president'].'</p>
				</div>';
			if($frep['dates cr'] != NULL)
			{
				echo'
				<div class="timeline_resume">
					<div class="btn-bg bg-3">
	    				<div class="btn btn-3">
	      					<button onclick="affichage(`'.$frep['intitule2'].'`)">En savoir plus</button>
	    				</div>
	  				</div>
  				</div>
	  			<div class ="'.$frep['intitule2'].'" style="display: none;">';
	  				require "html/".$frep['intitule'].".html";
	  			echo '
	  				<div class="btn-bg bg-3">
	    				<div class="btn btn-3">
	      					<button onclick="effacement(`'.$frep['intitule2'].'`)">Précédent</button>
	    				</div>
	  				</div>
	  			</div>';
			}
			echo '</li>';
			$count++;
		}
		else
		{
			echo 
			'<li data-date="'.$frep['date_event'].'">
				<div class="timeline_resume">
					<h2>'.$frep['titre'].'</h2>
					<em>'.$frep['date_event'].'</em>
					<em>'.$frep['dates cr'].'</em>
					<p>'.$frep['classement'].'</p>
					<p>'.$frep['article'].'</p>
					<p>'.$frep['president'].'</p>
				</div>';
			if($frep['dates cr'] != NULL)
			{
				echo'
				<div class="timeline_resume">
					<div class="btn-bg bg-3">
	    				<div class="btn btn-3">
	      					<button onclick="affichage(`'.$frep['intitule2'].'`)">En savoir plus</button>
	    				</div>
	  				</div>
				</div>
	  			<div class ="'.$frep['intitule2'].'" style="display: none;">';
	  				require "html/".$frep['intitule'].".html";
	  			echo '
					<div class="btn-bg bg-3">
	    				<div class="btn btn-3">
	      					<button onclick="effacement(`'.$frep['intitule2'].'`)">Précédent</button>
	    				</div>
	  				</div>
	  			</div>';
			}
			echo '</li>';
		}
	}
?>		