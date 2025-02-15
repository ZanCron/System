<?php
require '../config/function.php';

if (isset($_POST['request_id'])) {
    $id = $_POST['request_id'];

    $query = "SELECT 
                all_requests.id AS request_id, 
                all_requests.*, 
                users.*, 
                documents.*
              FROM 
                all_requests
              JOIN 
                users ON all_requests.resident_id = users.id 
              JOIN 
                documents ON all_requests.document_id = documents.id
              WHERE 
                all_requests.id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($requestInfo = $result->fetch_assoc()) {
       
?>

    <div class="row p-1">
        
        <div class="col-12 d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0 d-flex align-items-center">
                <i class="bi bi-file-earmark-text me-2"></i><?= htmlspecialchars($requestInfo['document_name']);?>
            </h5>
            <small class="text-muted ms-3 card-title">
                <?= ($requestInfo['document_fee'] == 0 || $requestInfo['document_fee'] == '' ? 'Free' : '₱ ' . htmlspecialchars($requestInfo['document_fee'])); ?>
            </small>
        </div>

        
        <div class="col-12 mb-3">
            <h6>Request Details</h6>
            <small class="text-muted">All fields with <span class="text-danger fw-bold">*</span> are required.</small>

            <hr>
        </div>

            <div class="col-md-3 mb-4">

            <div class="input-group">
            <span class="input-group-text">
            <i class="bi bi-person"></i>
            </span>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="firstname" 
                value="<?= htmlspecialchars($requestInfo['firstname']);?>" required>
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
                value="<?= htmlspecialchars($requestInfo['middlename']);?>">
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
                value="<?= htmlspecialchars($requestInfo['lastname']);?>" required>
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
                value="<?= htmlspecialchars($requestInfo['suffix']);?>">
                <label for="floatingInput" class="small">Suffix</label>
            </div>
            </div>

            </div>

            <div class="col-md-3">

                        <div class="mb-4">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-calendar"></i>
                              </span>
                              <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInput" placeholder="Middle Name" name="birthdate" 
                                    value="<?= htmlspecialchars($requestInfo['birthdate']);?>" required>
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
                                <option value="Male" <?= ($requestInfo['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= ($requestInfo['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
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
                                <option value="" disabled <?= empty($requestInfo['civil_status']) ? 'selected' : '' ?>>Select Civil Status</option>
                                <option value="Single" <?= ($requestInfo['civil_status'] == 'Single') ? 'selected' : '' ?>>Single</option>
                                <option value="Married" <?= ($requestInfo['civil_status'] == 'Married') ? 'selected' : '' ?>>Married</option>
                                <option value="Widowed" <?= ($requestInfo['civil_status'] == 'Widowed') ? 'selected' : '' ?>>Widowed</option>
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
                              <option value="" disabled <?= empty($requestInfo['address']) ? 'selected' : '' ?>>Select Address (Purok or Sitio)</option>
                              <option value="Purok Bagong Sikat" <?= ($requestInfo['address'] == 'Purok Bagong Sikat') ? 'selected' : '' ?>>Purok Bagong Sikat</option>
                              <option value="Purok Bagong Silang" <?= ($requestInfo['address'] == 'Purok Bagong Silang') ? 'selected' : '' ?>>Purok Bagong Silang</option>
                              <option value="Purok Kaunlaran" <?= ($requestInfo['address'] == 'Purok Kaunlaran') ? 'selected' : '' ?>>Purok Kaunlaran</option>
                              <option value="Purok Mabuhay" <?= ($requestInfo['address'] == 'Purok Mabuhay') ? 'selected' : '' ?>>Purok Mabuhay</option>
                              <option value="Purok Maligaya" <?= ($requestInfo['address'] == 'Purok Maligaya') ? 'selected' : '' ?>>Purok Maligaya</option>
                              <option value="Purok Masagana" <?= ($requestInfo['address'] == 'Purok Masagana') ? 'selected' : '' ?>>Purok Masagana</option>
                              <option value="Purok Pag-asa" <?= ($requestInfo['address'] == 'Purok Pag-asa') ? 'selected' : '' ?>>Purok Pag-asa</option>
                              <option value="Purok Tagumpay" <?= ($requestInfo['address'] == 'Purok Tagumpay') ? 'selected' : '' ?>>Purok Tagumpay</option>
                              <option value="Sitio El-Ulit" <?= ($requestInfo['address'] == 'Sitio El-Ulit') ? 'selected' : '' ?>>Sitio El-Ulit</option>
                            </select>
                            <label for="floatingSelectAddress" class="small">Address <span class="text-danger fw-bold">*</span></label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 mb-4">

                        <div class="input-group">
                        <span class="input-group-text">
                        <i class="bi bi-card-text"></i>
                        </span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Purpose" name="purpose" value="<?= htmlspecialchars($requestInfo['purpose']);?>" required readonly>
                            <label for="floatingInput" class="small">Purpose <span class="text-danger fw-bold">*</span></label>
                        </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                            <div class="mb-4">
                              <div class="input-group">
                                <span class="input-group-text">
                                <i class="bi bi-credit-card"></i>
                                </span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="payment_method" readonly value="<?= htmlspecialchars($requestInfo['payment_method']);?>">

                                  <label for="paymentMethod" class="small">Payment Method <span class="text-danger fw-bold">*</span></label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Reference Number Input -->
                          <div class="col-md-4">
                            <div class="mb-4">
                              <div class="input-group">
                                <span class="input-group-text">
                                  <i class="bi bi-receipt"></i>
                                </span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="reference_no" readonly value="<?= empty($requestInfo['reference_no']) ? 'N/A' : $requestInfo['reference_no']; ?>">

                                  <label for="referenceNo" class="small">Reference No. (If GCash) <span class="text-danger fw-bold">*</span></label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-12">

                            <div class="row">

                                <div class="col-md-5">
                                    <div class="mb-4">
                                        <p><i class="bi bi-person-vcard me-2"></i>ID Verification</p>
                                        <img src="<?= BASE_URL;?>/uploads/<?= htmlspecialchars($requestInfo['id_proof']);?>" alt="ID Proof" class="img-fluid" style="aspect-ratio: 16/9;">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-check2-circle"></i>
                                            </span>
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelectStatus" name="status" required>
                                                    <?php
                                                        $status = $requestInfo['request_status'] ?? '';
                                                        $options = [
                                                            'Pending' => 'Pending',
                                                            'Approved' => 'Approved',
                                                            'Disapproved' => 'Disapproved',
                                                            'Completed' => 'Completed'
                                                        ];

                                                        if ($status === 'Pending') {
                                                            $options['Pending'] = '<option value="Pending" disabled selected>Pending</option>';
                                                        }
                                                        

                                                        foreach ($options as $value => $label) {
                                                            $selected = ($status == $value) ? 'selected' : '';
                                                            echo "<option value=\"$value\" $selected>$label</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <label for="floatingSelectStatus" class="small">Status <span class="text-danger fw-bold">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>



        

    </div>




<?php

    } else {
        echo "No details found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No ID provided.";
}
?>
