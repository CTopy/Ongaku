<?php
  ini_set('session.use_trans_sid', true);
  ini_set('session.use_cookies', true);        
  ini_set('session.use_only_cookies', false);
  session_start();
  require("entete.inc.php");

  // Etape 1 : connexion au serveur de base de données
  require("param.inc.php");
  $pdo=new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS) ;
if(isset($_POST["envoi"]) && $_POST["envoi"]=="verifier") {
    // Etape 2 : envoie la requête
    $requete = "SELECT PseudoJoueur,MdpJoueur FROM JOUEURS WHERE PseudoJoueur='".addslashes($_POST["mail"])."' AND MdpJoueur='".addslashes($_POST["code"])."'";
?>
    <script type="text/javascript">window.location='paiement.php?PHPSESSID=<?php echo(session_id()); ?>'</script>
<?php
  }
  else {
?>
    <script  type="text/javascript">alert('Erreur de saisie');</script>
<?php
  }