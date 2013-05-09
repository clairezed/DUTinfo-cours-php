<?php
session_start();

if (!isset($_SESSION['admin']) && $_SESSION['admin'] == false)
    header('location:connectForm.php');
?>

<?php
require 'header.php';
?>

<?php
require 'bin/params.php';
mysql_connect($host, $user, $password) or die('Erreur de connexion au SGBD.');
mysql_query("SET NAMES 'utf8'");
mysql_select_db($base) or die('La base de données n\'existe pas');
?>

<div class="ajout">
     <h2>Promotions</h2>
     <div class="formulaire3">
     <form action="editPromo.php" method="post">
         <p class="label">Thé :</p>
         <select class="champ" name="the">

<?php
$query = "SELECT * FROM thes";
$reponse = mysql_query($query);
mysql_close();
    
while($donnees = mysql_fetch_object($reponse))
{
    $id = $donnees->id_the;
    $nom = $donnees->nom;
?>
    <option value="<?php echo "$id"; ?>"> <?php echo "$nom"; ?></option>
<?php
}
?>
    
        </select>
    </div>
    <input class="formButton" type="submit" value="Valider"/><br/>
    </form>
</div>

<?php
//$OK = isset($_POST['OK']) ? $_POST['OK'] : '';

if(isset($_POST['the'])) {
//    $choix=$_POST['the'];
//    $query = "SELECT * FROM thes where id_the = $choix";
//    $reponse = mysql_query($query);
//    if ($a = mysql_fetch_object($reponse)) {
//        $nom = $a->nom;
//    }
//    echo "<br>Votre choix est : ",$nom;
//    mysql_close();

    $id = $_POST['the'];

?>

    <div class="ajout">
        <h2>Choix du taux de réduction</h2>
        <form action="updatePromo.php" method="post">
            <div class="formulaire3">
                <p class="label">Taux de réduction :</p>
                <select class="champ" name="promo">
                     <option value="0">0%</option>
                     <option value="5">5%</option>
                     <option value="10">10%</option>
                     <option value="15">15%</option>
                     <option value="20">20%</option>
                     <option value="25">25%</option>
                     <option value="30">30%</option>
                     <option value="35">35%</option>
                     <option value="40">40%</option>
                     <option value="45">45%</option>
                     <option value="50">50%</option>
                </select>
                <input type="hidden" name="id" value="<?php echo"$id" ?>">
            </div>
            <input class="formButton" type="submit" value="Valider"/><br/>
        </form>
    </div>
   
  
<?php
}
?>

</body>
</html>