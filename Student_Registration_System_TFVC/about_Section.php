
<?php

include('webpage-includes/file.php');
include('webpage-includes/navbar.php');
require('admin/db_con.php')

?>

<section id="about" class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">About Fisher Valley School</h2>
            <p class="text-muted">Discover our commitment to nurturing excellence and fostering lifelong learning.</p>
        </div>

        <div class="row align-items-center">
            <!-- Image Column -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="imageslang/R.jpg" alt="Fisher Valley School" class="img-fluid rounded shadow">
            </div>

            <!-- Text Column -->
            <div class="col-lg-6">
                <h3 class="fw-bold">Empowering Students for a Brighter Tomorrow</h3>
                <p class="text-muted">
                    Fisher Valley School is dedicated to providing a holistic education that nurtures the intellectual, emotional, and moral growth of every student. Established in [Year of Establishment], our school has become a cornerstone of excellence in education, serving the community with dedication and passion.
                </p>
                <ul class="list-unstyled text-muted">
                    <li><i class="bi bi-check-circle text-primary"></i> Experienced and dedicated faculty.</li>
                    <li><i class="bi bi-check-circle text-primary"></i> Innovative curriculum blending academics with life skills.</li>
                    <li><i class="bi bi-check-circle text-primary"></i> State-of-the-art facilities and a safe learning environment.</li>
                    <li><i class="bi bi-check-circle text-primary"></i> Focus on character-building and community service.</li>
                </ul>
                <a href="contact_Section.php" class="btn btn-primary mt-3">Contact Us</a>
            </div>
        </div>

        <!-- Mission and Vision Section -->
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h4 class="fw-bold text-primary">Our Mission</h4>
                        <p class="text-muted">
                            To cultivate a learning community where students are inspired to achieve their fullest potential, empowered to think critically, and equipped to contribute meaningfully to society.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h4 class="fw-bold text-primary">Our Vision</h4>
                        <p class="text-muted">
                            To be a leading institution of education, recognized for its commitment to academic excellence, innovation, and values-based learning, shaping the leaders of tomorrow.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
