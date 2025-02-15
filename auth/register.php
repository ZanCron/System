<?php 

otpSession();

if (!isset($_SESSION['regInUser']['phone_number'])) {
  redirect(BASE_URL . '/user/signup', 'Please fill the required fields!', 'info');
  exit();
}

?>
<div class="d-flex flex-column min-vh-100">
<main class="flex-grow-1 d-flex align-items-center justify-content-center">
      <div class="container p-0">
        <div class="row justify-content-center">
          <div class="col-md-5 bg-light">

            <div class="card shadow rounded-3 px-4 py-3">

              <form action="<?= BASE_URL;?>/code/signup-process.php" method="POST">

                  <div class="card-body">
                    <div class="col-12 text-center mb-5">
                      <img src="<?=  BASE_URL;?>/assets/img/barangay-logo.png" alt="" width="80" class="mb-3">
                      <h4 class="text-dark mb-2">Create Your Account</h4>

                      <small>Please fill all necessary informations</small>

                    </div>

                    <?php alertMessage();?>

                    <div class="row">

                    <div class="col-12 mb-3">
                      <h6>Personal Information</h6>
                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="firstname" required>
                                <label for="floatingInput" class="small">First Name *</label>
                              </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Middle Name" name="middlename">
                                <label for="floatingInput" class="small">Middle Name (Optional)</label>
                              </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="lastname" required>
                                <label for="floatingInput" class="small">Last Name *</label>
                              </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Suffix" name="suffix">
                                <label for="floatingInput" class="small">Suffix (Optional)</label>
                              </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-12">
                      <hr>
                    </div>


                    <div class="col-md-6">

                        <div class="mb-3 mt-2">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-calendar"></i>
                              </span>
                              <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInput" placeholder="Birthdate" name="birthdate" required>
                                <label for="floatingInput" class="small">Birthdate *</label>
                              </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3 mt-2">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <select name="gender" id="gender" class="form-select" id="floatingInput" required>
                                  <option selected disabled>Select Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                                <label for="floatingInput" class="small">Gender *</label>
                              </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-2 mt-2">

                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <select name="civil_status" id="civil_status" class="form-select" id="floatingInput" required>
                                  <option selected disabled>Select Civil Status</option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                  <option value="Widowed">Widowed</option>
                                </select>
                                <label for="floatingInput" class="small">Civil Status *</label>
                              </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-md-6">

                      <div class="mb-2 mt-2">

                          <div class="input-group">
                            <span class="input-group-text">
                            <i class="bi bi-geo-alt"></i>
                            </span>
                            <div class="form-floating">
                              <select name="address" id="address" class="form-select" id="floatingInput" required>
                                <option selected disabled>Select Address (Purok or Sitio)</option>

                                <option value="Purok Bagong Sikat">Purok Bagong Sikat</option>
                                <option value="Purok Bagong Silang">Purok Bagong Silang</option>
                                <option value="Purok Kaunlaran">Purok Kaunlaran</option>
                                <option value="Purok Mabuhay">Purok Mabuhay</option>
                                <option value="Purok Maligaya">Purok Maligaya</option>
                                <option value="Purok Masagana">Purok Masagana</option>
                                <option value="Purok Pag-asa">Purok Pag-asa</option>
                                <option value="Purok Tagumpay">Purok Tagumpay</option>
                                <option value="Sitio El-Ulit">Sitio El-Ulit</option>

                              </select>
                              <label for="floatingInput" class="small">Address *</label>
                            </div>
                          </div>
                          
                      </div>

                    </div>


                    </div>

                    <hr>

                    <div class="row">

                    
                    <div class="col-12 mb-3 mt-2">
                      <h6>Create Your Account</h6>
                    </div>

                      <div class="col-12">

                      <div class="mb-3">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i class="bi bi-telephone"></i>
                            </span>
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingInput" placeholder="Phone Number*" name="phone" maxlength="11" value="<?= htmlspecialchars($_SESSION['regInUser']['phone_number']); ?>" required readonly>
                              <label for="floatingInput" class="small">Phone Number</label>
                            </div>
                          </div>
                          
                      </div>
                      </div>

                      <div class="col-12">

                        <div class="mb-3">
                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-person"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Username*" name="username" required>
                                <label for="floatingInput" class="small">Username *</label>
                              </div>
                            </div>
                            
                        </div>
                      </div>

                      <div class="col-12">

                      <div class="mb-3">
                          <div class="input-group">
                            <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                            </span>
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                              <label for="floatingPassword" class="small">Password *</label>
                              <span id="togglePassword" style="cursor: pointer; position: absolute; top: 50%; right: 20px; transform: translateY(-50%);">
                                <i class="bi bi-eye fs-5"></i>
                              </span>
                            </div>
                        </div>
                          
                      </div>

                      </div>

                      <div class="col-12">

                        <div class="mb-4">
                            <div class="input-group">
                              <span class="input-group-text">
                              <i class="bi bi-lock"></i>
                              </span>
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingConfirmPassword" placeholder="Re-enter Password" name="r_password" required>
                                <label for="floatingConfirmPassword" class="small">Re-enter Password *</label>
                                <span id="toggleConfirmPassword" style="cursor: pointer; position: absolute; top: 50%; right: 20px; transform: translateY(-50%);">
                                <i class="bi bi-eye fs-5"></i>
                              </span>
                              </div>
                            </div>
                            
                        </div>

                      </div>

                      <div class="col-12">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="termsCheckbox" required>
                              <label class="form-check-label small" for="termsCheckbox">
                                  I agree to the <a href="#" class="text-decoration-none">Terms and Conditions</a>.
                              </label>
                          </div>
                      </div>

                    </div>

                    <div class="mb-4 mt-4">
                      <button class="btn btn-primary w-100 same-height" type="submit" name="register_resident" id="submitButton">Register Now!</button>
                    </div>

                  </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </main>
</div>

<script>
  
  document.addEventListener("DOMContentLoaded", function () {
    const password = document.getElementById("floatingPassword");
    const confirmPassword = document.getElementById("floatingConfirmPassword");
    const togglePassword = document.getElementById("togglePassword");
    const submitButton = document.getElementById("submitButton");
    const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");

    let errorMessage = document.createElement("small");
    errorMessage.style.color = "red";
    errorMessage.style.display = "none";
    confirmPassword.parentElement.appendChild(errorMessage);

    function validatePasswords() {
      if (password.value.length < 8) {
        errorMessage.style.display = "block";
        errorMessage.style.color = "red";
        errorMessage.textContent = "Password must be at least 8 characters long";
        password.classList.add("is-invalid");
        confirmPassword.classList.remove("is-valid", "is-invalid");
        submitButton.disabled = true;
        return;
      } else {
        password.classList.remove("is-invalid");
      }

      if (password.value === confirmPassword.value && password.value.length >= 8) {
        errorMessage.style.display = "block";
        errorMessage.style.color = "green";
        errorMessage.textContent = "Passwords match";
        confirmPassword.classList.remove("is-invalid");
        confirmPassword.classList.add("is-valid");
        submitButton.disabled = false;
      } else {
        errorMessage.style.display = "block";
        errorMessage.style.color = "red";
        errorMessage.textContent = "Passwords do not match";
        confirmPassword.classList.remove("is-valid");
        confirmPassword.classList.add("is-invalid");
        submitButton.disabled = true;
      }
    }

    password.addEventListener("input", validatePasswords);
    confirmPassword.addEventListener("input", validatePasswords);

  });

</script>

