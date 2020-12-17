<?php
 include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="enregistrer.php" method="POST">
        <label> entrer le nom du centre</label>
            <input type="text" name="centre" id="centre">
        <label >entrer le nom du responsable de centre</label>
            <input type="text" name="responsable" id="responsable">
        
        <input type="submit" value="enregistrer" name="enregistrer">


    <?php

if (isset($_POST['enregistrer'])) {
      $centre = $_POST['centre'];
      $responsable = $_POST['responsable'];

            $sql = "INSERT INTO list_of_centres (A , B ) VALUES ('$centre', '$responsable')";

      if (mysqli_query($con, $sql)) {
         header('location: index.php');
      } else {
          echo "";
      }
  } else {
      echo "";
  }
    ?>
 
    </form>

   
</body>
</html>
