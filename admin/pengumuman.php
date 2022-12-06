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

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan</h6>
                    <hr>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#buat_pengumuman">Buat Pengumuman</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Pengumuman</th>
                                    <th>Isi Pengumuman</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $pengumuman = mysqli_query($koneksi, "SELECT * FROM tabel_pengumuman");
                                while ($il = mysqli_fetch_array($pengumuman)) {
                                    $id_pengumuman = $il['id_pengumuman'];
                                    $judul_pengumuman = $il['judul_pengumuman'];
                                    $isi_pengumuman = $il['isi_pengumuman'];
                                    $gambar = $il['gambar'];
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $judul_pengumuman; ?></td>
                                        <td><?= $isi_pengumuman; ?></td>
                                        <td><?= $gambar; ?></td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editpengumuman<?= $id_pengumuman; ?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapuspengumuman<?= $id_pengumuman; ?>">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- The Modal Edit Pengumuman -->
                                    <div class="modal fade" id="editpengumuman<?= $id_pengumuman; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Pengumuman</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_pengumuman" value="<?= $id_pengumuman; ?>">
                                                        <div class="mb-3">
                                                            <label for="judul_pengumuman" class="form-label">Judul Pengumuman</label>
                                                            <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" value="<?= $judul_pengumuman; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="isi_pengumuman" class="form-label">Isi Pengumuman</label>
                                                            <textarea type="text" cols="15" rows="5" class="form-control" id="isi_pengumuman" name="isi_pengumuman"><?= $isi_pengumuman; ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="gambar" class="form-label">Gambar</label>
                                                            <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $gambar; ?>">
                                                        </div>
                                                        <input type="hidden" name="gambar_lama" value="<?= $gambar; ?>">
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="edit_pengumuman">Submit</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal Hapus Laporan -->
                                    <div class="modal fade" id="hapuspengumuman<?= $id_pengumuman; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Pengumuman</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="post">
                                                        <h5 class="modal-title text-center">
                                                            Apakah anda yakin ingin Pengumuman<br>
                                                            <b><?= $judul_pengumuman; ?></b> ?
                                                        </h5>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger" name="hapus_pengumuman">Hapus</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                        <!-- Hidden Input -->
                                                        <input type="hidden" name="id_pengumuman" value="<?= $id_pengumuman; ?>">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
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
                                    <div class="col-md-7"> <img src="gambar/<?= $gambar; ?>" width="90%" height="95%"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Modal Buat Pengumuman -->
    <div class="modal fade" id="buat_pengumuman">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Judul -->
                <div class="modal-header">
                    <h4 class="modal-title">Buat Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Formulir -->
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul_pengumuman" class="form-label">Judul Pengumuman</label>
                            <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi_pengumuman" class="form-label">Isi Pengumuman</label>
                            <textarea class="form-control" name="isi_pengumuman" id="isi_pengumuman" cols="15" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <!-- Kirim -->
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" name="tambah_pengumuman">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->
    <?php
    require_once("footer.php");
    ?>