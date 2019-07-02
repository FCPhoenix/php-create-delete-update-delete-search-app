<?php

include('db.php');

if (isset($_POST['save_student'])) {
  
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $specialty = $_POST['specialty'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $matriculation_number = $_POST['matriculation_number'];
  

  $query = "INSERT INTO student(
    
    name,
    surname,
     specialty,
     age,
      gender,
       matriculation_number
         
       ) VALUES (
        '$name',
         '$surname',
          '$specialty',
          '$age',
           '$gender',
           '$matriculation_number'
            )";
            
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Student Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
