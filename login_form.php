<?php
   if (isset($_GET["email"]))
   {
      $email = $_GET["email"];
   }
   else
   {
      $email = "";
   }

   if (isset($_POST["submit"]))
   {
      // Maak contact met de mysql-server
      include("./connect_db.php");

      // Maak een select query op basis van gegeven e-mailadres en wachtwoord. 
      $sql = "SELECT * 
              FROM `users` 
              WHERE `email` = '".$_POST["email"]."'
              AND   `password` = '".sha1($_POST["password"])."'";

      //echo $sql; exit();
      // Vuur de query af op de database
      $result = mysqli_query($conn, $sql);

      if ( mysqli_num_rows($result) == 1 )
      {
         $record = mysqli_fetch_array($result, MYSQLI_ASSOC);
         //var_dump($record);
         
         $_SESSION["id"] = $record["id"];
         $_SESSION["userrole"] = $record["userrole"];

         switch($record["userrole"])
         {
            case 'customer':
               header("Location: index.php?content=customer_home");
               break;
            case 'root':
               header("Location: index.php?content=root_home");
               break;
            case 'admin':
               header("Location: index.php?content=admin_home");
               break;
            default:
               header("Location: index.php?content=home");
               break;
         }
      }
      else
      {
         echo "Uw email en wachtwoord combinatie is niet bekent in de database.<br>";
         echo "U wordt doorgestuurd naar de inlogpagina. Probeer het opnieuw";
         header("Refresh: 4; url=index.php?content=login_form");
         exit();
      }

   }

?>



<h3>Login formulier</h3>

<form action="index.php?content=login_form" method="post">
   <table>
      <tr>
         <td>e-mailadres: </td>
         <td><input type="email" name="email" required value="<?php echo $email; ?>"></td>
      </tr>
      <tr>
         <td>wachtwoord: </td>
         <td><input type="password" name="password" required autofocus></td>
      </tr>
      <tr>
         <td></td>
         <td><input type="submit" name="submit" value="inloggen!"></td>
      </tr>
   </table>
</form>