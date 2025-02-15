<?php include('webpage-includes/header.php'); ?>

<div class="container my-5">
  <h1 class="text-center text-primary mb-4">Contact the School of Fisher Valley</h1>
  <p class="text-center lead">
    We at the School of Fisher Valley are here to provide the guidance and support you need. 
    Whether you have questions, need assistance, or simply want to know more about our school, 
    feel free to reach out!
  </p>

  <div class="row mt-5">
    <!-- Contact Information -->
    <div class="col-md-6">
      <h3 class="text-secondary">Our Contact Details</h3>
      <p><strong>Address:</strong> Fisher Valley Main Road, Brgy. Riverstone, Fisher Valley</p>
      <p><strong>Phone:</strong> +63 912 345 6789</p>
      <p><strong>Email:</strong> info@schooloffishervalley.edu</p>
      <p><strong>Office Hours:</strong> Monday to Friday, 8:00 AM to 5:00 PM</p>

      <h4 class="mt-4 text-secondary">Follow Us</h4>
      <p>
        <a href="#" class="text-decoration-none me-3"><i class="fab fa-facebook"></i> Facebook</a>
        <a href="#" class="text-decoration-none me-3"><i class="fab fa-twitter"></i> Twitter</a>
        <a href="#" class="text-decoration-none"><i class="fab fa-instagram"></i> Instagram</a>
      </p>
    </div>

    <!-- Contact Form -->
    <div class="col-md-6">
      <h3 class="text-secondary">Send Us a Message</h3>
      <form action="process_contact.php" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Your Message</label>
          <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

<?php include('webpage-includes/footer.php'); ?>
