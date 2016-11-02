<?php 
      $userrole = "customer";
      include("security.php");
?>

<h3>Customer Homepage</h3>
<?php echo "<h6>Uw gebruikersrol is: ".$_SESSION["userrole"]."</h6>"; ?>