<?php 
// Start output buffering and session
ob_start();
// Ensure user is logged in
if (!isset($_SESSION['user_login'])) {
    header("Location: login.php");
    exit;
}

$showuser = $_SESSION['user_login']; 
$haha = mysqli_query($db_con, "SELECT * FROM `users` WHERE `username`='$showuser';"); 

if (!$haha) {
    error_log("Error fetching user: " . mysqli_error($db_con)); 
    die("Error fetching user data."); // Optional for debugging
}

$showrow = mysqli_fetch_array($haha);
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- Updated Icon -->
  <a class="navbar-brand" href="index.php">
    <i class="fas fa-graduation-cap fa-3x"></i> <!-- Changed to 'graduation-cap' icon -->
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand fw-bold text-warning" href="index.php">
            <i class="bi bi-stars"></i> Fisher Valley
        </a>


        
        <!-- Navbar Toggler for Mobile View -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Left Links -->
            <ul class="navbar-nav me-auto mb-4 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active text-light fw-semibold" href="index.php?page=user-profile">
                    <i class="fa fa-user"></i> Welcome <?= htmlspecialchars($showrow['name']); ?>!
                </a>
                </li>

            </ul>

            <!-- Right Dropdown Menu -->
            
            
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light fw-semibold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?page=user-profile">User Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<?php ob_end_flush(); ?>
