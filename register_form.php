<?php
   if (isset($_POST["submit"]))
   {
      //var_dump($_POST);
      include("./connect_db.php");

      $first3OfFirstname = substr($_POST["firstname"], 0, 3);
      $last4OfLastname = substr($_POST["lastname"], (strlen($_POST["lastname"]) - 4), 4);
      $date = date("d-m-Y H:i:s");

      $tempPassword = $first3OfFirstname.$date.$last4OfLastname;
      $tempPassword = sha1($tempPassword);
      //echo $tempPassword;


      $sql = "INSERT INTO `users` (`id`,
                                   `firstname`,
                                   `infix`,
                                   `lastname`,
                                   `email`,
                                   `password`) 
              VALUES              (NULL,
                                   '".$_POST["firstname"]."',
                                   '".$_POST["infix"]."',
                                   '".$_POST["lastname"]."',
                                   '".$_POST["email"]."',
                                   '".$tempPassword."')";
      //echo $sql;
      $result = mysqli_query($conn, $sql);

      // We vragen het id op van het pas gemaakte record uit de database. Het veld id is autonummering
      $id = mysqli_insert_id($conn);

      if ($result)
      {
         //echo "Dit is de waarde van result: ".$result;

         $to = $_POST["email"];
         $subject = "Activatielink voor inloggen";
         $message = "Geachte mevrouw/heer ".$_POST["firstname"]." ".$_POST["infix"]." ".$_POST["lastname"]."\n".
                    "Bedankt voor het registreren. Om het registratieproces \n". 
                    "te voltooien moet u op de onderstaande link klikken\n". 
                    "http://localhost/2016-2017/am1b/loginregistration/index.php?content=activate&id=".$id."&pw=".$tempPassword." \n".
                    "Met vriendelijke groet,\n".
                    "Administrator";
        mail($to, $subject, $message);


      }
      else
      {
         echo "Registreer opnieuw, registratie is niet volledig voltooid.";
         header("refresh:4; url=./index.php?content=register_form");
      }
   }
?>
<h3>Registratieformulier</h3>
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
            <td><input type="email" name="email" required></td>
         </tr>
         <tr>
            <td></td>
            <td><input type="submit" name="submit" required></td>
         </tr>
      </table>
</form>