
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
		else //il n'y a pas d'evenement a venir
		{
			//echo 'element-';
			if($i ==1 )
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

	}

?>		