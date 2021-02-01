
<?php
  session_start();

  if (isset($_SESSION['auth'])) {
    if($_SESSION['auth']!=1){
    header("location:login.php");
  }
  }else{
    header("location:login.php");
  }
  // Database connection
  include "lib/db.php";

  $result = null;

// insert SQl start
  if (isset($_POST['s_data'])) {
    $name     = $_POST['s_name'];
    $email    = $_POST['s_email'];
    $gender   = $_POST['s_gender'];
    $age      = $_POST['s_age'];
    $pass     = sha1($_POST['s_pass']);
    $cpass    = sha1($_POST['c_pass']);

    if($pass==$cpass){
        // $result ="password matched";
        $insertSQL ="INSERT INTO students(name, email, gender, age, pass) 
                    VALUES ('$name','$email', $gender, $age, '$pass')";
        // $conn-> query($insertSQL);
        
        if ($conn-> query($insertSQL)) {
          $result = "Data added successfully";
        }
        else{
          die($conn-> error);
        }
    }
    else{
      $result ="password not matched";
    }
  }
// insert SQl end
// select sql start
  
   $readSql="SELECT * FROM students WHERE 1";
   $result_student=$conn->query($readSql);
   // echo $result_student-> num_rows;
// select sql end
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

    <title>SMS</title>
  </head>
  <body>
    
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <h1 class="text-muted">Add Student Information</h1>
            <!-- form -->
            <form class="row g-2" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

              <!-- Name -->
              <div class="col-md-6">
                <label for="s_name" class="form-label">Enter Your Name</label>
                <input type="text" class="form-control s_name" id="s_name" name="s_name" required>
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <label for="s_email" class="form-label">Enter Your Email</label>
                <input type="email" class="form-control s_email" id="s_email" name="s_email" required>
              </div>

              <!-- Gender -->

              <div class="col-md-6">
                <label for="s_gender" class="form-label">Gender</label>
                <select id="s_gender" class="form-select s_gender" name="s_gender">
                  <option value="0">Female</option>
                  <option value="1">Male</option>
                </select>
              </div>
              
              <!-- Age -->
              <div class="col-md-6">
                <label for="s_age" class="form-label">Enter Your Age</label>
                <input type="number" class="form-control s_age" id="s_age" name="s_age" required>
              </div>

              <!-- Password -->
              <div class="col-md-6">
                <label for="s_pass" class="form-label">Enter Your Password</label>
                <input type="password" class="form-control s_pass" id="s_pass" name="s_pass" required>
              </div>

              <!--Confirm Password -->
              <div class="col-md-6">
                <label for="c_pass" class="form-label">Confirm Your Password</label>
                <input type="password" class="form-control c_pass" id="c_pass" name="c_pass" required>
              </div>
              
              <!-- Submit -->
              <div class="col-12">
                <button type="submit" class="btn btn-primary" name="s_data">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
              </div>
            </form>
            <!-- /.form -->
          </div>

          <div class="col-md-12">
            <h3 class="text-warning"><?php echo $result;?></h3>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-hover table-bordered table-responsive table-dark">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Action</th>
              </tr>
              <?php if($result_student-> num_rows > 0){ ?>
              <?php while($s_row = $result_student->fetch_assoc()){ ?>
              <tr>
                <td> <?php echo $s_row['name'];?> </td>
                <td> <?php echo $s_row['email'];?> </td>
                <td> 
                  <?php if ($s_row['gender'] == 0 ) {
                    echo "Female";
                  }else{
                    echo "Male";
                  } ;
                  ?> 
                </td>
                <td> <?php echo $s_row['age'];?> </td>
                <td>
                  <a href="#">Edit</a>
                  <a href="lib/delete.php?id=<?php echo $s_row['id'];?>">Delete</a>

                </td>
              </tr>
              <?php }  ?>
            <?php } else{ ?>
              <tr>
                <td colspan="5"><?php echo "No data to Show";?></td>
              </tr>
            <?php }  ?>
            
            </table>
          </div>

          <div class="col-12">
                
                <a href="logout.php" class="btn btn-danger" type="submit">Log Out</a>
                
              </div>
        </div>
      </div>
    </section>



    <!-- Separate Popper.js and Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>
    
  </body>
</html>