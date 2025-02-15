</main>

<footer class="app-footer px-lg-4" style="font-size: 15px;">
        <!--begin::Copyright-->
        <small class="fw-normal text-muted">
        <?php displayCopyright(); ?>
          <a href="<?= BASE_URL;?>" class="text-decoration-none">Barangay Bukay Pait</a>&nbsp; All rights reserved. Aeee
        </small>
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?= BASE_URL;?>/assets/js/adminlte.js"></script>

    <script src="<?= BASE_URL;?>/assets/js/script.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });

      function updateTime() {
          const timeElement = document.getElementById('current-time');
          const now = new Date();
          let hours = now.getHours();
          let minutes = now.getMinutes();
          let seconds = now.getSeconds();
          const ampm = hours >= 12 ? 'PM' : 'AM';

          // Convert hours to 12-hour format
          hours = hours % 12;
          hours = hours ? hours : 12; // 12 AM/PM is 12, not 0
          minutes = minutes < 10 ? '0' + minutes : minutes;
          seconds = seconds < 10 ? '0' + seconds : seconds;

          const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;
          timeElement.textContent = timeString;
      }

      // Update time every second
      setInterval(updateTime, 1000);

    </script>

    <script>
      $(document).ready(function() {
        $('#table').DataTable({
          "responsive": true,
          "autoWidth": false,
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true
        });
      });
    </script>


  </body>
  <!--end::Body-->
</html>
