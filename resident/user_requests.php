<?php 


$query = "SELECT 

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
            all_requests.document_id = documents.id 
          
          WHERE 

            all_requests.resident_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>


<div class="app-content-header p-0">

    <div class="container-fluid p-0">

      <div class="card border-0 rounded-0 px-4 py-3">

      <div class="card-body">
    <h3 class="fw-bold">List of Requests</h3>
    <small class="text-muted">Manage and track all document requests submitted for processing.</small>
</div>



      </div>
           
    </div>

</div>

    <div class="app-content">
          <!--begin::Container-->
            <div class="container-fluid px-0 px-lg-4">

            <div class="row">
                <div class="col-12 mt-3 1">
                  <div class="card shadow-sm">
                    <div class="card-body">
                    <div class="overflow-auto">
                      <ul class="nav nav-tabs flex-nowrap nav-fill flex-md-wrap" id="orderTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab" aria-controls="approved" aria-selected="false">Approved</button>
                        </li>

                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="disapproved-tab" data-bs-toggle="tab" data-bs-target="#disapproved" type="button" role="tab" aria-controls="disapproved" aria-selected="false">Disapproved</button>
                        </li>

                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">Completed</button>
                        </li>

                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</button>
                        </li>
                      
                    
                      </ul>
                    </div>

                    </div>
                  </div>
                </div>

                <!-- Tab Content -->
                  <div class="col-12 mt-2">
                    <div class="card shadow-sm p-0">
                      <div class="card-body">
                        <div class="tab-content" id="orderTabsContent">
                          <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="row">

                            <?php 
                              if ($result->num_rows > 0) {
                                  while ($requests = $result->fetch_assoc()) {
                              ?>

                                    <div class="col-12">
                                      <div class="card border-0">
                                        <div class="card-body p-1">

                                          <div class="row">

                                            <div class="col-12 mb-2">
                                              <div class="card">
                                                <div class="card-body">

                                                <div class="row px-3">
                                                    <div class="col-md-1 mb-2 d-flex align-items-center">
                                                        <img src="<?= BASE_URL; ?>/assets/img/barangay-logo.png" alt="...." height="80">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="fs-5 fw-semibold mb-1"><?= htmlspecialchars($requests['document_name']) ?> | ₱ <?= htmlspecialchars($requests['document_fee']) ?></div>
                                                        <div class="fs-6 fw-normal mb-2"><?= htmlspecialchars($requests['firstname'] . ' ' . $requests['middlename'] . ' ' . $requests['lastname'] . ' ' . $requests['suffix']) ?></div>
                                                        <div class="d-flex flex-md-row flex-column align-items-start align-items-md-center justify-content-md-between">
                                                            <small class="text-muted mb-2 mb-md-0">
                                                              <?= htmlspecialchars($requests['requested_at']) ?>
                                                            </small>
                                                            <span class="bg-warning text-white px-3 py-1 rounded-pill fw-bold">
                                                            <?= getRequestBadge($requests['request_status']) ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>
                                              </div>
                                            </div>

                                            <div class="col-12">
                                              <div class="card border-0 bg-light">
                                                <div class="card-body text-end d-sm-flex justify-content-end gap-2">

                                                <a href="#" class="btn btn-danger px-3 py-2">Cancel Request</a>

                                                  <a href="#" class="btn bg-white  border border-muted px-3 py-2 mb-sm-0 text-dark">View Request</a>

                                                </div>
                                              </div>
                                            </div>

                                          </div>

                                        </div>
                                      </div>
                                    </div>

                              <?php 
                                  } 
                              } else {
                              ?>
                                  <div class="col-12">
                                     
      
                                            <h4>No requests found</h4>
                                        
                                     
                                  </div>
                              <?php
                              }
                              ?>


                            </div>
                          </div>
                          <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                            <h4>Pending requests</h4>
                            <p>Displaying all pending requests.</p>
                          </div>
                          <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                            <h4>Approved requests</h4>
                            <p>Displaying all approved requests.</p>
                          </div>
                          <div class="tab-pane fade" id="disapproved" role="tabpanel" aria-labelledby="ready-tab">
                            <h4>Ready to Pick-up requests</h4>
                            <p>Displaying all disapproved requests.</p>
                          </div>
                          <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                            <h4>Completed requests</h4>
                            <p>Displaying all completed requests.</p>
                          </div>
                          <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                            <h4>Cancelled requests</h4>
                            <p>Displaying all cancelled requests.</p>
                          </div>
                          <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                            <h4>Rejected requests</h4>
                            <p>Displaying all rejected requests.</p>
                          </div>
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