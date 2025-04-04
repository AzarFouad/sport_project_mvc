<?php
$_SESSION['loc'] = "index";

?>
<!-- Introduction avant le diaporama -->
 <?php if (isset($_SESSION['email'])){?>
    <div class="introduction">
    <h1>Bienvenue dans notre communauté sportive <?php echo(htmlspecialchars($_SESSION['prenom']))?> !</h1>
    <p>Que vous soyez un athlète ou un amateur, nos centres vous attendent pour vous offrir des expériences mémorables.</p>
</div>
 <?php }
 else{
 ?>
 
<div class="introduction">
    <h1>Bienvenue dans notre communauté sportive !</h1>
    <p>Que vous soyez un athlète ou un amateur, nos centres vous attendent pour vous offrir des expériences mémorables.</p>
</div>
<?php } ?>
<?php
include("diapo.php");
include("carte.php");



?>