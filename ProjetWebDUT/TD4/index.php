<?php
require 'header.php'
?>

<?php
if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 1;
require 'Admin/bin/params.php';
mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
mysql_query("SET NAMES 'utf8'");
mysql_select_db($base) or die('La base de donnees n\'existe pas');

$query = "SELECT * FROM pages WHERE ID=$page";
$r = mysql_query($query);
if ($a = mysql_fetch_object($r)) {
    $titre = $a->titre;
    $texte = $a->texte;
    $image = $a->image;
}
    mysql_close();
    ?>



    <div class="h1accueil">
        <h1> <?php echo "$titre" ?></h1>
    <section class="presentation">
        <img id="imagetitre" src="Admin/<?php echo "$image" ?>">
        <div class="texteaccueil">
            <!--<h2>Grâce à nous, trouvez le thé qui vous correspond !</h2>-->
            <p><?php echo "$texte" ?></p>
            <!--<p>Jetez un oeil !</p>-->
        </div>
    </section>
</div>
</body>
</html>
