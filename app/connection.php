<?php

    // Database credentials
    $user = "a3000119_scpUser2";
    $pw = "Toiohomai";
    $db = "a3000119_scp2";

    // Database connection object (address, user, pw, db)
    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));


    // Creative variable that stores all records from our database
    $result = $connection->query("select * from pages") or die($connection->error());

    // First check if form has been submited with data
    if(isset($_POST['submit']))
    {
        // Create variable from our posted from values
        
        $pg = mysqli_real_escape_string($connection, $_POST['pg']);
        
        $oc = mysqli_real_escape_string($connection, $_POST['oc']);       
        
        $scp = mysqli_real_escape_string($connection, $_POST['scp']);

        $des = mysqli_real_escape_string($connection, $_POST['des']);
        
        $ref = mysqli_real_escape_string($connection, $_POST['ref']);

        $addn = mysqli_real_escape_string($connection, $_POST['addn']);        

        $img1 = mysqli_real_escape_string($connection, $_POST['img1']); 
        $img2 = mysqli_real_escape_string($connection, $_POST['img2']); 

        // Create an insert command
        $sql = "insert into pages(pg, oc, scp, des, ref, addn, img1, img2)
        values('$pg', '$oc', '$scp', '$des','$ref', '$addn', '$img1', '$img2')";

        // Display success or error message on screen
        if($connection->query($sql) === TRUE)
        {
            echo "
                <h1>Record added successfully</h1>
                <p><a href='../index.php'>Back to index page</p>
            ";
        }
        else
        {
            echo "
                <h1>Error submitting data</h1>
                <p>{$connection->error()}</p>
                <p><a href='../index.php'>Back to index page<p>
            ";
        }         
    }

    if(isset($_GET['delete']))
    { 
        $id = $_GET['delete'];

        // Create delete sql command
        $del = "delete from pages where id=$id";

        // Run the command and then display appropriate success or error messages
        if($connection->query($del) === TRUE)
        {
            echo "<p>Record was deleted. <a href='../index.php'>Return to Index Page</a></p>";
        }
        else
        {
            echo "
                <p>There was an error deleting this record.</p>
                <p{$connection->error()}></p>
                <p><a href='../index.php'>Back to index page</a></p>
            ";
        }            

    }

    // Update form check if update update button has been clicked
    if(isset($_POST['update']))
    {
        // Create variable from our posted from values
        
        $id = mysqli_real_escape_string($connection, $_POST['id']);       

        $pg = mysqli_real_escape_string($connection, $_POST['pg']);
        
        $oc = mysqli_real_escape_string($connection, $_POST['oc']);       
        
        $scp = mysqli_real_escape_string($connection, $_POST['scp']);

        $des = mysqli_real_escape_string($connection, $_POST['des']);
        
        $ref = mysqli_real_escape_string($connection, $_POST['ref']);

        $addn = mysqli_real_escape_string($connection, $_POST['addn']);        

        $img1 = mysqli_real_escape_string($connection, $_POST['img1']); 
        $img2 = mysqli_real_escape_string($connection, $_POST['img2']); 

        // Create an update command
        $update = "
                update pages set pg='$pg', oc='$oc', scp='$scp', des='$des',  
                ref='$ref', addn='$addn', img1='$img1', img2='$img2'
                where id='$id'        
        ";

        // Display success or error message on screen
        if($connection->query($update) === TRUE)
        {
            echo "
                <h1>Record updated successfully</h1>
                <p><a href='../index.php'>Back to index page</p>
            ";
        }
        else
        {
            echo "
                <h1>Error updating data</h1>
                <p>{$connection->error()}</p>
                <p><a href='../index.php'>Back to index page<p>
            ";
        }         
    }

?>