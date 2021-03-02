<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>

  <?php require_once'process.php';
  ?>
  
  <?php

    if(isset($_SESSION['message'])):

?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php 
echo $_SESSION['message'];
unset($_SESSION['message']);



?>

</div>

<?php endif ?>




  <div class="container">

  <?php

  $mysqli=new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));

  $result=$mysqli->query("Select * from data") or die($mysqli->error);
   ?>

     <div class="row justify-content-center">
        <table class="table">
         <thead>

         <tr>
             <th>
              Name
             </th>
             <th>Location</th>
             <th colspan="2">Action</th>
         </tr>
         </thead>

         <?php


           while($row=$result->fetch_assoc()):?>

         <tr>
             <td><?php echo $row['name'];?> </td>
             <td><?php echo $row['location'];?></td>
             <td>
              <a href="index.php?edit=<?php echo $row['id'];?>"
              class="btn btn-info">Edit
              </a>
              <a href="process.php?delete=<?php echo $row['id'];?>"
              class="btn btn-danger">Delete
              </a>


             </td>
         </tr>
           <?php endwhile; ?>

        </table>

     </div>


   <?php



  
  pre_r($result->fetch_assoc());

  function pre_r( $array){
        echo '<pre>';
        print_r($array);

        echo'</pre>';

  }

  ?>

  <div class="row justify-content-center">
    <form action="process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>"> 

        <div class="form-group">
        <label for="">Name</label>
     <input type="text"class="form-control" name="name" value="<?php echo $name;?>" placeholder="Enter Your Name"></div>
     <div class="form-group">
     <input type="text" class="form-control" name="location" value="<?php echo $location;?>" placeholder="Enter your Location" ></div>

     <div class="form-group ">

     <?php 
     if($update==true):
        ?>
     <button type="submit"class="btn btn-primary" name="update">Update</button>
    <?php else: ?>
     <button type="submit"class="btn btn-primary" name="save">Save</button>
     <?php endif; ?>

    </div>


    </form></div>

   </div>
  </body>
</html>