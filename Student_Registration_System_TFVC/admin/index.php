<?php
ob_start();
require_once 'db_con.php';
session_start();
if (!isset($_SESSION['user_login'])) {
    header('Location: login.php');
    exit();
}
?>


<?php
include('navbar.php');
?>
<div id="layoutSidenav">
    <?php include('sidebar.php'); ?>
    <div class="col-md-9">
        <div class="content">
            <?php 
            if (isset($_GET['page'])) {
                $page = $_GET['page'] . '.php';
            } else {
                $page = 'dashboard.php';
            }

            if (file_exists($page)) {
                require_once $page;
            } else {
                require_once '404.php';
            }
            ?>
        </div>
    </div>
</div>

             
        </div>
    <div class="clearfix"></div>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link href="../csslang/styles.css" rel="stylesheet" />






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
    <script src="../js/jquery.dataTables.min.js"></script> <!-- File to make table have search bar and show entries -->
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Admin Dashboard</title>
  </head>
  <body>




<br>  

          

<!--  -->


    <script type="text/javascript">
      jQuery('.toast').toast('show');
    </script>


<?php
include('script.php');
?>


  </body>
</html>

<?php ob_end_flush(); ?>
