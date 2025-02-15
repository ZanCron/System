<div class="app-content-header p-0">

    <div class="container-fluid p-0">

      <div class="card border-0 rounded-0 px-4 py-3">
        <div class="card-body">

          <h3 class="fw-bold">Account Profile</h3>

          <small class="text-muted">Manage your public profile and private information</small>

        </div>
      </div>
           
    </div>

</div>

    <div class="app-content">
          <!--begin::Container-->
            <div class="container-fluid px-0 px-lg-4">
                
                <div class="row">

                  <div class="col-md-6 mt-3">
                    <div class="card shadow-sm">
                      <div class="card-body p-4">
                        
                        <div class="row">

                      <div class="col-12 mb-4">
                          <h5>Profile Details</h5>
                          <small class="text-muted">Your profile contains personal details and account information.</small>
                      </div>


                      <div class="col-md-6">

                          <div class="mb-4">

                              <div class="input-group">
                                <span class="input-group-text">
                                <i class="bi bi-person"></i>
                                </span>
                                <div class="form-floating">
                                  <input type="text" class="form-control text-muted" id="floatingInput" placeholder="First Name" name="firstname" 
                                    value="<?= htmlspecialchars($row['firstname']);?>" required readonly>
                                  <label for="floatingInput" class="small">First Name</label>
                                </div>
                              </div>
                              
                          </div>

                      </div>

                      <div class="col-md-6">

                        <div class="mb-4">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control text-muted" id="floatingInput" placeholder="Middle Name" name="middlename" 
                                    value="<?= htmlspecialchars($row['middlename']) ?: ' ' ?>" readonly>
                                <label for="floatingInput" class="small">Middle Name</label>
                              </div>
                            </div>
                            
                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="mb-4">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control text-muted" id="floatingInput" placeholder="Last Name" name="lastname" 
                                value="<?= htmlspecialchars($row['lastname']);?>" required readonly>
                                <label for="floatingInput" class="small">Last Name</label>
                              </div>
                            </div>
                            
                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="mb-4">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                  <input type="text" class="form-control text-muted" id="floatingInput" 
                                      placeholder="Suffix" name="suffix" value="<?= htmlspecialchars($row['suffix']) ?: ' ' ?>" 
                                      readonly>
                                  <label for="floatingInput" class="small">Suffix</label>
                              </div>

                            </div>
                            
                        </div>

                      </div>

                      </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mt-3">
                    <div class="card shadow-sm">
                      <div class="card-body p-4">
                        
                        <div class="row">

                        <div class="col-12 mb-4">
                            <h5>Personal Information</h5>
                            <small class="text-muted">Includes your phone number, birthdate, and other personal details.</small>
                        </div>

                      <div class="col-md-6">

                          <div class="mb-4">

                              <div class="input-group">
                                <span class="input-group-text">
                                <i class="bi bi-telephone"></i>
                                </span>
                                <div class="form-floating">
                                  <input type="text" class="form-control text-muted" id="floatingInput" placeholder="Phone Number" name="phone" 
                                    value="<?= htmlspecialchars($row['phone_number']);?>" required readonly>
                                  <label for="floatingInput" class="small">Phone Number</label>
                                </div>
                              </div>
                              
                          </div>

                      </div>

                      <div class="col-md-6">

                      <div class="mb-4">

                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="bi bi-person"></i>
                            </span>
                            <div class="form-floating">
                              <input type="text" class="form-control text-muted" id="floatingInput" placeholder="Username" name="username" 
                                value="<?= htmlspecialchars($row['username']);?>" required readonly>
                              <label for="floatingInput" class="small">Username</label>
                            </div>
                          </div>
                          
                      </div>

                      </div>

                      <div class="col-md-6">

                        <div class="mb-4">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-calendar"></i>
                              </span>
                              <div class="form-floating">
                                <input type="date" class="form-control text-muted" id="floatingInput" placeholder="Middle Name" name="birthdate" 
                                    value="<?= htmlspecialchars($row['birthdate']);?>" readonly>
                                <label for="floatingInput" class="small">Birthdate</label>
                              </div>
                            </div>
                            
                        </div>

                      </div>

                      <div class="col-md-6">

                      <div class="mb-4">

                          <div class="input-group">
                            <span class="input-group-text">
                            <i class="bi bi-person"></i>
                            </span>
                            <div class="form-floating">
                              <input type="text" class="form-control text-muted" id="floatingInput" placeholder="Gender" name="gender" 
                                  value="<?= htmlspecialchars($row['gender']);?>" readonly>
                              <label for="floatingInput" class="small">Gender</label>
                            </div>
                          </div>
                          
                      </div>

                      </div>

                      <div class="col-md-6">

                        <div class="mb-4">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control text-muted" id="floatingInput" placeholder="Civil Status" name="civil_status" 
                                value="<?= htmlspecialchars($row['civil_status']);?>" required readonly>
                                <label for="floatingInput" class="small">Civil Status</label>
                              </div>
                            </div>
                            
                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="mb-4">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-geo-alt"></i>
                              </span>
                              <div class="form-floating">
                                  <input type="text" class="form-control text-muted" id="floatingInput" 
                                      placeholder="Address" name="address" value="<?= htmlspecialchars($row['address']); ?>" 
                                      readonly>
                                  <label for="floatingInput" class="small">Address</label>
                              </div>

                            </div>
                            
                        </div>

                      </div>

                      </div>

                      </div>
                    </div>
                  </div>
                    
                </div>

            </div>
          <!--end::Container-->
    </div>