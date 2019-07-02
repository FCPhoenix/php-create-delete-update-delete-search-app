<?php
include("db.php");

    $name = '';
    $surname = '';
    $specialty = '';
    $age = '';
    $gender = '';
    $matriculation_number = '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM student WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    
    $name = $row['name'];
    $surname = $row['surname'];
    $specialty = $row['specialty'];
    $age = $row['age'];
    $gender = $row['gender'];
    $matriculation_number = $row['matriculation_number'];
   
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $specialty = $_POST['specialty'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $matriculation_number = $_POST['matriculation_number'];
 

  $query = "UPDATE student set 
      name = '$name',
      surname = '$surname',
      specialty = '$specialty',
      age = '$age',
      gender = '$gender',
      matriculation_number = '$matriculation_number'
       WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Data Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
      

        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update Title">
        </div>

        <div class="form-group">
          <input name="surname" type="text" class="form-control" value="<?php echo $surname; ?>" placeholder="Update Title">
        </div>

        <div class="form-group">
          <input name="specialty" type="text" class="form-control" value="<?php echo $specialty; ?>" placeholder="Update Specialty">
        </div>

        <div class="form-group">
          <input name="age" type="tel" class="form-control" value="<?php echo $age; ?>" placeholder="Update Title">
        </div>

        <div class="form-group">
          <input name="gender" type="text" class="form-control" value="<?php echo $gender; ?>" placeholder="Update Title">
        </div>

        <div class="form-group">
          <input name="matriculation_number" type="text" class="form-control" value="<?php echo $matriculation_number; ?>" placeholder="Update Mat">
        </div>
       
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
