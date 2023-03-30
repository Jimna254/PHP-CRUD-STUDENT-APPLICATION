<?php include('includes/dbconn.php');?>
<?php

    
    if (isset($_POST["add_student"])) {
      $firstName = trim($_POST["f_name"]);
      $lastName = trim($_POST["l_name"]);
      $age = trim($_POST["age"]);
    
 

      if($firstName =="" || empty($firstName)){
        header('location:index.php?message=You need to fll in th first name!');
    
      }
      if($lastName =="" || empty($lastName)){
        header('location:index.php?message=You need to fill in the last name!');
        }
    
    if($age =="" || empty($age)){
        header('location:index.php?message=You need to fill in the age!');
    }
      
      else {

        $query = "insert into `students` (`first_name`, `last_name`, `age`) values('$firstName', '$lastName','$age')";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
       
        }
        else{
           header('location:index.php?insert_msg=Student has been added succesfully');

        }
    }
    

}


?>
