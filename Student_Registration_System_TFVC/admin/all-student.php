<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>
<h1 class="text-primary"><i class="fas fa-users"></i>  All Students<small class="text-warning"> All Students List!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">All Students</li>
  </ol>
</nav>
<?php if(isset($_GET['delete']) || isset($_GET['edit'])) {?>
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
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='success') {
            echo "<p style='color: green; font-weight: bold;'>Student Deleted Successfully!</p>";
          }  
        }
        if (isset($_GET['delete'])) {
          if ($_GET['delete']=='error') {
            echo "<p style='color: red'; font-weight: bold;>Student Not Deleted!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='success') {
            echo "<p style='color: green; font-weight: bold; '>Student Edited Successfully!</p>";
          }  
        }
        if (isset($_GET['edit'])) {
          if ($_GET['edit']=='error') {
            echo "<p style='color: red; font-weight: bold;'>Student Not Edited!</p>";
          }  
        }
      ?>
    </div>
  </div>
    <?php } ?>
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Roll</th>
      <th scope="col">City</th>
      <th scope="col">Contact</th>
      <th scope="col">Photo</th>
      <th scope="col">Status</th>
      <th scope="col">Change Status</th>
      <th scope="col">Action</th>

  </thead>
  <tbody>
  <?php 
    $query = mysqli_query($db_con, 'SELECT * FROM `student_info` ORDER BY `student_info`.`datetime` DESC;');
    $i = 1;
    while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= ucwords($result['name']) ?></td>
        <td><?= $result['roll'] ?></td>
        <td><?= ucwords($result['city']) ?></td>
        <td><?= $result['pcontact'] ?></td>
        <td><img src="../imageslang/<?= $result['photo'] ?>" height="50px"></td>

        <td id="status-<?= $result['id'] ?>"><?= $result['status'] ?></td>
        <td>
          <button class="btn btn-sm btn-warning" onclick="toggleStatus(<?= $result['id'] ?>)">Toggle Status</button>
        </td>
        <td>
          <a class="btn btn-xs btn-warning" href="index.php?page=editstudent&id=<?= base64_encode($result['id']) ?>&photo=<?= base64_encode($result['photo']) ?>">
            <i class="fa fa-edit"></i>
          </a>
          &nbsp;
          <a class="btn btn-xs btn-danger" onclick="javascript:confirmationDelete($(this)); return false;" href="index.php?page=delete&id=<?= base64_encode($result['id']) ?>&photo=<?= base64_encode($result['photo']) ?>">
            <i class="fas fa-trash-alt"></i>
          </a>
        </td>
      </tr>  
  <?php $i++; } ?>
</tbody>

</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function toggleStatus(userId) {
    $.ajax({
        url: 'toggle_status.php', // Path to your PHP script
        type: 'POST',
        data: { id: userId },
        success: function(response) {
            console.log(response); // Debugging to check the response
            const data = JSON.parse(response);
            if (data.success) {
                // Update the status text dynamically
                $('#status-' + userId).text(data.status);
                alert('Status updated to: ' + data.status);
            } else {
                alert(data.message || 'Failed to update status.');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error); // Debugging AJAX errors
            alert('Error updating status.');
        }
    });
}
</script>


<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>