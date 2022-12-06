<?php
require_once("header.php");
?>
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

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                        <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Pengumuman -->
        <div class="container-fluid">
            <?php
            $no = 1;
            $pengumuman2 = mysqli_query($koneksi, "SELECT * FROM tabel_pengumuman");
            while ($il = mysqli_fetch_array($pengumuman2)) {
                $no = 1;
                $id_pengumuman = $il['id_pengumuman'];
                $judul_pengumuman = $il['judul_pengumuman'];
                $isi_pengumuman = $il['isi_pengumuman'];
                $gambar = $il['gambar'];
            ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="container py-4 my-4 mx-auto d-flex flex-column">
                            <div class="header">
                                <div class="row r1">
                                    <div class="col-md-9 abc">
                                        <h1><?= $judul_pengumuman; ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="container-body mt-4">
                                <div class="row r3">
                                    <div class="col-md-5 p-0 klo">
                                        <ul>
                                            <p><?= $isi_pengumuman; ?></p>
                                        </ul>
                                    </div>
                                    <div class="col-md-7"> <img src="../admin/gambar/<?= $gambar; ?>" width="90%" height="95%"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End of Main Content -->
    <?php
    require_once("footer.php");
    ?>