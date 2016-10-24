<?php
   if ( isset($_POST["submit"]) )
   {
         // Maak contact met mysql-server en database
         include("./connect_db.php");

         // Maak een query die het record behorende bij het meegegeven id selecteerd.
         $sql = "SELECT * FROM `users` WHERE `id` = ".$_POST["id"];

         // Vuur de query af op de database
         $result = mysqli_query($conn, $sql);

         // Zet de resource om naar een associatief array
         $record = mysqli_fetch_array($result, MYSQLI_ASSOC);

         echo "Password uit de database: ".$record["password"]."<br>";
         echo "Meegegeven Password: ".$_POST["pw"];
         if (!strcmp($_POST["pw"], $record["password"]))
         {
               echo "De passwords zijn gelijk";
         }
         else
         {
               echo "U heeft geen rechten op deze pagina, u wordt doorgestuurd naar de homepage";
               header("refresh: 400; url=index.php?content=home");
         }
   }
   else
   {
?>
<h2>Wijzig uw wachtwoord</h2>
<form action="./index.php?content=activate" method="post">
   <table>
      <tr>
         <td>Wachtwoord:</td>
         <td><input type="password" name="password" required></td>
      </tr>
      <tr>
         <td>Tik opnieuw in:</td>
         <td><input type="password" name="verification_password" required></td>
      </tr>
      <tr>
         <td></td>
         <td><input type="submit" name="submit" value="wijzig!"></td>
      </tr>
      <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
      <input type="hidden" name="pw" value="<?php echo $_GET["pw"]; ?>">
   </table>
</form>
<?php
   }
?>