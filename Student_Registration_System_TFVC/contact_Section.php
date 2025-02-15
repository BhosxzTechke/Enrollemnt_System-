
<?php

include('webpage-includes/file.php');
include('webpage-includes/navbar.php');
require('admin/db_con.php')

?>

<section id="contact" class="py-5">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-4">
            <h2 class="fw-bold">Get in Touch</h2>
            <p class="text-muted">We’d love to hear from you. Drop us a message or visit our location!</p>
        </div>
        
        <div class="row g-4">
            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-telephone-fill fs-1 text-primary"></i>
                        <h5 class="card-title mt-3">Call Us</h5>
                        <p class="card-text text-muted">+1 234 567 890</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-envelope-fill fs-1 text-primary"></i>
                        <h5 class="card-title mt-3">Email Us</h5>
                        <p class="card-text text-muted">FisherValley@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-geo-alt-fill fs-1 text-primary"></i>
                        <h5 class="card-title mt-3">Visit Us</h5>
                        <p class="card-text text-muted">No. 5, M. L. Quezon Avenue, Taguig City, Philippines</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Map -->
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="ratio ratio-16x9 shadow"  style="max-height: 700px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.4466216831556!2d121.07223490529559!3d14.516427103231882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8a44d296003%3A0xa01a5b9f7559e719!2sThe%20Fisher%20Valley%20College!5e0!3m2!1sen!2sph!4v1733646803829!5m2!1sen!2sph" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Write your message" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <h4 class="mb-3">Frequently Asked Questions</h4>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How can I contact you?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can reach us via phone, email, or by filling out the contact form above.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Where are you located?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our main office is located at No. 5, M. L. Quezon Avenue, Taguig, 1630 Metro Manila, Country. Check out the map above for directions.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
