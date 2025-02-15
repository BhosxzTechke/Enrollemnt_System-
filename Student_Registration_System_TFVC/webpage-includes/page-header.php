
<!-- Add Section Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSectionModalLabel">Student Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Student Information Form -->
        <div class="container">
          <form method="POST" action="">
            <table class="text-center infotable">
              <tr>
                <th colspan="2">
                  <p class="text-center">Student Information</p>
                </th>
              </tr>
              <tr>
                <td>
                  <p>Choose Class</p>
                </td>
                <td>
                  <div class="input-group">
                    <select class="form-control" name="choose" required>
                      <option value="">Select</option>
                      <option value="1st">1st</option>
                      <option value="2nd">2nd</option>
                      <option value="3rd">3rd</option>
                      <option value="4th">4th</option>
                      <option value="5th">5th</option>
                    </select>
                    <span class="input-group-text"><i class="bi bi-chevron-down"></i></span>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <p><label for="roll">Roll No</label></p>
                </td>
                <td>
                  <input class="form-control" type="text" pattern="[0-9]{6}" id="roll" placeholder="Roll Num.." name="roll" required>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <div class="d-flex justify-content-center">
                    <!-- Show Info Button -->
                    <input class="btn btn-danger me-3" type="submit" name="showinfo" value="Show Info">
                    <!-- Reset Button -->
                    <input class="btn btn-danger" type="reset" value="Reset" onclick="clearStudentInfo()">
                  </div>
                </td>
              </tr>
            </table>
          </form>

          <!-- PHP Processing Logic to Display Student Info -->
          <?php
          if (isset($_POST['showinfo'])) {
              // Sanitize input
              $choose = mysqli_real_escape_string($db_con, $_POST['choose']);
              $roll = mysqli_real_escape_string($db_con, $_POST['roll']);

              if (!empty($choose) && !empty($roll)) {
                  $query = mysqli_query($db_con, "SELECT * FROM `student_info` WHERE `roll`='$roll' AND `class`='$choose'");
                  if ($query && mysqli_num_rows($query) > 0) {
                      $row = mysqli_fetch_array($query);
                      // Display Student Info
                      ?>
                      <div class="row mt-4" id="studentInfo">    
                        <div class="col-sm-6 offset-sm-3">
                          <table class="table table-bordered">
                            <tr>
                              <td rowspan="5">
                                <h3>Student Info</h3>
                                <img class="img-thumbnail" src="admin/images/<?= htmlspecialchars($row['photo']); ?>" width="250px">
                              </td>
                              <td>Name</td>
                              <td><?= htmlspecialchars($row['name']); ?></td>
                            </tr>
                            <tr>
                              <td>Roll</td>
                              <td><?= htmlspecialchars($row['roll']); ?></td>
                            </tr>
                            <tr>
                              <td>Class</td>
                              <td><?= htmlspecialchars($row['class']); ?></td>
                            </tr>
                            <tr>
                              <td>City</td>
                              <td><?= htmlspecialchars($row['city']); ?></td>
                            </tr>
                            <tr>
                              <td>Submit Date</td>
                              <td><?= htmlspecialchars($row['datetime']); ?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <?php
                  } else {
                      echo '<p class="text-center text-danger">No matching records found.</p>';
                  }
              } else {
                  echo '<p class="text-center text-danger">Please fill in all fields correctly.</p>';
              }
          }
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript to clear the displayed student information -->
<script>
  function clearStudentInfo() {
    // Clear the student info display section
    document.getElementById('studentInfo').innerHTML = '';
  }
</script>

