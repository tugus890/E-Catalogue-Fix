  <!-- Menu -->

  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
              <h3 class="app-brand-text fw-bolder ms-2">E-Catalogue</h3>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
          <li <?= $this->uri->segment(1) == 'CdashboardClient' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
              <a href=" <?= base_url('CdashboardClient') ?>" class="menu-link">
                  <i class="menu-icon tf-icons fas fa-home fa-md "></i>
                  <div data-i18n="Analytics">Dashboard</div>
              </a>
          </li>
          <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
          </li>
          <li <?= $this->uri->segment(1) == 'CprodukClient' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
              <a href="<?= base_url('CprodukClient') ?>" class="menu-link">
                  <i class="menu-icon tf-icons fa-solid fa-box"></i>
                  <div data-i18n="Analytics">Produk</div>
              </a>
          </li>
          <li <?= $this->uri->segment(1) == 'CmonitoringClient' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
              <a href="<?= base_url('CmonitoringClient') ?>" class="menu-link">
                  <i class="menu-icon tf-icons fa-solid fa-square-poll-horizontal"></i>
                  <div data-i18n="Analytics">Monitoring</div>
              </a>
          </li>
          <li <?= $this->uri->segment(1) == 'ChistoryClient' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
              <a href="<?= base_url('ChistoryClient') ?>" class="menu-link">
                  <i class="menu-icon tf-icon fa-solid fa-clock-rotate-left"></i>
                  <div data-i18n="Analytics">History</div>
              </a>
          </li>


      </ul>
  </aside>
  <!-- / Menu -->