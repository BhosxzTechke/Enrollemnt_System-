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

<h1 class="text-primary"><i class="fas fa-users"></i>  All Users<small class="text-warning"> All Users List!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">All Users</li>
  </ol>
</nav>

<table class="table table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Photo</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query = mysqli_query($db_con, 'SELECT * FROM `users`');
      $i = 1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= ucwords($result['name']) ?></td>
        <td><?= $result['email'] ?></td>
        <td><?= ucwords($result['username']) ?></td>
        <td><img src="images/<?= $result['photo'] ?>" height="50px"></td>
        <td id="status-<?= $result['id'] ?>"><?= $result['status'] ?></td>
        <td>
          <button class="btn btn-sm btn-warning" onclick="toggleStatus(<?= $result['id'] ?>)">Toggle Status</button>
        </td>
      </tr>
    <?php $i++; } ?>
  </tbody>
</table>



<script>
function toggleStatus(userId) {
    $.ajax({
        url: 'update_status.php', // Path to your status update PHP script
        type: 'POST',
        data: { id: userId },
        success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
                // Update the status text dynamically
                $('#status-' + userId).text(data.status);
                alert('Status updated to: ' + data.status);
            } else {
                alert(data.message);
            }
        },
        error: function() {
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