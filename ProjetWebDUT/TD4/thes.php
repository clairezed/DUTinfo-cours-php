<?php
require 'header.php'
?>
	
	<div class="h1thes">
		<h1> Les meilleurs thés du monde dans une sélection exclusive !</h1>
		<section class="thessoustitre">
			<div class="textethes">
				<h2>A l'honneur ce mois-ci dans votre boutique : </h2>
			</div>
		</section>
		<section class="thes">
			<div class="textethes">
					<?php
						require 'Admin/bin/params.php';
						mysql_connect($host,$user,$password) or die('Erreur de connexion au SGBD.');
						mysql_query("SET NAMES 'utf8'");
						mysql_select_db($base) or die('La base de données n\'existe pas');
						$query='SELECT * FROM thes';
						$r=mysql_query($query);
						mysql_close();
						while($a=mysql_fetch_object($r))
						{
							$id = $a->id_the;
							$nom = $a->nom;
							$description = $a->description;
							$prix = $a->prix;
							$quantite = $a->quantite;
							$type = $a->type;
							$image = $a->image;
							echo"<div class=\"fondthe\">
								<div class =\"descriptionthe\">
									<h3> Notre thé $type </h3>
									<p>
										$nom
									</p>
									<p class=\"descriptif\">
										$description
									</p>
									<p class=\"descriptif\">
										Prix : $prix € les 100g
									</p>
									<p class=\"descriptif\">
										Quantité en stock : $quantite
									</p>
								</div>
								<img id=\"imgthepromo\" src=\"$image\" />
							</div>";
						}
						echo '</table>';
					?>
			</div>
        </section>
	</div>
	</body>
</html>