<?php 

if (!isset($_SESSION['otpInUser']['otp'])) {
    redirect(BASE_URL . '/user/signup', 'Please fill the required fields!', 'info');
    exit();
}


?>
<div class="d-flex flex-column min-vh-100">
<main class="flex-grow-1 d-flex align-items-center justify-content-center">
      <div class="container p-0">
        <div class="row justify-content-center">
          <div class="col-md-4 bg-light">

            <div class="card shadow rounded-3 px-4 py-3">

              <form action="<?= BASE_URL;?>/code/signup-process.php" method="POST">

                  <div class="card-body">
                    <div class="col-12 text-center mb-4">
                      <img src="<?=  BASE_URL;?>/assets/img/barangay-logo.png" alt="" width="80" class="mb-3">
                      <h4 class="text-dark mb-2">Verification</h4>

                      <small>Your verification code is sent via SMS to</small>
                      <p class="mt-3"><?= htmlspecialchars($_SESSION['regInUser']['phone_number'] ?? ''); ?></p>

                    </div>

                    <?php alertMessage();?>

                    <div class="mb-2 mt-3">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Phone Number" name="otp" maxlength="6" oninput="allowOnlyNumbers(event)" required>
                        <label for="floatingInput" class="small">OTP Code</label>

                        <input type="text" name="phone" class="d-none" value="<?= htmlspecialchars($_SESSION['regInUser']['phone_number']); ?>">
                      </div>
                    </div>

                    <div class="mb-4 mt-4">
                      <button class="btn btn-primary w-100 same-height" type="submit" name="verify_otp">Verify OTP</button>
                    </div>

                  </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </main>
</div>
