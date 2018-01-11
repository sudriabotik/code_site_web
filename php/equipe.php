<?php
	//On importe la base de donnée "data" depuis mysql. UTF-8 , identifiant et mot de passe.
	$bddBotik = new PDO('mysql:host=localhost;dbname=data;charset=utf8', 'root', '');
	// On affiche toutes les données disponibles pour chaque série.
	$rep = $bddBotik->query('SELECT * FROM equipe ORDER BY id');
	//On affiche pour chaques évenement: son image, son titre, sa date et l'article associé.
	while($frep = $rep->fetch())
	{
		echo 
		'<div class="col">
			<div class="animated flipInY" data-id="'.$frep['id'].'">
				<div class="container3">
					<div class="front" style="background-image: url(img/'.$frep['img'].'.jpg)">
						<div class="inner">
							<p>'.$frep['nom'].'</p>
              				<span>'.$frep['role'].'</span>
						</div>
					</div>
					<div class="back">
						<div class="inner">
						  <p>'.$frep['texte_sup'].'</p>
						  <span><br>'.$frep['texte_inf'].'</span>
						</div>
					</div>
				</div>
			</div>
		</div>';
	}
?>	