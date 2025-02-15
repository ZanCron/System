<aside class="app-sidebar shadow bg-body-secondary text-white" data-bs-theme="dark" style="background-color: var(--primary) !important;">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="<?= BASE_URL;?>/user/dashboard" class="brand-link">
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
              <small class="fw-normal fst-italic" style="font-size: 10px; letter-spacing: .5px;">Tantangan, South Cotabato</small>
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
              <?= getInitials($row['firstname'], $row['lastname']); ?>
            </div>

            <div class="nav-header fw-normal small mt-3 mb-0" style="font-size: 15px;">
              <span class="text-white fw-semibold"><?= htmlspecialchars($row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']);?></span>
              <br>
              <span class="fw-light text-white" style="font-size: 13px;"><?= htmlspecialchars($row['phone_number']); ?></span>
            </div>
           </div>

            <hr style="border-width: 2px; color: var(--bs-gray-500);">

            <div class="nav-header text-uppercase small" style="letter-spacing: 1.5px; font-size: 13px;">Dashboard</div>

            <li class="nav-item">
              <a href="<?= BASE_URL;?>/user/dashboard" class="nav-link d-flex align-items-center">
                <i class="bi bi-pie-chart fs-5 me-3"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= BASE_URL;?>/user/requests" class="nav-link d-flex align-items-center">
                <i class="bi bi-card-list fs-5 me-3"></i>
                <p>My Requests</p>
              </a>
            </li>

            <hr style="border-width: 2px; color: var(--bs-gray-500);">

            <div class="nav-header text-uppercase small" style="letter-spacing: 1.5px; font-size: 13px;">Settings</div>

              <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center">
                  <i class="bi bi-person-vcard fs-5 me-3"></i>
                  <p>
                    Account Settings
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= BASE_URL;?>/account/profile" class="nav-link">
                      <p class="ms-5">Profile</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= BASE_URL;?>/account/security" class="nav-link">
                      <p class="ms-5">Security</p>
                    </a>
                  </li>
                </ul>
              </li>
           
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>