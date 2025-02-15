<?php


$query = "SELECT 

            all_requests.id AS request_id, 

            all_requests.*,  users.*, documents.*

          FROM 

            all_requests

          JOIN 

            users

          ON 
            all_requests.resident_id = users.id 

          JOIN 

            documents

          ON 
            all_requests.document_id = documents.id";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();


?>

<div class="app-content-header p-0">

    <div class="container-fluid p-0">

      <div class="card border-0 rounded-0 px-4 py-3">

      <div class="card-body">
          <h3 class="fw-bold">Document Requests</h3>
          <small class="text-muted">View, approve, or disapproved pending document requests submitted.</small>
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

                        <div class="row">

                        <div class="overflow-auto col-md-8">
                          <ul class="nav nav-tabs flex-nowrap flex-md-wrap nav-fill" id="orderTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab" aria-controls="approved" aria-selected="false">Approved</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="disapprove-tab" data-bs-toggle="tab" data-bs-target="#disapprove" type="button" role="tab" aria-controls="disapprove" aria-selected="false">Disapproved</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">Completed</button>
                            </li>
                           
                          </ul>
                        </div>

                            <div class="col-md-4 text-end">
                              <a href="#" class="btn btn-primary"><i class="bi bi-card-list me-2"></i></i>Generate List</a>
                            </div>


                        </div>
                        <hr>

                          <div class="container table-responsive mt-4">

                                <table id="table" class="table-bordered table">
                                              <thead>
                                                <tr>
                                                  <th>Name</th>
                                                  <th>Type</th>
                                                  <th>Purpose</th>
                                                  <th>Date</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>

                                              <?php 

                                              while ($all_requests = $result->fetch_assoc()) {

                                              ?>
                                              <tbody>
                                                <tr>
                                                  
                                                  <td class="p-3 fw-semibold text-uppercase">
                                                   <?= $all_requests['lastname'].', '.$all_requests['firstname'].' '.$all_requests['middlename'].' '.$all_requests['suffix'];?>
                                                  </td>

                                                  <td class="p-3">
                                                   <?= $all_requests['document_name'];?>
                                                  </td>

                                                  <td class="p-3">
                                                   <?= $all_requests['purpose'];?>
                                                  </td>

                                                   <td class="p-3">
                                                   <?= $all_requests['requested_at'];?>
                                                  </td>

                                                  <td class="p-3">
                                                   <?= $all_requests['request_status'];?>
                                                  </td>
                                                 
                                                  <td class="p-3">
                                                    <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#viewRequestModal" data-request-id="<?php echo $all_requests['request_id']; ?>">
                                                      <i class="bi bi-eye me-2"></i>View
                                                    </button>
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

    <style>
      .nav-tabs .nav-item .nav-link{
        border: 0;
        color: #000;
        font-weight: 500;
      }

      .nav-tabs .nav-item .nav-link:hover{
        color: var(--bs-blue);
      }
      .nav-tabs .nav-item .nav-link.active {
        border-bottom: 2px solid var(--bs-blue);
        color: var(--primary); /* Optional: Change text color to match */
      }
    </style>


<div class="modal fade" id="viewRequestModal" tabindex="-1" aria-labelledby="viewRequestModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="viewRequestModalLabel"><i class="bi bi-info-circle-fill me-2"></i>Request Information</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-content">
        <!-- Data will be loaded here dynamically -->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update Info</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var viewModal = document.getElementById('viewRequestModal');

    viewModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var requestId = button.getAttribute('data-request-id');

      // Fetch data from the server using AJAX
      fetch('fetch_requests_info.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'request_id=' + requestId
      })
      .then(response => response.text())
      .then(data => {
        document.getElementById('modal-content').innerHTML = data;
      })
      .catch(error => console.error('Error:', error));
    });
  });
</script>




