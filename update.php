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
  <h1>SCP Foundation</h1>  
  <h2>Use the form to update a page record</h2>
  <br>

  <?php
    include 'app/connection.php';        
    $id = $_GET['update'];
    $record = $connection->query("select * from pages where id=$id") or die($connection->error());
    $row = $record->fetch_assoc();          

  ?>


<!-- Form -->
<form class="form-group" method="post" action="app/connection.php">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  
  <!-- Page  -->
  <label>Item#</label>
  <br>
  <input type="text" class="form-control" name="pg" value="<?php echo $row['pg']; ?>">
  <br><br>
  
  <!-- Object Class -->
  <label>Object Class</label>
  <br>
  <input type="text" class="form-control" name="oc" value="<?php echo $row['oc']; ?>">
  <br><br>
  
  <!-- Special Containment Procedures -->
  <label>Special Containment Procedures</label>
  <br>
  <textarea type="text" class="form-control" name="scp" row="10" placeholder="<?php echo $row['scp']; ?>"><?php echo $row['scp']; ?></textarea>
  <br><br>
  
  <!-- Description -->
  <label>Description</label>
  <br>
  <textarea type="text" class="form-control" name="des" row="10" placeholder="<?php echo $row['des']; ?>"><?php echo $row['des']; ?></textarea>
  <br><br>

  <!-- Reference -->
  <label>Reference</label>
  <br>
  <textarea type="text" class="form-control" name="ref" row="10" placeholder="<?php echo $row['ref']; ?>"><?php echo $row['ref']; ?></textarea>
  <br><br> 

  <!-- Addendum -->
  <label>Addendum </label>
  <br>
  <textarea type="text" class="form-control" name="addn" row="10" placeholder="<?php echo $row['addn']; ?>"><?php echo $row['addn']; ?></textarea>
  <br><br>

  <!-- Image 1-->
  <label>Image 1</label> 
  <br>
  <input type="text" class="form-control" name="img1" value="<?php echo $row['img1']; ?>">
  <br><br>
  <hr width="100%">

  <!-- Image 2-->
  <label>Image 2</label> 
  <br>
  <input type="text" class="form-control" name="img2" value="<?php echo $row['img2']; ?>">
  <br><br>
  <hr width="100%">
  
  <input type="submit" class="btn btn-info" name="update" value="Confirm">
  
  </form>
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