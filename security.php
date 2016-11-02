<?php
if ( !isset($_SESSION["id"]))
{
   echo "U bent niet ingelogd, U wordt doorgestuurd naar de inlogpagina";
   header("Refresh: 4; url=index.php?content=login_form");
   exit();
}
if ( !(strcmp($_SESSION["userrole"], $userrole) == 0) )
{
   echo "U heeft niet de juiste gebruikersrol voor deze pagina.";
   header("Refresh: 4; url=index.php?content=home");
   exit();
}

?>