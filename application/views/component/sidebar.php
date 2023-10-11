<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
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

    <?php
    $role_id = $this->session->userdata('role_id');

    $queryMenu = "SELECT `user_menu`.`id_menu`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id_menu` = `user_access_menu`.`menu_id`
                   WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC
                ";
    $menu = $this->db->query($queryMenu)->result_array();
    $i = 0;
    // echo 'role id'.$role_id; die();
    // var_dump($menu); die();
    ?>

    <?php foreach ($menu as $m) : ?>

      <li class="navigation-header"><a class="navigation-header-text"><?= $m['menu']; ?></a><i class="navigation-header-icon material-icons">more_horiz</i>
      </li>


      <!-- SIAPKAN SUB-MENU SESUAI MENU -->
      <?php
      $menuId = $m['id_menu'];
      $querySubMenu = "SELECT *
                         FROM `user_sub_menu` JOIN `user_menu` 
                           ON `user_sub_menu`.`menu_id` = `user_menu`.`id_menu`
                        WHERE `user_sub_menu`.`menu_id` = $menuId
                          AND `user_sub_menu`.`is_active` = 1
                  ";
      $subMenu = $this->db->query($querySubMenu)->result_array();
      // echo json_encode($subMenu);
      ?>

      <?php $hal = $this->uri->segment(1);
      $halup = strtolower($hal);
      // echo json_encode($halup);
      ?>

      <?php foreach ($subMenu as $sm) : ?>

        <li class="<?= $title == ($sm['title']) ? 'active' : ''; ?> bold">
          <a class="waves-effect waves-cyan  <?= $title === ($sm['title']) ? 'active' : ''; ?>" href="<?= base_url($sm['url']) ?>">
            <i class="material-icons"><?= $sm['icon'] ?></i><span class="menu-title"><?= $sm['title'] ?></span>
          </a>
        </li>
      <?php endforeach;
      $i++; ?>
    <?php endforeach; ?>



    <!-- <li class="bold"><a class="waves-effect waves-cyan " href="https://pixinvent.com/materialize-material-design-admin-template/documentation/index.html" target="_blank"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
    </li> -->

    <!-- <li class="bold"><a class="waves-effect waves-cyan " href="https://pixinvent.ticksy.com/" target="_blank"><i class="material-icons">logout</i><span class="menu-title" data-i18n="Support">Logout</span></a>
        </li> -->
    <br><br><br><br>

  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->