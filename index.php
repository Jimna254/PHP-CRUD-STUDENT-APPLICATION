<?php include('includes/header.php');?>
<?php include('includes/dbconn.php');?>
    <div class = "box1">    
    <h3>ALL STUDENTS</h3>
    <button class= "btn btn-primary" data-toggle="modal" data-target="#exampleModal"> ADD STUDENTS</button>
    
    </div>


    <table class='table table-hover table-boardered table-striped ' >
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query= "SELECT * from `students`"; 

            $result=mysqli_query($connection, $query);

            if(!$result){
                die("query Failed".mysqli_error());
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>
            <tr>
                <td><?php echo $row["id"];  ?></td>
                <td><?php echo $row["first_name"];  ?></td>
                <td><?php echo $row["last_name"];  ?></td>
                <td><?php echo $row["age"];  ?></td>
                <td><a href='update_page.php?id=<?php echo $row['id']; ?> ' class= "btn btn-success">Update</a></td> 
                <td><a href='delete_page.php?id=<?php echo $row['id']; ?>' class= "btn btn-danger">Delete</a></td> 
                  

            </tr>

                    <?php
                }
            }

        ?>
        
        </tbody>

        <?php
   
   if(isset($_GET['message'])){
     echo "<h6 class='error-message'>".htmlentities($_GET['message'])."</h6>";
   
   }
   ?>
   <?php
   if(isset($_GET['insert_msg'])){
     echo "<h6 class='text-success'>".htmlentities($_GET['insert_msg'])."</h6>";
   
   }
   ?>
       


<form onsubmit="return validateForm()" action="stu_data.php" method= "post">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="stu_data.php" method="post">
            <div class="form.group">
               <label for="f_name"> First Name</label>
               <input type="text" id ="first_name" name="f_name" class="form-control">

             </div>
             <div class="form.group">
               <label for="l_name"> Last Name</label>
               <input type="text" id ="last_name" name="l_name" class="form-control">

             </div>

             <div class="form.group">
               <label for="age"> Age</label>
               <input type="text" id ="age" name="age" class="form-control">

             </div>

             <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success"name="add_student" value="Add">
      </div>

        </form>
      </div>
      
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       
  

<?php include('includes/footer.php');?>
 