<?php

$documentId = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM documents WHERE id = ?");
$stmt->bind_param("i", $documentId);  
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $document = $result->fetch_assoc();
  
}

$stmt->close();

?>

<div class="app-content-header p-0">

    <div class="container-fluid p-0">

      <div class="card border-0 rounded-0 px-4 py-3">

      <div class="card-body">
        <h3 class="fw-bold">Submit a Document Request</h3>
        <small class="text-muted">Easily submit, manage, and monitor the status of your document requests.</small>
      </div>




      </div>
           
    </div>

</div>

    <div class="app-content">
          <!--begin::Container-->
            <div class="container-fluid px-0 px-lg-4">

            <form action="<?= BASE_URL;?>/uploads/submit-request.php" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-12 mt-3 ">
                <div class="card shadow-sm">
                  <div class="card-body parcel-border">
                    <div class="px-3">

                      <!-- Document Request Header -->
                      <p class="fw-semibold mt-2 mb-1 text-primary">
                        <i class="bi bi-file-earmark-person-fill me-2"></i>Document Request
                      </p>

                      <!-- Flex Container for Title and Fee -->
                      <div class="d-flex align-items-center mt-3">
                        <!-- Document Name -->
                        <h3 class="card-title fw-bold mb-0">
                          <?= htmlspecialchars($document['document_name']); ?>
                        </h3>

                        <!-- Document Fee -->
                        <small class="text-muted ms-3 card-title">
                          <?= ($document['document_fee'] == 0 || $document['document_fee'] == '' ? 'Free' : '₱ ' . htmlspecialchars($document['document_fee'])); ?>
                        </small>
                      </div>

                    </div>
                  </div>
                </div>

                </div>

                <!-- Tab Content -->
                  <div class="col-12 mt-2">
                    <div class="card shadow-sm p-3">
                      <div class="card-body">

                      <div class="row">

                      <div class="col-12 mb-4">
                          <h5>Personal Details</h5>
                          <small class="text-muted">All fields with <span class="text-danger fw-bold">*</span> are required.</small>
                      </div>

                      <input type="hidden" value="<?= htmlspecialchars($documentId);?>" name="document_id">

                      <input type="hidden" value="<?= htmlspecialchars($row['id']);?>" name="resident_id">

                      <input type="hidden" value="<?= htmlspecialchars($row['phone_number']);?>" name="phone_number">

                      <div class="col-md-3 mb-4">

                        <div class="input-group">
                          <span class="input-group-text">
                          <i class="bi bi-person"></i>
                          </span>
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="firstname" 
                              value="<?= htmlspecialchars($row['firstname']);?>" required>
                            <label for="floatingInput" class="small">First Name <span class="text-danger fw-bold">*</span></label>
                          </div>
                        </div>

                      </div>

                      <div class="col-md-3 mb-4">


                        <div class="input-group">
                          <span class="input-group-text">
                          <i class="bi bi-person"></i>
                          </span>
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Middle Name" name="middlename" 
                              value="<?= htmlspecialchars($row['middlename']);?>">
                            <label for="floatingInput" class="small">Middle Name</label>
                          </div>
                        </div>

                      </div>

                      <div class="col-md-3 mb-4">

                        <div class="input-group">
                          <span class="input-group-text">
                          <i class="bi bi-person"></i>
                          </span>
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="lastname" 
                              value="<?= htmlspecialchars($row['lastname']);?>" required>
                            <label for="floatingInput" class="small">Last Name <span class="text-danger fw-bold">*</span></label>
                          </div>
                        </div>

                      </div>

                      <div class="col-md-3 mb-4">

                        <div class="input-group">
                          <span class="input-group-text">
                          <i class="bi bi-person"></i>
                          </span>
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Suffix" name="suffix" 
                              value="<?= htmlspecialchars($row['suffix']);?>">
                            <label for="floatingInput" class="small">Suffix</label>
                          </div>
                        </div>

                      </div>

                      <hr class="mt-2 mb-4">

                      <div class="col-12 mb-4">
                          <h5>Personal Information</h5>
                          <small class="text-muted">All fields with <span class="text-danger fw-bold">*</span> are required.</small>
                      </div>

                      <div class="col-md-3">

                        <div class="mb-4">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-calendar"></i>
                              </span>
                              <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInput" placeholder="Middle Name" name="birthdate" 
                                    value="<?= htmlspecialchars($row['birthdate']);?>" required>
                                <label for="floatingInput" class="small">Birthdate <span class="text-danger fw-bold">*</span></label>
                              </div>
                            </div>
                            
                        </div>

                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="bi bi-person"></i>
                            </span>
                            <div class="form-floating">
                              <select class="form-select" id="floatingSelect" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male" <?= ($row['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= ($row['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                              </select>
                              <label for="floatingSelect" class="small">Gender <span class="text-danger fw-bold">*</span></label>
                            </div>
                          </div>
                        </div>
  
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="bi bi-person"></i>
                            </span>
                            <div class="form-floating">
                              <select class="form-select" id="floatingSelectCivilStatus" name="civil_status" required>
                                <option value="" disabled <?= empty($row['civil_status']) ? 'selected' : '' ?>>Select Civil Status</option>
                                <option value="Single" <?= ($row['civil_status'] == 'Single') ? 'selected' : '' ?>>Single</option>
                                <option value="Married" <?= ($row['civil_status'] == 'Married') ? 'selected' : '' ?>>Married</option>
                                <option value="Widowed" <?= ($row['civil_status'] == 'Widowed') ? 'selected' : '' ?>>Widowed</option>
                              </select>
                              <label for="floatingSelectCivilStatus" class="small">Civil Status <span class="text-danger fw-bold">*</span></label>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <div class="input-group">
                          <span class="input-group-text">
                            <i class="bi bi-geo-alt"></i>
                          </span>
                          <div class="form-floating">
                            <select class="form-select" id="floatingSelectAddress" name="address" required>
                              <option value="" disabled <?= empty($row['address']) ? 'selected' : '' ?>>Select Address (Purok or Sitio)</option>
                              <option value="Purok Bagong Sikat" <?= ($row['address'] == 'Purok Bagong Sikat') ? 'selected' : '' ?>>Purok Bagong Sikat</option>
                              <option value="Purok Bagong Silang" <?= ($row['address'] == 'Purok Bagong Silang') ? 'selected' : '' ?>>Purok Bagong Silang</option>
                              <option value="Purok Kaunlaran" <?= ($row['address'] == 'Purok Kaunlaran') ? 'selected' : '' ?>>Purok Kaunlaran</option>
                              <option value="Purok Mabuhay" <?= ($row['address'] == 'Purok Mabuhay') ? 'selected' : '' ?>>Purok Mabuhay</option>
                              <option value="Purok Maligaya" <?= ($row['address'] == 'Purok Maligaya') ? 'selected' : '' ?>>Purok Maligaya</option>
                              <option value="Purok Masagana" <?= ($row['address'] == 'Purok Masagana') ? 'selected' : '' ?>>Purok Masagana</option>
                              <option value="Purok Pag-asa" <?= ($row['address'] == 'Purok Pag-asa') ? 'selected' : '' ?>>Purok Pag-asa</option>
                              <option value="Purok Tagumpay" <?= ($row['address'] == 'Purok Tagumpay') ? 'selected' : '' ?>>Purok Tagumpay</option>
                              <option value="Sitio El-Ulit" <?= ($row['address'] == 'Sitio El-Ulit') ? 'selected' : '' ?>>Sitio El-Ulit</option>
                            </select>
                            <label for="floatingSelectAddress" class="small">Address <span class="text-danger fw-bold">*</span></label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <hr class="mt-2 mb-4">

                    <div class="col-12 mb-4">
                          <h5>Other Details</h5>
                          <small class="text-muted">All fields with <span class="text-danger fw-bold">*</span> are required.</small>
                    </div>


                      <div class="col-md-6">
                        <div class="mb-4">
                          <div class="input-group">
                            <span class="input-group-text">
                            <i class="bi bi-person-vcard"></i>
                            </span>
                            <div class="form-floating">
                              <input type="file" class="form-control" id="floatingInput" name="id_proof" accept="image/*" required>
                              <label for="floatingInput" class="small">ID Proof (For Verification) <span class="text-danger fw-bold">*</span></label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 mb-4">

                        <div class="input-group">
                          <span class="input-group-text">
                          <i class="bi bi-card-text"></i>
                          </span>
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Purpose" name="purpose" required>
                            <label for="floatingInput" class="small">Purpose <span class="text-danger fw-bold">*</span></label>
                          </div>
                        </div>

                      </div>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="card shadow-sm p-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 mb-4">
                            <h5>Payment Method</h5>
                            <small class="text-muted">All fields with <span class="text-danger fw-bold">*</span> are required.</small>
                          </div>

                          <!-- Payment Method Select -->
                          <div class="col-md-6">
                            <div class="mb-4">
                              <div class="input-group">
                                <span class="input-group-text">
                                <i class="bi bi-credit-card"></i>
                                </span>
                                <div class="form-floating">
                                  <select class="form-select" id="paymentMethod" name="payment_method" required onchange="toggleReferenceField()">
                                    <option value="" disabled selected>Select Payment Method</option>
                                    <option value="Cash on Pick-up">Cash on Pick-up</option>
                                    <option value="GCash">GCash</option>
                                  </select>
                                  <label for="paymentMethod" class="small">Payment Method <span class="text-danger fw-bold">*</span></label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Reference Number Input -->
                          <div class="col-md-6">
                            <div class="mb-4">
                              <div class="input-group">
                                <span class="input-group-text">
                                  <i class="bi bi-receipt"></i>
                                </span>
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="referenceNo" name="reference_no" disabled>
                                  <label for="referenceNo" class="small">Reference No. (If GCash) <span class="text-danger fw-bold">*</span></label>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                        
                        <hr class="mt-2 mb-4">

                          <div class="col-12 py-3 text-end">

                          <h6>Total Fee: ₱ <span class="fw-semibold"><?= htmlspecialchars($document['document_fee']); ?></span></h6>

                          <button class="btn btn-primary col-8 col-lg-3 py-3 mt-3" name="submit_request"><i class="bi bi-send me-2"></i>Submit Request</button>
                          
                          </div>


                      </div>
                    </div>
                </div>


                  <script>
                    function toggleReferenceField() {
                      const paymentMethod = document.getElementById('paymentMethod').value;
                      const referenceNo = document.getElementById('referenceNo');

                      if (paymentMethod === 'GCash') {
                        referenceNo.required = true;
                        referenceNo.disabled = false;
                      } else {
                        referenceNo.required = false;
                        referenceNo.disabled = true;
                        referenceNo.value = ''; 
                      }
                    }
                  </script>




            </div>
            </form>
          <!--end::Container-->
    </div>

    <style>
      .parcel-border {
        border-top: 0px solid transparent; 
        position: relative;
      }

      .parcel-border::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px; 
        background: repeating-linear-gradient(
          45deg,
          rgba(255, 100, 100, 0.8) 0px,       
          rgba(255, 100, 100, 0.8) 30px,       
          transparent 30px,                    
          transparent 40px,                  
          rgba(100, 100, 255, 0.8) 40px,      
          rgba(100, 100, 255, 0.8) 70px,     
          transparent 70px,                   
          transparent 80px    
          );
      }
    </style>