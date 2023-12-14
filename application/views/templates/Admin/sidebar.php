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

        <!-- QUERY MENU -->

        <?php
        $role = $this->session->userdata('role');
        $queryMenu =    " SELECT `tb_user_menu`.`id`, `menu`
                              FROM `tb_user_menu` JOIN `tb_user_access_menu`
                              ON `tb_user_menu`.`id` = `tb_user_access_menu`.`menu_id`
                              WHERE `tb_user_access_menu`.`role`= $role
                              ORDER BY `tb_user_access_menu`.`menu_id` ASC
                            ";
        $menu = $this->db->query($queryMenu)->result_array();

        ?>
        <!-- END QUERY MENU -->

        <!-- LOOPING MENU  -->
        <?php foreach ($menu as $m) : ?>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text"><?= $m['menu'] ?></span>
            </li>

            <!-- SUB MENU -->

            <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT * 
                                 FROM `tb_user_sub_menu` 
                                 WHERE `menu_id` = $menuId
                                 AND `is_active` = 1
                                ";

            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm) : ?>
                <?php if ($judul == $sm['title']) : ?>
                    <li class="menu-item active">
                    <?php else : ?>
                    <li class="menu-item">
                    <?php endif; ?>
                    <a href=" <?= base_url($sm['url']) ?>" class="menu-link">
                        <i class="menu-icon tf-icons <?= $sm['icon'] ?> "></i>
                        <div><?= $sm['title'] ?></div>
                    </a>
                    </li>
                <?php endforeach; ?>


            <?php endforeach; ?>

</aside>