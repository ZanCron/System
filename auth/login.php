<div class="d-flex flex-column min-vh-100">
<main class="flex-grow-1 d-flex align-items-center justify-content-center">
      <div class="container p-0">
        <div class="row justify-content-center">
          <div class="col-md-4 bg-light">

            <div class="card shadow rounded-3 px-4 py-3">

              <form action="<?= BASE_URL;?>/code/login-process.php" method="POST">

                  <div class="card-body">
                    <div class="col-12 text-center mb-4">
                      <img src="<?=  BASE_URL;?>/assets/img/barangay-logo.png" alt="" width="80" class="mb-3">
                      <h4 class="text-dark mb-2">Log in</h4>
                      <small>Please fill all necessary informations</small>

                    </div>

                    <?php alertMessage();?>

                    <div class="mb-2 mt-3">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Phone Number" name="user_details" maxlength="20"  autocomplete="off" required>
                        <label for="floatingInput" class="small">Phone number or Username *</label>
                      </div>
                    </div>

                    <div class="mb-2 mt-3">
                      <div class="form-floating position-relative">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Enter your password" name="password" maxlength="30" autocomplete="off" required>
                        <label for="floatingPassword" class="small">Password *</label>
                        <span id="togglePassword" style="cursor: pointer; position: absolute; top: 50%; right: 20px; transform: translateY(-50%);">
                          <i class="bi bi-eye fs-5"></i>
                        </span>
                      </div>
                    </div>

                    <div class="mb-4 mt-4">
                      <button class="btn btn-primary w-100 same-height" type="submit" name="login">Continue</button>
                    </div>

                    <small>Don't have an account?<a href="<?= BASE_URL;?>/user/signup" class="ms-2">Sign up</a></small>
                  </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </main>
</div>
