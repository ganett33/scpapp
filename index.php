<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="css/style.css">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>SCP Foundation</title>
  </head>
  <body>
      <div background></div>
   <?php include "app/connection.php" ?>

  <!-- Navigation Top -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
  <a class="navbar-brand" href="index.php">
    <img src="images/logo.png" width="40" height="40" class="d-inline-block align-top" alt="logo" loading="lazy">
    SCP Foundation  
    </a>
    <form class="form-inline my-1 my-lg-0">
      <a class="btn btn-outline-info" href="form.php">New Data</a>
      <input class="form-control mr-sm-1" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-1 my-sm-0" type="submit">Search</button>
      
    </form>

    </div>
    </nav>

  <!-- Navigation Bottom -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

 
        <!--  run php loop trru db and display page names here -->
          <?php foreach($result as $page): ?>

          <li class="nav-item active">
            <a href="index.php?page='<?php echo $page['pg']; ?>'" class="nav-link"><?php echo $page['pg']; ?></a>
          </li>

          <?php endforeach; ?>
      
    </ul>      
    
  </div>
  </nav>
  <div class="container">
    <!-- Database content here -->
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 bg-light">
  <?php
     if(isset($_GET['page']))
     {
       // Remove signle quotes from page get value
       $pg = trim($_GET['page'],"'");

       // Run sql command to select record based on get value
       $record = $connection->query("select * from pages where pg='$pg'") or die($connection->error());
       
       // Convert $record into an array for us to echo out the individual fields on screen.
       $row = $record->fetch_assoc();

       // Create variable that hold data from all table field       
       $pg = $row['pg'];
       
       $oc = $row['oc'];
       
       $scp = $row['scp'];
       
       $des = $row['des'];


       $ref = $row['ref'];

       $addn = $row['addn'];

       $img1 = $row['img1'];
       $img2 = $row['img2'];

       // variable to hold our update and delete url strings
       $id = $row['id'];
       $update ="update.php?update=" . $id;
       $delete ="app/connection.php?delete=" . $id;



       // Display information on screen
       echo "
             <h2>Item</h2>
             <p>{$pg}</p> 
             <h2>Object Class</h2>             
             <p>{$oc}</p>
             <p><img src='{$img1}' width='40%'></p>
             <h2>Special Containment Procedures</h2>               
             <p>{$scp}</p>
             <h2>Description</h2>             
             <p>{$des}</p>
             <h2>Reference</h2>             
             <p>{$ref}</p>
             <p><img src='{$img2}' width='40%' ></p>
             <h2>Addendum</h2>               
             <p>{$addn}</p>
             <br>
             <br>
             

       ";

       // Display update and delete buttons
       echo "
       <hr>
       <p>
       <a href='{$update}' class='btn btn-warning'>Update</a>
       <a href='{$delete}' class='btn btn-danger'>Delete</a>
       </p>
       
       
       ";


     }
     else
     {
       // if this is the first time this page has been accessed, display content below
       echo "
         <h1 class='text-center'>Welcome to SCP FOUNDATION</h1>
         <p class='text-center'>Use the links above to view pages stored in the database</p>
         <br><br>
         <p class='text-center'><img src='images/logo.png'></p>               
       ";
     }
    
  ?>                
                                           
      
  </div>            
</div>

  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
  <div class="container">
   <div class="row">
    <div class="col-6 col-md-4">
    <img src="images/logoW.png" width="40" height="40" class="d-inline-block align-top" alt="logo" loading="lazy">
      <h6 class="d-block mb-3 text-white">SPC Foundation</h6>
    </div>
    <div class="col-6 col-md-4">
      <h6 class="text-white">Toi-ohomai COMP5210</h6>
      <ul class="list-unstyled text-small">
        <li><a class="text-white" > Web Application Implementation </a></li>
      </ul>
    </div>
    <div class="col-6 col-md-4">
      <h6 class="text-white"> &copy; Jongbo Lee (30001192) </h6>
    </div>
  </div>
  </div>
</footer>

    <script src="scripts/scripts.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>