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
            <div id="ckeditor-area">
                <textarea name="texte" cols="40" rows="10"><?php echo"$texte" ?></textarea>
            </div>
        </div>
        <input type="hidden" name="page" value="<?php echo"$page" ?>"/>
        <input class="formButton" type="submit" value="Modifier"/><br/>
    </form>
    <form action="uploadImage.php" enctype="multipart/form-data" method="post">
        <div class="formulaire3">
            <p class="label">Image : </p>
            <input  name="datafile" size="30" type="file">
            <input type="hidden" name="page" value="<?php echo"$page" ?>"> <br/>
        </div>  
        <input class="formButton" type="submit" value="Modifier l'image">
    </form>

    <form action="deleteImage.php" method="post">
        <input type="hidden" name="page" value="<?php echo"$page" ?>"> <br/>
        <input class="formButton" type="submit" value="Supprimer l'image">
    </form>
</div>

<div class="apercu">
    <div class="h1accueil">
        <h1> <?php echo "$titre" ?></h1>
        <section class="presentation">
            <img id="imagetitre" src="<?php echo "$image" ?>">
            <div class="texteaccueil">
                <p><?php echo "$texte" ?></p>
            </div>
        </section>
    </div>
</div>
<script>
    CKEDITOR.replace('texte', {
        customConfig: '../ckeditor_config.js'
    });
</script>
</body>

</html>