<?php
session_start();


function GetAllProfile()
{
    $query = "SELECT * FROM tbl_profile";
    $exe = mysqli_query(Connect(), $query);
    $datas = array();

    while ($data = mysqli_fetch_assoc($exe)) {
        $datas[] = array(
            'id_profile' => $data['id_profile'],
            'id_pengguna' => $data['id_pengguna'],
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'no_hp' => $data['no_hp'],
            'provinsi' => $data['provinsi'],
            'kabupaten' => $data['kabupaten'],
            'kecamatan' => $data['kecamatan'],
            'alamat' => $data['alamat'],
            'alamat_domisili' => $data['alamat_domisili'],
            'status_diri' => $data['status_diri'],
            'no_ktp' => $data['no_ktp'],
            'status' => $data['status'],
            'foto_pelamar' => $data['foto_pelamar'],
            'cv' => $data['cv'],
            'str' => $data['str'],
            'ijazah' => $data['ijazah'],
            'transkrip' => $data['transkrip'],
            'ktp' => $data['ktp'],
            'surat_lamaran' => $data['surat_lamaran']
        );
    }

    return $datas;
}

function GetOneProfile($id_profile)
{
    $query = "SELECT * FROM `tbl_profile` WHERE `id_profile` = '$id_profile'";
    $exe = mysqli_query(Connect(), $query);
    $datas = array();

    while ($data = mysqli_fetch_assoc($exe)) {
        $datas[] = array(
            'id_profile' => $data['id_profile'],
            'id_pengguna' => $data['id_pengguna'],
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'no_hp' => $data['no_hp'],
            'provinsi' => $data['provinsi'],
            'kabupaten' => $data['kabupaten'],
            'kecamatan' => $data['kecamatan'],
            'alamat' => $data['alamat'],
            'alamat_domisili' => $data['alamat_domisili'],
            'status_diri' => $data['status_diri'],
            'no_ktp' => $data['no_ktp'],
            'status' => $data['status'],
            'foto_pelamar' => $data['foto_pelamar'],
            'cv' => $data['cv'],
            'str' => $data['str'],
            'ijazah' => $data['ijazah'],
            'transkrip' => $data['transkrip'],
            'ktp' => $data['ktp'],
            'surat_lamaran' => $data['surat_lamaran']
        );
    }

    return $datas;
}

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <?php
            $id_pengguna_login = $_SESSION['id']; // Ambil id dari sesi login

            $query_select_profile = "SELECT * FROM tbl_profile WHERE id_pengguna = '$id_pengguna_login'";
            $result_select_profile = mysqli_query(Connect(), $query_select_profile);

            if ($result_select_profile && mysqli_num_rows($result_select_profile) > 0) {
                $data = mysqli_fetch_assoc($result_select_profile);
            ?>
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                    <div class="sidebar-brand-icon ">
                        <img src="../assets/img/logo4.png" width="40" height="40">
                    </div>
                    <div class="sidebar-brand-text mx-3">RS PIM <sup></sup></div>
                </a>

            <?php
            } else {
            }
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="?r=welcome/index_admin">
                    <img src="../assets/img/LOGO BPJS KETENAGAKERJAAN.png" alt="Dashboard Icon" style="width:190px; height:50px;">
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <?php if ($_SESSION['hak'] == "admin") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?r=welcome/index_admin">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?r=lowongan/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Input Lowongan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?r=konfirmasi_status_lamaran/index">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Konfirmasi Status Pelamar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?r=lihat_profile_admin/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Lihat Data Pelamar</span></a>
                </li>
            <?php } ?>

            <?php if ($_SESSION['hak'] == "user") { ?>

                <?php
                $id_pengguna_login = $_SESSION['id']; // Ambil id dari sesi login

                $query_select_profile = "SELECT * FROM tbl_profile WHERE id_pengguna = '$id_pengguna_login'";
                $result_select_profile = mysqli_query(Connect(), $query_select_profile);

                if ($result_select_profile) {
                    // Periksa apakah ada data profile
                    if (mysqli_num_rows($result_select_profile) > 0) {
                        $data = mysqli_fetch_assoc($result_select_profile);

                        // Periksa jika status sudah ada dan status = 1, maka tampilkan menu
                        if (isset($data['status']) && $data['status'] == 2) {
                ?>
                            <li class="nav-item">
                                <a class="nav-link" href="?r=profile/index">
                                    <i class="fas fa-fw fa-chart-area"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                        <?php
                        }
                    } else {
                        // Tampilkan menu jika data profile belum ada
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?r=profile/index">
                                <i class="fas fa-fw fa-chart-area"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                <?php
                    }
                }
                ?>




                <!-- <li class="nav-item">
                    <a class="nav-link" href="?r=profile/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Profile</span>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="?r=lihat_profile/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Lihat Data Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?r=lamaran/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Lamar Magang</span></a>

                </li>
            <?php } ?>
            <?php if ($_SESSION['hak'] == "user") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?r=status_lamaran/index">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Status Lamaran</span></a>
                </li>

            <?php } ?>

            <?php if ($_SESSION['hak'] == "admin") { ?>

            <?php } ?>
            <?php if ($_SESSION['hak'] == "admin") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?r=pengguna/index">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Kelola Pengguna</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?r=berita/index">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Kelola Berita</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?r=mentor/index">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Kelola Mentor</span></a>
                </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">






                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/img/LOGO BPJS KETENAGAKERJAAN.png" alt="User Photo" style="width:20px; height:20px; border-radius:50%;">
                                <span style="padding-left: 20px;" class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama']; ?></span>
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <form method='POST' action='?r=pengguna/profile'>
                                    <input type='hidden' name='id' value="<?= $_SESSION['id']; ?>">

                                    <button type='submit' name='edit' class='dropdown-item'> <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Ubah Akun</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../">

                                    Lihat Website
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">