<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>
                <?php if ($data_session->akronim == 'kg') { ?>

                    <li>
                        <a href="<?= site_url($data_session->akronim . '/transaksi') ?>">
                            <i class="mdi mdi-cellphone-link"></i>
                            <span> Transaksi </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url($data_session->akronim . '/laporan') ?>">
                            <i class="mdi mdi-clipboard-multiple-outline"></i>
                            <span> Laporan </span>
                        </a>
                    </li>


                    <li>
                        <a href="<?= site_url($data_session->akronim . '/pengaturan') ?>">
                            <i class="mdi mdi-account-settings-outline mdi-24px"></i>
                            <span> Pengaturan </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('logout') ?>">
                            <i class="mdi mdi-power mdi-24px"></i>
                            <span> Logout </span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($data_session->akronim == 'it') { ?>

                    <li>
                        <a href="<?= site_url($data_session->akronim . '') ?>">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url($data_session->akronim . '/dokumen') ?>">
                            <i class="mdi mdi-cellphone-link"></i>
                            <span> Dokumen </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url($data_session->akronim . '/transaksi') ?>">
                            <i class="mdi mdi-clipboard-multiple-outline"></i>
                            <span> Transaksi </span>
                        </a>
                    </li>


                    <li>
                        <a href="<?= site_url($data_session->akronim . '/pengaturan') ?>">
                            <i class="mdi mdi-account-settings-outline mdi-24px"></i>
                            <span> Pengaturan </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('logout') ?>">
                            <i class="mdi mdi-power mdi-24px"></i>
                            <span> Logout </span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($data_session->akronim == 'pg') { ?>

                    <li class="mb-2">
                        <a href="<?= site_url($data_session->akronim . '/') ?>">
                            <i class="mdi mdi-cellphone-link text-dark mdi-24px"></i>
                            <span class="text-dark"> Pengajuan </span>
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="<?= site_url($data_session->akronim . '/riwayat') ?>">
                            <i class="mdi mdi-clipboard-multiple-outline text-dark mdi-24px"></i>
                            <span class="text-dark"> Riwayat </span>
                        </a>
                    </li>


                    <li class="mb-2">
                        <a href="<?= site_url($data_session->akronim . '/pengaturan') ?>">
                            <i class="mdi mdi-account-settings-outline text-dark mdi-24px "></i>
                            <span class="text-dark"> Pengaturan </span>
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="<?= site_url('logout') ?>">
                            <i class="mdi mdi-logout text-dark mdi-24px k"></i>
                            <span class="text-dark"> Logout </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>