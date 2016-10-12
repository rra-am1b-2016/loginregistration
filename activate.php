<?php
   if ( isset($_POST["submit"]) )
   {
         echo "hallo";
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
   </table>
</form>
<?php
   }
?>