


<?php 
include("db.php");


if (isset($_POST['submit'])) {
  $q =  $conn->real_escape_string($_POST['q']);
  $column = $conn->real_escape_string($_POST['column']);

     //set default value to protect the dropdown 

	if ($column == "" || ($column != "name" && $column != "matriculation_number")) 
	  $column = "name" ;

	  $query = "SELECT * FROM student WHERE $column LIKE '%$q%'";

  	 $result = mysqli_query($conn, $query);
	

}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>PHP-App</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<style>
h1 {
	text-align:center;
	align-content: center;
}

</style>
  </head>
  <body>


    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">PHP MySQL APP</a>



      </div>
    </nav>

 <main class="container p-2">
  <div class="row">
    <div class="col-md-1">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

     
     
    </div>
   

          <?php
             if (mysqli_num_rows($result) > 0) {

?>
 <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            
            <th>Name</th>
            <th>Surname</th>
            <th>Specialty</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Matriculation</th>
            
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php


          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['surname']; ?></td>
            <td><?php echo $row['specialty']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['matriculation_number']; ?></td>
            </td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php }
}
	else { 
	  echo "<h1><strong>OOPS :) No result Found!!!	<a href='index.php'>view records</a></strong></h1>";
	 
}
 ?>
        </tbody>

      </table>
    </div>
  </div>
</main>
