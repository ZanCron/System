<?php

if ($_SESSION['loggedInUser']['role'] !== 'admin') {

  header('Location:' . BASE_URL . '/admin/dashboard');
  exit();

} 

$userRole = 'resident';

$query = "SELECT * FROM users WHERE role = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userRole);
$stmt->execute();
$result = $stmt->get_result();




?>

<div class="app-content-header p-0">

    <div class="container-fluid p-0">

      <div class="card border-0 rounded-0 px-4 py-3">

        <div class="card-body">
            <h3 class="fw-bold">List Of Residents</h3>
            <small class="text-muted">View, activate, or deactivate resident accounts and manage their access rights.</small>
        </div>

      </div>
           
    </div>

</div>

    <div class="app-content">
          <!--begin::Container-->
            <div class="container-fluid px-0 px-lg-4">
                
                <div class="row">

                  <div class="col-12 mt-3">

                    <div class="card shadow-sm">

                        <div class="card-body p-4">

                            <div class="col-12 text-end">
                              <a href="#" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Add</a>
                            </div>

                        <hr>

                          <div class="container table-responsive mt-4">

                                <table id="table" class="table-bordered table">
                                              <thead>
                                                <tr>
                                                  <th>ID</th>
                                                  <th>Name</th>
                                                  <th>Contact No.</th>
                                                  <th>Gender</th>
                                                  <th>Address</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <?php 

                                              while ($residentRow = $result->fetch_assoc()) {

                                              ?>
                                              <tbody>
                                                <tr>
                                                  <td class="p-3"><?= htmlspecialchars($residentRow['id']);?></td>
                                                  <td class="text-uppercase fw-semibold p-3"><?= htmlspecialchars($residentRow['lastname'].', '. $residentRow['firstname'] .' '. $residentRow['middlename']);?></td>
                                                  <td class="p-3"><?= htmlspecialchars($residentRow['phone_number']);?></td>
                                                  <td class="p-3"><?= htmlspecialchars($residentRow['gender']);?></td>
                                                  <td class="p-3"><?= htmlspecialchars($residentRow['address']);?></td>
                                                  
                                                  <td class="p-3">
                                                    <a href="#" class="btn btn-primary btn-sm w-100"><i class="bi bi-eye me-2"></i>View</a>
                                                  </td>

                                                 
                                                </tr>
                                               
                                              </tbody>

                                              <?php
                                              }


                                              ?>
                              </table>

                          </div>

                        </div>
                    

                  </div>

                  </div>

                </div>

            </div>  

          <!--end::Container-->
    </div>