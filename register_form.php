<?php
   if (isset($_POST["submit"]))
   {
      //var_dump($_POST);
      
   }
?>
<h3>Registreer formulier</h3>
<!-- voornaam, tussenvoegsel, achternaam, emailadres, submitknop verplichte velden-->

<form action="./index.php?content=register_form"  method="post">
      <table>
         <tr>
            <td>Voornaam: </td>
            <td><input type="text" name="firstname" required></td>
         </tr>
         <tr>
            <td>Tussenvoegsel: </td>
            <td><input type="text" name="infix"></td>
         </tr>
         <tr>
            <td>Achternaam: </td>
            <td><input type="text" name="lastname" required></td>
         </tr>
         <tr>
            <td>E-mail: </td>
            <td><input type="text" name="email" required></td>
         </tr>
         <tr>
            <td></td>
            <td><input type="submit" name="submit" required></td>
         </tr>
      </table>
</form>