<?php
 include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
          <script src="https://kit.fontawesome.com/7cb0e7c261.js" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="enregistrer.php" class="btn btn-danger"> enregistrer</a>
    

<br>
<!-- barre de recherche -->
 <br>
            <br>
             <form action="index.php" method="POST">
              <label style="margin-left:15px;" class="h4"> <b>recherche : </b></label>
              <input type="search" name="recherche" id="recherche" style="whidth:100px;border-radius:10px;"  placeholder="Search">
              <input type="submit" value="rechercher" name="rechercher" class="btn btn-secondary">

                <?php
                $conn = new PDO("mysql:host=localhost;dbname=centre_de_formation",'root','');
if(isset($_POST['rechercher'])){
  $recherche = $_POST['recherche'];
  $sth = $conn->prepare( "SELECT * FROM `list_of_centres` WHERE B  ='$recherche' ");
  $sth->setFetchMode(PDO:: FETCH_OBJ);
  $sth->execute();

  if($row = $sth->fetch()){
    ?>
    <br><br><br>
  <table class="table table-responsive table-bordered  "  >
        <tr class ="bg-dark text-light">

          <th style="margin:15px;">nom du centre   </th>
          <th style="margin:15px;">responsable du centre   </th>
      </tr>
      
      <?php ?>   
          <td style="margin-left:15px;">   <?php echo $row->A;?></td>
          <td style="margin-left:15px;">   <?php echo $row->B;?></td>
      <?php }?>
      
    </table> 
    <?php
  }else{
    echo"nous n'avons pas trouver $recherche";
  }

?>
            <!-- barre de recherche -->



<p></p>
<br>
<span>affichage des element de la base de donnees</span>

<p></p>
<br>

     <!-- affichage des elements de la table -->      
        <div >
          <?php

          $result = mysqli_query($con, "SELECT * FROM list_of_centres");

          echo "
    <table class=\"table table-responsive table-bordered  \"  >
        <tr class =\"bg-dark text-light\">
            <th> LE CENTRE</th>
            <th>RESPONSABLE DU CENTRE</th>
        </tr>";

        while ($row = mysqli_fetch_array($result)) {
            // echo "<tr >";
            echo "<td>" . $row['A'] . "</td>";
            echo "<td>" . $row['B'] . "</td>";
            
            echo "</tr>";
        }
          echo "</table>";
        //  mysqli_close($con);
       ?>
        </div>
      </div>
    </div>

</body>
</html>