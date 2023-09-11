<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock  nav-collapsible sidenav-dark sidenav-active-rounded">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a class="brand-logo darken-1" href="#">
        <img class="hide-on-med-and-down" style="margin-left: 10px;" src="<?= base_url('') ?>assets/images/logo/ico.png" alt="Gatira logo" />
        <img class="show-on-medium-and-down hide-on-med-and-up" src="<?= base_url('') ?>assets/images/logo/ico.png" alt="Gatira logo" />
        <span class="logo-text hide-on-med-and-down">Gatira</span>
      </a>
      <a class="navbar-toggler" href="#">
        <i class="material-icons">radio_button_checked</i>
      </a>
    </h1>
  </div>

  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">

    <!-- <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge pill orange float-right mr-10">3</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="dashboard-modern.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Modern</span></a>
              </li>
              <li><a href="dashboard-ecommerce.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">eCommerce</span></a>
              </li>
              <li><a href="dashboard-analytics.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Analytics">Analytics</span></a>
              </li>
            </ul>
          </div>
        </li> -->

    <li class="<?= $title === 'Dashboard' ? 'active' : ''; ?> bold"><a class="waves-effect waves-cyan  <?= $title === 'Dashboard' ? 'active' : ''; ?>" href="<?= base_url('dashboard') ?>">
        <i class="material-icons">settings_input_svideo</i><span class="menu-title">Dashboard</span></a>
    </li>

    <li class="navigation-header"><a class="navigation-header-text">Hubungan dan layanan</a><i class="navigation-header-icon material-icons">more_horiz</i>
    </li>

    <li class="<?= $title === 'Entry' ? 'active' : '' ?> bold"><a class="waves-effect waves-cyan <?= $title === 'Entry' ? 'active' : '' ?> " href="<?= base_url('hublang') ?>">
        <i class="material-icons">border_color</i><span class="menu-title" data-i18n="Data Tables">Entry Data</span></a>
    </li>
    <li class="<?= $this->uri->segment(2) === 'data' || $this->uri->segment(2) === 'detail' ? "active" : ''; ?> bold"><a class="waves-effect waves-cyan <?= $this->uri->segment(2) == 'data' || $this->uri->segment(2) === 'detail' ? 'active' : ''; ?> " href="<?= base_url('hublang/data') ?>"><i class="material-icons">grid_on</i><span class="menu-title" data-i18n="Data Tables">Data Pelanggan</span></a>
    </li>


    <?php if ($this->session->userdata('role_id') == 1) { ?>
      <li class="navigation-header"><a class="navigation-header-text">Pengguna</a><i class="navigation-header-icon material-icons">more_horiz</i>
      </li>

      <li class="bold <?= $title === 'User' ? 'active' : '' ?>"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">chrome_reader_mode</i><span class="menu-title" data-i18n="Forms">Akun</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li class="<?= $title === 'User' ? 'active' : '' ?>">
              <a href="<?= base_url('user'); ?>" class="<?= $title === 'User' ? 'active' : '' ?>">
                <i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Data Pengguna</span>
              </a>
            </li>
            <li>
              <a href="">
                <i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Aktivasi Akun</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    <?php } ?>


    <!-- <li class="bold"><a class="waves-effect waves-cyan " href="https://pixinvent.com/materialize-material-design-admin-template/documentation/index.html" target="_blank"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
    </li> -->

    <!-- <li class="bold"><a class="waves-effect waves-cyan " href="https://pixinvent.ticksy.com/" target="_blank"><i class="material-icons">logout</i><span class="menu-title" data-i18n="Support">Logout</span></a>
        </li> -->

  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->