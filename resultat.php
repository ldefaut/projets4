<?php
require('header.php');
$Result = isset($_POST["Result"]) ? $_POST["Result"] : NULL;

?>
<br/>
<h3>Vous avez eu un score de <?php echo $Result ?>/10 </h3>

<?php 
require('footer.php');
?>
