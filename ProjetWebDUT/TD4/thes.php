<!DOCTYPE html>
<html>
    <head>
        <title>Les promotions de la Théière, les meilleurs thés au meilleur prix</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=8" />  <!--   test comptabilite IE8-->
        <!--[if lt IE 9]>                      
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="TD1.css">
        <link rel="icon" href="favicon.ico" />
	</head>
	
	<body>
        <div class="header">
            <div class="nav">
                <h1>La Théière</h1>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="thes.php">Nos thés</a></li>
                    <li><a href="promo.html">Promotions</a></li>
                    <li><a href="contact.html">Nous contacter</a></li>
                </ul>
            </div>
        </div>
	
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