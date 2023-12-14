  <!-- Footer -->
  <?php include 'chat.php';  ?>

  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        ©
        <script>
          document.write(new Date().getFullYear());
        </script>
        , made with ❤️ by
        <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
      </div>
      <div>
        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->



  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?= base_url('assets/') ?>t_1/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url('assets/') ?>t_1/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url('assets/') ?>t_1/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url('assets/') ?>t_1/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>


  <script src="<?= base_url('assets/') ?>t_1/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?= base_url('assets/') ?>t_1/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="<?= base_url('assets/') ?>t_1/js/main.js"></script>

  <!-- Page JS -->
  <script src="<?= base_url('assets/') ?>t_1/js/dashboards-analytics.js"></script>
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js">
  </script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js'></script>
  <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/jquery.min.js'></script>
  <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/jquery-ui.min.js'></script>
  <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
  </script>
  <script>
    $(function() {
      'use strict';
      new DataTable('.datatables-basic', {
        fixedHeader: true
      });
    });
  </script>
  <script>
    $('.form-check-input').on('click', function() {
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({
        url: "<?= base_url('CadminDashboard/changeAccess') ?>",
        type: 'post',
        data: {
          menuId: menuId,
          roleId: roleId
        },
        success: function() {
          document.location.href = "<?= base_url('CadminDashboard/roleAccess/') ?>" + roleId;
        }

      });
    });
  </script>


  <script>
    (function() {
      "use strict";
      // ------------------------------------------------------- //
      // Calendar
      // ------------------------------------------------------ //
      jQuery(function() {
        $('#viewJadwal').click(function() {
          // page is now ready, initialize the calendar...
          let id = $(this).attr('data-id');
          let data = [];
          $.ajax({
            url: "<?= BASE_URL() ?>user/product/getJadwal/" + id,
            async: false,
            method: "GET", // First change type to method here    
            success: function(response) {
              let obj = JSON.parse(response);
              obj.forEach(e => {
                data.push({
                  title: e.jenis_kegiatan,
                  description: e.catatan,
                  start: e.tgl_sewa,
                  end: e.tgl_selesai,
                  className: "fc-bg-default",
                  icon: "circle",
                })
              });
            },
            error: function(error) {
              alert("error" + error);
            }
          });
          console.log(data);
          $('#calendar').fullCalendar({
            themeSystem: "bootstrap4",
            // emphasizes business hours
            businessHours: false,
            defaultView: "month",
            // header
            header: {
              left: "title",
              center: "month",
              right: "today prev,next",
            },
            events: data,
            eventRender: function(event, element) {
              if (event.icon) {
                element
                  .find(".fc-title")
                  .prepend("<i class='fa fa-" + event.icon + "'></i>");
              }
            },
          })

        });
      });
    })(jQuery);
  </script>
  </body>

  </html>