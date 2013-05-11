<?php

    function truncate($string, $length = 80, $etc = '...',
                                      $break_words = false, $middle = false)
    {
        if ($length == 0)
            return '';

        if (strlen($string) > $length) {
            $length -= min($length, strlen($etc));
            if (!$break_words && !$middle) {
                $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
            }
            if(!$middle) {
                return substr($string, 0, $length) . $etc;
            } else {
                return substr($string, 0, $length/2) . $etc . substr($string, -$length/2);
            }
        } else {
            return $string;
        }
    }
?>

<?php
require 'header.php'
?>
	
	<div id="promotion">
		<h1>Nos promotions inratables du moment</h1>
		<section id="listeThes">
                    <ul>
                        <?php
                            require 'Admin/bin/params.php';
                            mysql_connect($host,$user,$password) or die('Erreur de connexion au SGBD.');
                            mysql_query("SET NAMES 'utf8'");
                            mysql_select_db($base) or die('La base de données n\'existe pas');
                            $query='SELECT * FROM thes WHERE promotion > 0';
                            $r=mysql_query($query);
                            mysql_close();
                            while($a=mysql_fetch_object($r))
                            {
                                $id = $a->id_the;
                                $nom = $a->nom;
                                $description = $a->description;
                                $prix = $a->prix;
                                $promo = $a->promotion;
                                $image = $a->image;
                                $description = truncate($description);
                                $reduction = $prix * $promo / 100 ;
                                $prix_promo = $prix - $reduction;
                                $prix_promo = number_format($prix_promo, 2);
                                echo "
                                    <li>
                                        <div class=\"promo-contenu\">
                                            <img class=\"imgthepromo\" src=\"Admin/$image\" alt=\"$nom\"/>
                                            <div class=\"txt\">
                                                <h3>$nom</h3>
                                                <p class=\"descriptif\">$description</p>
                                                <p><a href=\"thes.php\">En savoir plus</a> </p>
                                            </div>
                                        </div>
                                        <div class=\"promo-prix\">
                                            <p>$promo % de réduction !</p>
                                            <p class =\"prix-promo\">$prix_promo €</p>
                                            <p>Avant : $prix €</p>
                                        </div>
                                    </li>
                                    ";
                            }
                        ?>
                    </ul>
                </section>
        </div>
</body>
</html>