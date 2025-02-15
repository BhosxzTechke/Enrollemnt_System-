<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-warning" href="main-page.php">
      <i class="bi bi-book"></i> Fisher Valley 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'main-page.php' ? 'active' : '' ?>" href="main-page.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'about_Section.php' ? 'active' : '' ?>" href="about_Section.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'contact_Section.php' ? 'active' : '' ?>" href="contact_Section.php">Contact</a>
        </li>
        <li class="nav-item">
          <a href="admin/login.php" class="btn btn-outline-warning ms-3 px-4 <?= basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : '' ?>">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



