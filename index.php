<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD STUDENT FORM -->
      <div class="card card-body">
        <form action="save_student.php" method="POST">
        

          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="surname" class="form-control" placeholder="Surname" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="specialty" class="form-control" placeholder="Specialty" autofocus>
          </div>

           <div class="form-group">
            <input type="tel" name="age" class="form-control" placeholder="Age" autofocus>
          </div> 

          <div class="form-group">
            <input type="text" name="gender" class="form-control" placeholder="Gender" autofocus>
          </div> 

          <div class="form-group">
            <input type="text" name="matriculation_number" class="form-control" placeholder="Mat-Number" autofocus>
          </div>
         
          <input type="submit" name="save_student" class="btn btn-success btn-block" value="Save Student">
        </form>
      </div>
    </div>
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
          $query = "SELECT * FROM student";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
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
              <a href="delete_student.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
