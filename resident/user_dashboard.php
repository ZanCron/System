<div class="app-content-header p-0">

    <div class="container-fluid p-0">

      <div class="card border-0 rounded-0 px-4 py-3">

        <div class="card-body">
            <h3 class="fw-bold">Dashboard</h3>
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

                            <div class="col-12">

                              <h6 class="fw-semibold"><i class="bi bi-megaphone me-3"></i>Online Documents Offered</h6>

                            </div>

                            <div class="col-12 mt-4">

                            <div class="row">

                            <?php

                                    $query = "SELECT id, document_name FROM documents";
                                    $result = $conn->query($query);


                                    if ($result->num_rows > 0) {
                                      while ($documentItem = $result->fetch_assoc()) {
                                    ?>
                                          
                                              
                                                  <div class="col-md-4">
                                                      <div class="card shadow-sm py-2 px-3 mb-3">
                                                          <div class="card-body">
                                                              <div class="col-12 mt-2 text-center d-flex justify-content-center align-items-center flex-column gap-3">
                                                                  <img src="<?= BASE_URL; ?>/assets/img/barangay-logo.png" alt="..." height="80">
                                                                  <small class="fw-bold text-uppercase fs-6"><?= htmlspecialchars($documentItem['document_name']); ?></small>

                                                                  <small class="text-muted">View the requirements needed for Barangay and acquire online now.</small>
                                                              </div>

                                                              <div class="col-12 mt-3 d-flex justify-content-center align-items-center">
                                                                  <a href="<?= BASE_URL; ?>/user/submit_request ?id=<?= htmlspecialchars($documentItem['id']); ?>" class="btn btn-primary w-75 px-3 py-2 small fw-semibold">
                                                                      <i class="bi bi-megaphone me-2"></i>PROCEED
                                                                  </a>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              
                                          
                                    <?php
                                      }
                                    } else {
                                      echo "No documents found.";
                                    }

                                    ?>

                                  </div>

                            </div>  
                              

                          </div>
                    </div>

                  </div>

                </div>

            </div>
          <!--end::Container-->
    </div>