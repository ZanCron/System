<nav class="app-header navbar navbar-expand bg-body shadow-sm">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link rounded-pill" data-lte-toggle="sidebar" href="#" role="button">
                <i class="fa-solid fa-bars"></i>
              </a>
            </li>

          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">

          <li class="nav-item">
              <a class="nav-link disabled text-muted">
                <span id="current-time" class="small"><?php echo displayCurrentTime(); ?></span>
              </a>
          </li>


          
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user"></i><i class="bi bi-caret-down-fill ms-1"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                
            
            
                    <li><a class="dropdown-item py-2 disabled text-dark" href="#" style="font-size: 14.5px;">
                      Signed in as
                      <br>
                      <span class="fw-normal"><?= htmlspecialchars($row['phone_number']); ?></span>
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item py-2 d-flex align-items-center" href="<?= BASE_URL;?>/account/profile" style="font-size: 14.5px;"><i class="bi bi-person-circle fs-5 me-3"></i>Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item py-2 d-flex align-items-center" href="<?= BASE_URL;?>/user/logout" style="font-size: 14.5px;"><i class="bi bi-box-arrow-right fs-5 me-3"></i>Sign out</a></li>
                
            
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
            
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>