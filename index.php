<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" type="text/css" href="./css/style.css" 
   </head>
   <body>
      <div id="container">
         <div id="banner">
            <?php include("./banner.php"); ?>
         </div>
         <div id="link">
            <?php include("./link.php"); ?>
         </div>
         <div id="content">
            <?php 
               if (isset($_GET["content"]))
               {
                  $send = $_GET["content"].".php";
               }
               else{
                  $send = "content.php";
               }
               include($send); 
            ?>
         </div>
         <div id="footer">
            <?php include("./footer.php"); ?>
         </div>
      </div>
   </body>
</html>