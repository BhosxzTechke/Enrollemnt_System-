<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
<!-- FOR AUTO GENERATE FILE -->
<?php 

$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: index.php?page=' . $corepage[0]);
    }
}

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
            
            move_uploaded_file($_FILES['photo']['tmp_name'], '../imageslang/' . $photoName);
						$name = $roll = $address = $pcontact = $class = '';

        } else {
            $datainsert['inserterror'] = '<p style="color: red;">Student Not Inserted, please input correct information!</p>';
        }
    }
}
?>


<h1 class="text-primary"><i class="fas fa-user-plus"></i> Add Student<small class="text-warning"> Add New Student!</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Student</li>
    </ol>
</nav>

<div class="row">
<div class="col-sm-6">
    <?php if (isset($datainsert)) { ?>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
        <div class="toast-header">
            <strong class="mr-auto">Student Insert Alert</strong>
            <small><?php echo date('d-M-Y'); ?></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php 
                if (isset($datainsert['insertsuccess'])) {
                    echo $datainsert['insertsuccess'];
                }
                if (isset($datainsert['inserterror'])) {
                    echo $datainsert['inserterror'];
                }
            ?>
        </div>
    </div>
    <?php } ?>
    <form enctype="multipart/form-data" method="POST" action="">
        <div class="form-group">
            <label for="name">Student Name</label>
            <input name="name" type="text" class="form-control" id="name" value="<?= isset($name) ? $name : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="roll">Student Roll</label>
            <input name="roll" type="text" value="<?= isset($roll) ? $roll : ''; ?>" class="form-control" id="roll" required readonly>
        </div>
        <div class="form-group">
            <label for="address">Student Address</label>
            <input name="address" type="text" value="<?= isset($address) ? $address : ''; ?>" class="form-control" id="address" required>
        </div>
        <div class="form-group">
            <label for="pcontact">Parent Contact NO</label>
            <input name="pcontact" type="text" class="form-control" id="pcontact" pattern="01[5|6|7|8|9][0-9]{8}" value="<?= isset($pcontact) ? $pcontact : ''; ?>" placeholder="01........." required>
        </div>
        <div class="form-group">
            <label for="class">Student Grade</label>
            <select name="class" class="form-control" id="class" required>
                <option>Select</option>
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
        <div class="form-group">
            <label for="photo">Student Photo</label>
            <input name="photo" type="file" class="form-control" id="photo" required>
        </div>
        <div class="form-group text-center">
            <input name="addstudent" value="Add Student" type="submit" class="btn btn-danger">
        </div>
    </form>
</div>
</div>
<script>
$(document).ready(function() {
    $('#class').change(function() {
        var grade = $(this).val();
        if (grade && grade !== 'Select') {
            $.ajax({
                url: 'generateroll.php',
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
            $('#class').val('Select'); // Reset the grade dropdown
            // Optionally, set the roll number back to the appropriate starting point if needed
            $('#roll').val(''); // Clear roll number input to generate a new one
        }
    });
</script>
