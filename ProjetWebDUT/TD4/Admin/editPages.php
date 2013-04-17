<?php
session_start();

if (!isset($_SESSION['admin']) && $_SESSION['admin'] == false)
    header('location:connectForm.php');
?>

<?php
require 'header.php'
?>


<?php
if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 1;
require 'bin/params.php';
mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
mysql_query("SET NAMES 'utf8'");
mysql_select_db($base) or die('La base de données n\'existe pas');
$query = "SELECT * FROM pages WHERE ID=$page";
$r = mysql_query($query);
if ($a = mysql_fetch_object($r)) {
    $titre = $a->titre;
    $texte = $a->texte;
    $image = $a->image;
}
?>

<div class="ajout">
    <h2>Modifier une page</h2>
    <form action="updatePages.php" method="post">
        <div class="formulaire3">
            <p class="label">Titre :</p>
            <input class="champ" name="titre" type="text" value="<?php echo"$titre" ?>"/><br/>
        </div>
        <div class="formulaire3">
            <p class="label">Texte :</p>
            <textarea name="texte" cols="50" rows="10"><?php echo"$texte" ?></textarea>
        </div>
        <input type="hidden" name="page" value="<?php echo"$page" ?>"/>
        <input type="submit" value="Modifier"/><br/>
    </form>

    <form action="uploadImage.php" enctype="multipart/form-data" method="post">
        <div class="formulaire3">
            <p class="label">Image : </p>
            <input name="datafile" size="30" type="file">
            <input type="hidden" name="page" value="<?php echo"$page" ?>"> <br/>
        </div>  
        <input type="submit" value="modifier l'image">
    </form>

    <form action="deleteImage.php" method="post">
        <div class="formulaire3">
            <input type="hidden" name="page" value="<?php echo"$page" ?>"> <br/>
            <input type="submit" value="supprimer l'image">
        </div>  
    </form>
</div>

<div class="apercu">
    <div class="h1accueil">
        <h1> <?php echo "$titre" ?></h1>
        <section class="presentation">
            <img id="imagetitre" src="<?php echo "$image" ?>">
            <div class="texteaccueil">
                <!--<h2>Grâce à nous, trouvez le thé qui vous correspond !</h2>-->
                <p><?php echo "$texte" ?></p>
                <!--<p>Jetez un oeil !</p>-->
            </div>
        </section>
    </div>
    <script>
        CKEDITOR.replace('texte', {
            customConfig: '../ckeditor_config.js'
        });
    </script>
</body>

</html>