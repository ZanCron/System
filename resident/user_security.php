<div class="app-content-header p-0">

    <div class="container-fluid p-0">

      <div class="card border-0 rounded-0 px-4 py-3">

        <div class="card-body">
            <h3 class="fw-bold">Security & Privacy</h3>
            <small class="text-muted">Control your profile visibility and personal data</small>
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
                                  <h5>Change Your Password</h5>
                                  <small class="text-muted">All fields with <span class="text-danger fw-bold">*</span> are required.</small>
                              </div>

                              <div class="col-12">
                                  <div class="mb-4">
                                      <div class="input-group">
                                          <span class="input-group-text">
                                              <i class="bi bi-key"></i>
                                          </span>
                                          <div class="form-floating">
                                              <input type="password" class="form-control text-muted" id="currentPassword" placeholder="Current Password" name="current_password" required>
                                              <label for="currentPassword" class="small">Current Password <span class="text-danger fw-bold">*</span></label>
                                          </div>
                                          <span class="input-group-text toggle-password" data-target="currentPassword">
                                              <i class="bi bi-eye fs-5"></i>
                                          </span>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-12">
                                  <div class="mb-4">
                                      <div class="input-group">
                                          <span class="input-group-text">
                                              <i class="bi bi-key"></i>
                                          </span>
                                          <div class="form-floating">
                                              <input type="password" class="form-control text-muted" id="newPassword" placeholder="New Password" name="new_password" required>
                                              <label for="newPassword" class="small">New Password <span class="text-danger fw-bold">*</span></label>
                                          </div>
                                          <span class="input-group-text toggle-password" data-target="newPassword">
                                              <i class="bi bi-eye fs-5"></i>
                                          </span>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-12">
                                  <div class="mb-4">
                                      <div class="input-group">
                                          <span class="input-group-text">
                                              <i class="bi bi-key"></i>
                                          </span>
                                          <div class="form-floating">
                                              <input type="password" class="form-control text-muted" id="reNewPassword" placeholder="Re-enter New Password" name="rnew_password" required>
                                              <label for="reNewPassword" class="small">Re-enter New Password <span class="text-danger fw-bold">*</span></label>
                                          </div>
                                          <span class="input-group-text toggle-password" data-target="reNewPassword">
                                              <i class="bi bi-eye fs-5"></i>
                                          </span>
                                      </div>
                                  </div>
                        



                            <hr>

                            <div class="mb-2 mt-2 text-end">
                            <button class="btn btn-success col-6 col-lg-3 py-2"><i class="bi bi-floppy me-2"></i>Save</button>

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

    <script>
      document.querySelectorAll(".toggle-password").forEach(span => {
          span.addEventListener("click", function () {
              let target = document.getElementById(this.getAttribute("data-target"));
              if (target.type === "password") {
                  target.type = "text";
                  this.innerHTML = '<i class="bi bi-eye-slash fs-5"></i>';
              } else {
                  target.type = "password";
                  this.innerHTML = '<i class="bi bi-eye fs-5"></i>';
              }
          });
      });
    </script>