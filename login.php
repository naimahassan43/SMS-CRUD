<?php
 session_start();

 if (isset($_SESSION['auth'])) {
 	if ($_SESSION['auth']==1) {
 		header("location:index.php");
 	}
 }



 $notify =" ";
 if (isset($_POST['s_login'])) {
 	$email= $_POST['s_email'];
 	$pass= $_POST['s_pass'];
 	$loggedin= isset($_POST['keep_login'])?1:0;
 	// $s_email= $_POST['s_email'];
 	if ($email== "hello@gmail.com" && $pass== "1234") {
 		$_SESSION['auth'] =1;
 		header("location:index.php");
 	} else{
 		$notify ="Invalid email or password";
 	}
 }

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
	<title>login</title>
</head>
<body>

	<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <!-- <h1 class="text-muted">Add Student Information</h1> -->
            <!-- form -->
            <form class="row g-2" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

             

              <!-- Email -->
              <div class="col-md-12">
                <label for="s_email" class="form-label">Enter Your Email</label>
                <input type="email" class="form-control s_email" id="s_email" name="s_email" required>
              </div>

            
              <!-- Password -->
              <div class="col-md-12">
                <label for="s_pass" class="form-label">Enter Your Password</label>
                <input type="password" class="form-control s_pass" id="s_pass" name="s_pass" required>
              </div>

              <!--Checkbox -->
            
              <div class="form-check">
              	<input type="checkbox" class="form-check-input" id="exampleCheck1" name="keep_login">
              	<label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
              </div>
              <!-- Submit -->
              <div class="col-12">
                <button type="submit" class="btn btn-primary" name="s_login">Log in</button>
                
              </div>
            </form>
            <!-- /.form -->

            <div>
            	<?php echo $notify;?>
            </div>
          </div>

         
        </div>
      </div>
    </section>


	<!-- Separate Popper.js and Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>
</body>
</html>