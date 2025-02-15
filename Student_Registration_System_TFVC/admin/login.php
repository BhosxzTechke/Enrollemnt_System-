<?php
require('db_con.php');
include('navbar copy.php')
?>

<?php
session_start();
if(isset($_SESSION['user_login'])){
	header('Location: index.php');
}
	if (isset($_POST['login'])) {
		$username= $_POST['username'];
		$password= $_POST['password'];


		$input_arr = array();

		if (empty($username)) {
			$input_arr['input_user_error']= "Username Is Required!";
		}

		if (empty($password)) {
			$input_arr['input_pass_error']= "Password Is Required!";
		}

		if(count($input_arr)==0){
			$query = "SELECT * FROM `users` WHERE `username` = '$username';";
			$result = mysqli_query($db_con, $query);
			if (mysqli_num_rows($result)==1) {
				$row = mysqli_fetch_assoc($result);
				if ($row['password']==sha1(md5($password))) {
					if ($row['status']=='Active') {
						$_SESSION['user_login']=$username;
						header('Location: index.php');
					}else{
						$status_inactive = "Your Status is inactive, please contact with admin or support!";
					}
				}else{
					$worngpass= "This password Wrong!";	
				}
			}else{
				$usernameerr= "Username Not Found!";
			}
		}
		
	}

?>


<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <title>Hello, world!</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Include Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h3 class="text-center">Login Admin!</h3>
        <div class="card">
          <div class="card-body">
            <?php if(isset($usernameerr)){ ?>
              <div class="alert alert-danger"><?php echo $usernameerr; ?></div>
            <?php }; ?>
            <?php if(isset($wrongpass)){ ?>
              <div class="alert alert-danger"><?php echo $wrongpass; ?></div>
            <?php }; ?>
            <?php if(isset($status_inactive)){ ?>
              <div class="alert alert-danger"><?php echo $status_inactive; ?></div>
            <?php }; ?>

            <form method="POST" action="">
              <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
              </div>
              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
              </div>
              <div class="text-center">
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
              </div>
            </form>
            <p class="text-center mt-3">Don't have an account? <a href="register.php">Register here</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="js/bootstrap.bundle.min.js"></script>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
      <script type="text/javascript">
    $('.toast').toast('show')

  </script>
</body>
</html>