<?php
session_start();

if (!isset($_SESSION['admin']) && $_SESSION['admin'] == false)
    header('location:connectForm.php');
?>

<?php
require 'header.php'
?>
                    
                    <?php
                        if(isset($_GET['page']))$page=$_GET['page'];
                            else $page=1;
                        require 'bin/params.php';
                            mysql_connect($host,$user,$password) or die('Erreur de connexion au SGBD.');
                            mysql_query("SET NAMES 'utf8'");
                            mysql_select_db($base) or die('La base de données n\'existe pas');
                            $query = "SELECT * FROM pages WHERE ID=$page";
                            $r = mysql_query($query);
                            if($a = mysql_fetch_object($r))
                            {
                                $titre = $a->titre;
                                $texte = $a->texte;
                                $image = $a->image;
                            }
                    ?>
                    
                    <div class="ajout">
                        <h2>Modifier une page</h2>
                        <form action="updatePages.php" method="post">
                            <div class="formulaire_editPages">
                                 <p class="label">Titre :</p>
                                 <input class="champ" name="titre" type="text" value="<?php echo"$titre" ?>"/><br/>
                            </div>
                            <div class="formulaire_editPages">
                                <p class="label">Texte :</p>
                                <textarea name="texte" cols="50" rows="10"><?php echo"$texte" ?></textarea>
                            </div>
                            <input type="hidden" name="page" value="<?php echo"$page" ?>"/>
                            <input type="submit" value="Se connecter"/><br/>
                        </form>
                        
                        <form action="uploadImage.php" enctype="multipart/form-data" method="post">
                              <div class="formulaire_editPages">
                                  <p class="label">Image
                              </div>  
                        </form>
                    </div>
                </body>
</html>