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
      
      // Check of het opgegeven e-mailadres al bestaat
      $sql = "SELECT * FROM `users` WHERE `email` = '".$_POST["email"]."'";

      //echo $sql; exit();

      $result = mysqli_query($conn, $sql);

      if ( mysqli_num_rows($result) == 0)
      {
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
            $message = "<!DOCTYPE html>
                        <html>
                              <head>
                                    <title>Registratie</title>
                                    <style>
                                       body
                                       {
                                          color: green;
                                          
                                       }
                                       a 
                                       {
                                          color: yellow;
                                          font-size: 3em;
                                       } 
                                    </style>
                              </head>
                              <body>
                                  <p>Geachte mevrouw/heer ".$_POST["firstname"]." ".$_POST["infix"]." ".$_POST["lastname"]."</p>".
                                  "Bedankt voor het registreren. Om het registratieproces<br>". 
                                  "te voltooien moet u op de onderstaande link klikken<br>". 
                                  "<a href='http://localhost/2016-2017/am1b/loginregistration/index.php?content=activate&id=".$id."&pw=".$tempPassword."'>registratielink</a> <br>".
                                  "<p>Met vriendelijke groet,</p>".
                                  "Administrator                        
                              </body>
                        </html>";

            $headers = "Content-Type: text/html; charset=UTF-8"."\r\n";
            $headers .= "Cc: admin@gmail.com, root@gmail.com"."\r\n";
            $headers .= "Bcc: belastingdienst@gmail.com"."\r\n";
            $headers .= "From: admin@gmail.com";
            mail($to, $subject, $message, $headers);

            // Boodschap dat het registratieproces is voltooid
            echo "Er wordt een registratiemail gestuurd naar het door u opgegeven mailadres.";
            echo "Na het klikken op de activatielink is het registratieproces voltooid";
            header("refresh:4; url=./index.php?content=home");
            exit();

            }
            else
            {
            echo "Registreer opnieuw, registratie is niet volledig voltooid.";
            header("refresh:4; url=./index.php?content=register_form");
            }
      }
      else
      {
            echo "Het door u gekozen e-mailadres is al in gebruik, kies een ander.";
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