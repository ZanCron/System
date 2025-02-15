<aside class="app-sidebar shadow bg-body-secondary text-white" data-bs-theme="dark" style="background-color: var(--primary) !important;">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="<?= BASE_URL;?>/admin/dashboard" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="<?= BASE_URL;?>/assets/img/barangay-logo.png"
              alt="Barangay Logo"
              class="brand-image"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light d-flex flex-column">
              <small class="text-uppercase fw-bold" style="font-size: 13.5px; letter-spacing: .5px;">Barangay Bukay Pait</small>
              <small class="fw-normal fst-italic" style="font-size: 10px; letter-spacing: .5px;">Document Request System</small>
            </span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-4">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >

           <div class="text-center d-flex flex-column justify-content-center align-items-center">

            <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center shadow"
                style="width: 80px; height: 80px; font-size: 28px; font-weight: 700; font-family: 'Poppins', sans-serif;">
              <?= getadminInitials($adminRole);?>
            </div>

            <div class="nav-header fw-normal small mt-3 mb-0" style="font-size: 15px;">

            <span class="text-white fw-semibold">
                <?php 
                    if ($row['role'] === 'admin') {

                        echo htmlspecialchars($row['username']);

                    } elseif ($row['role'] === 'staff') {
                      
                        echo htmlspecialchars($row['firstname'] . ' ' . $row['lastname']);

                    }
                ?>
            </span>

              <br>
              <span class="fw-light text-white" style="font-size: 13px;"><?= htmlspecialchars($adminRole); ?></span>
            </div>
           </div>

            <hr style="border-width: 2px; color: var(--bs-gray-500);">

            <div class="nav-header text-uppercase small" style="letter-spacing: 1.5px; font-size: 13px;">General</div>

            <li class="nav-item">
              <a href="<?= BASE_URL;?>/admin/dashboard" class="nav-link d-flex align-items-center">
                <i class="bi bi-pie-chart fs-5 me-3"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= BASE_URL;?>/admin/requested_documents" class="nav-link d-flex align-items-center">
              <i class="bi bi-file-earmark-text fs-5 me-3"></i>
                <p>Document Requests</p>
              </a>
            </li>

            <?php 

              if ($_SESSION['loggedInUser']['role'] === 'admin') {

            ?>

            <hr style="border-width: 2px; color: var(--bs-gray-500);">

            <div class="nav-header text-uppercase small" style="letter-spacing: 1.5px; font-size: 13px;">Lists</div>

              <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center">
                  <i class="bi bi-person-vcard fs-5 me-3"></i>
                  <p>
                    List of Accounts
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p class="ms-5">Admin & Staff</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= BASE_URL;?>/admin/list-of-accounts/residents" class="nav-link">
                      <p class="ms-5">Residents</p>
                    </a>
                  </li>
                </ul>
              </li>

              <hr style="border-width: 2px; color: var(--bs-gray-500);">

              <div class="nav-header text-uppercase small" style="letter-spacing: 1.5px; font-size: 13px;">Settings</div>

                <li class="nav-item">
                  <a href="#" class="nav-link d-flex align-items-center">
                  <i class="bi bi-info-circle fs-5 me-3"></i>
                    <p>
                      Barangay Details 
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <p class="ms-5">Settings</p>
                      </a>
                    </li>
                  </ul>
                </li>


            <?php
            
              }
            
            ?>
           
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>