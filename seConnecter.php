<?php
  ini_set('session.use_trans_sid', true);
  ini_set('session.use_cookies', true);        
  ini_set('session.use_only_cookies', false);
  session_start();
  require("entete.inc.php");


  require("param.inc.php");
  $pdo=new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS) ;
if(isset($_POST["envoi"]) && $_POST["envoi"]=="verifier") {
   
    $requete = "SELECT PseudoJoueur,MdpJoueur FROM JOUEURS WHERE PseudoJoueur='".addslashes($_POST["email"])."' AND MdpJoueur='".addslashes($_POST["motDePasse"])."'";
?>
    <script type="text/javascript">
        window.location = '  ---METTRE LIEN PAGE---  ?PHPSESSID=<?php echo(session_id()); ?>'
    </script>
    <?php
  }
  else {
?>
        <script type="text/javascript">alert('Erreur de saisie');</script>
        <?php
  }