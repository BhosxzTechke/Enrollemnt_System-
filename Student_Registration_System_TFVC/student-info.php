
<?php

include('webpage-includes/file.php');
include('webpage-includes/navbar.php');
require('admin/db_con.php')

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
if (isset($_POST['addstudent'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $address = $_POST['address'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];
    
    // Handle file upload
    $photoExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $photoName = $roll . date('Y-m-d-H-i-s') . '.' . $photoExtension;

    // Check if roll number already exists
    $checkQuery = "SELECT * FROM student_info WHERE roll = '$roll' LIMIT 1";
    $checkResult = mysqli_query($db_con, $checkQuery);


    
    if (mysqli_num_rows($checkResult) > 0) {
        $datainsert['inserterror'] = '<p style="color: red;">Roll number already exists!</p>';
    } else {



        // Insert student data into the database
        $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) 
                  VALUES ('$name', '$roll', '$class', '$address', '$pcontact', '$photoName')";
        if (mysqli_query($db_con, $query)) {

            $datainsert['insertsuccess'] = '<p style="color: green;">Student Inserted Successfully!</p>';
            move_uploaded_file($_FILES['photo']['tmp_name'], 'imageslang/' . $photoName);
						$name = $roll = $address = $pcontact = $class = '';

        } else {
            $datainsert['inserterror'] = '<p style="color: red;">Student Not Inserted, please input correct information!</p>';
        }
    }
}
?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card w-50 shadow-lg">
    <div class="card-header text-center bg-primary text-white">
      <h3><i class="fas fa-user-plus"></i> Add Student</h3>
      <small class="text-light">Fill in the details below to add a new student.</small>
    </div>
    <div class="card-body">
      <!-- Toast Notification -->
      <?php if (isset($datainsert)) { ?>
        <div class="toast align-items-center text-bg-<?php echo isset($datainsert['insertsuccess']) ? 'success' : 'danger'; ?>" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
          <div class="d-flex">
            <div class="toast-body">
              <?php 
                echo isset($datainsert['insertsuccess']) ? $datainsert['insertsuccess'] : $datainsert['inserterror'];
              ?>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      <?php } ?>

      <!-- Student Form -->
      <form enctype="multipart/form-data" method="POST" action="">
        <div class="mb-3">
          <label for="name" class="form-label">Student Name</label>
          <input name="name" type="text" class="form-control" id="name" value="<?= isset($name) ? $name : ''; ?>" required>
        </div>
        <div class="mb-3">
          <label for="roll" class="form-label">Student Roll</label>
          <input name="roll" type="text" class="form-control" id="roll" value="<?= isset($roll) ? $roll : ''; ?>" readonly required>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Student Address</label>
          <input name="address" type="text" class="form-control" id="address" value="<?= isset($address) ? $address : ''; ?>" required>
        </div>
        <div class="mb-3">
          <label for="pcontact" class="form-label">Parent Contact Number</label>
          <input name="pcontact" type="text" class="form-control" id="pcontact" pattern="01[5|6|7|8|9][0-9]{8}" placeholder="01XXXXXXXXX" value="<?= isset($pcontact) ? $pcontact : ''; ?>" required>
        </div>

        <div class="mb-3">
          <label for="class" class="form-label">Student Grade</label>
          <select name="class" class="form-select" id="class" required>
            <option value="" disabled selected>Select Grade</option>
            <option value="1st">Grade 1</option>
            <option value="2nd">Grade 2</option>
            <option value="3rd">Grade 3</option>
            <option value="4th">Grade 4</option>
            <option value="5th">Grade 5</option>
            <option value="6th">Grade 6</option>
            <option value="7th">Grade 7</option>
            <option value="8th">Grade 8</option>
            <option value="9th">Grade 9</option>
            <option value="10th">Grade 10</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Student Photo</label>
          <input name="photo" type="file" class="form-control" id="photo" required>
        </div>


        <div class="text-center">
          <button type="submit" name="addstudent" value="Submit" class="btn btn-primary w-100">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Toast Activation Script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    toastElList.forEach(function(toastEl) {
      var toast = new bootstrap.Toast(toastEl);
      toast.show();
    });
  });
</script>



<script>
$(document).ready(function() {
    $('#class').change(function() {
        var grade = $(this).val();
        if (grade && grade !== 'Select Grade') {
            $.ajax({
              url: 'generateroll.php', // Update with the correct path
              type: 'POST',
                data: { grade: grade },
                success: function(response) {
                    $('#roll').val(response);
                },
                error: function() {
                    alert('Error generating roll number.');
                }
            });
        }
    });
});

$('form').on('submit', function(e) {
        // Check if the toast message indicates success
        if ($('.toast-body').text().includes('Student Inserted Successfully!')) {
            // Reset the form fields except for the roll number
            $(this).trigger('reset');
            $('#class').val('Select Grade'); // Reset the grade dropdown
            // Optionally, set the roll number back to the appropriate starting point if needed
            $('#roll').val(''); // Clear roll number input to generate a new one
        }
    });
</script>












<!-- Student Information Section -->
<div class="container mt-4">
  <h3 class="text-center text-primary"><i class="bi bi-person-badge"></i> Student Information</h3>
  <p class="text-center text-muted">Fill in the fields below to retrieve student information.</p>
  
  <!-- Student Information Form -->
  <form method="POST" action="" class="p-4 shadow rounded bg-light">
    <div class="mb-3 row">
      <label class="col-sm-4 col-form-label text-end" for="choose">Choose Grade:</label>
      <div class="col-sm-6">
        <div class="input-group">
          <select class="form-select" name="choose" id="choose" required>
            <option value="" selected disabled>Select</option>
            <option value="1st">Grade 1</option>
            <option value="2nd">Grade 2</option>
            <option value="3rd">Grade 3</option>
            <option value="4th">Grade 4</option>
            <option value="5th">Grade 5</option>
            <option value="6th">Grade 6</option>
            <option value="7th">Grade 7</option>
            <option value="8th">Grade 8</option>
            <option value="9th">Grade 9</option>
            <option value="10th">Grade 10</option>
          </select>
          <span class="input-group-text"><i class="bi bi-chevron-down"></i></span>
        </div>
      </div>
    </div>
    
    <div class="mb-3 row">
      <label class="col-sm-4 col-form-label text-end" for="roll">Roll No:</label>
      <div class="col-sm-6">
        <input class="form-control" type="text" id="roll" placeholder="Enter Roll Number" name="roll" required>
      </div>
    </div>

    <div class="text-center mt-4">
      <button class="btn btn-primary me-3" type="submit" name="showinfo"><i class="bi bi-search"></i> Show Info</button>
      <button class="btn btn-secondary" type="reset" onclick="clearStudentInfo()"><i class="bi bi-x-circle"></i> Reset</button>
    </div>
  </form>

  <!-- PHP Processing Logic to Display Student Info -->
  <?php
  if (isset($_POST['showinfo'])) {
      // Sanitize input
      $choose = mysqli_real_escape_string($db_con, $_POST['choose']);
      $roll = mysqli_real_escape_string($db_con, $_POST['roll']);

      if (!empty($choose) && !empty($roll)) {
        $query = mysqli_query($db_con, "SELECT * FROM `student_info` WHERE `roll`='$roll' AND `class`='$choose' AND `status`='approved'");
          if ($query && mysqli_num_rows($query) > 0) {
              $row = mysqli_fetch_array($query);
              // Display Student Info
              ?>
              <div class="row mt-4" id="studentInfo">    
                <div class="col-sm-8 offset-sm-2">
                  <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                      <h4>Student Details</h4>
                    </div>
                    <div class="card-body">
                      <div class="text-center mb-3">
                        <img class="img-thumbnail" src="admin/images/<?= htmlspecialchars($row['photo']); ?>" width="150px">
                      </div>
                      <table class="table table-bordered table-striped">
                        <tr>
                          <th>Name</th>
                          <td><?= htmlspecialchars($row['name']); ?></td>
                        </tr>
                        <tr>
                          <th>Roll</th>
                          <td><?= htmlspecialchars($row['roll']); ?></td>
                        </tr>
                        <tr>
                          <th>Grade</th>
                          <td><?= htmlspecialchars($row['class']); ?></td>
                        </tr>
                        <tr>
                          <th>City</th>
                          <td><?= htmlspecialchars($row['city']); ?></td>
                        </tr>
                        <tr>
                          <th>Submit Date</th>
                          <td><?= htmlspecialchars($row['datetime']); ?></td>
                        </tr>
                        <tr>
                          <th>Status</th>
                          <td><?= htmlspecialchars($row['status']); ?></td>
                        </tr>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <?php
          } else {
            echo '<p class="text-center text-danger mt-4">No matching records found or the status is not approved.</p>';
          }
      } else {
          echo '<p class="text-center text-danger mt-4">Please fill in all fields correctly.</p>';
      }
  }
  ?>
</div>

<!-- JavaScript to clear the displayed student information -->
<script>
  function clearStudentInfo() {
    const studentInfo = document.getElementById('studentInfo');
    if (studentInfo) {
      studentInfo.remove();
    }
  }
</script>
